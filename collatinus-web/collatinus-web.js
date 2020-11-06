(function($) {
  $(document).ready(function() {
    var header = 185; // 20px more than the size of reduced header

    // Affix on header of results div
    $('#myAffix').width($('#myAffix-wrapper').width());
    $('#myAffix').affix({
      offset: {
        top: function() {
          return (this.top = $('#myAffix-wrapper').offset().top - 10);
        }
      }
    });

    // Button to go back to form
    var btnScrollForm = $("<button class='btn scroll-form fb' href='#form-collatinus'></button");
    var chevronUp = $("<span class='glyphicon glyphicon-chevron-up' aria-hidden='true'></span>");
    btnScrollForm.append(chevronUp);
    if ($("body").hasClass("fr")) {
      btnScrollForm.append("Retour au formulaire");
    } else if ($("body").hasClass("en")) {
      btnScrollForm.append("Back to form");
    }
    $('#myAffix').append(btnScrollForm);
    btnScrollForm.hide();
    $('#myAffix').on('affixed.bs.affix', function() {
      btnScrollForm.show();
    });
    $('#myAffix').on('affixed-top.bs.affix', function() {
      btnScrollForm.hide();
    });
    btnScrollForm.click(function() {
      $("html, body").animate({
        scrollTop: $("#form").offset().top
      }, 500);
    });
    $('body').scrollspy({ target: '#myAffix-wrapper' });

    // handle window resize
    $(window).on("resize", function() {
      $('#myAffix').each(function() {
        $(this).width($('#myAffix-wrapper').width());
        $(this).data('bs.affix').options.offset.top = $('#myAffix-wrapper').offset().top
      })
    })

    // Tooltips
    $('body.fr').tooltip({
      selector: ".next a",
      title: "Mot suivant",
      placement: "bottom"
    });
    $('body.fr .container').tooltip({
      selector: ".previous a",
      title: "Mot précédent",
      placement: "bottom"
    });
    $('body.en').tooltip({
      selector: ".next a",
      title: "Next word",
      placement: "bottom"
    });
    $('body.en .container').tooltip({
      selector: ".previous a",
      title: "Previous word",
      placement: "bottom"
    });

    // tooltips on lemmas
    // $('#results').tooltip({
    //     selector: "[data-toggle=tooltip]",
    //     container: "body",
    //     html: "true",
    //     placement: "bottom"
    // });

    // Reset textarea
    $(".form-lemme input[type='reset']").click(function(event) {
      event.preventDefault();
      $("#traitement_texte").empty();
    });

    // submit form via Ajax for processing by collatinus-web.php
    $(".form-lemme button[type='submit']").click(function(event) {
      event.preventDefault();

      // Type of operation
      var opera = $(this).parent().siblings("input[name='opera']").val();
      // Valeur du token
      var token = $(this).parent().siblings("input[name='token']").val();
      // variables and POST parameters depending on operation
      switch (opera) {
        case "consult":
          var lemme = $("#recherche_lemme").val();
          var dico = $("#dicos option:selected").val();
          $("#dicos").change(function() {
            var dico = $(this).val();
          });
          var dataString = 'lemme=' + lemme + '&opera=' + opera + '&dicos=' + dico + '&token=' + token;
          break;

        case "flexion":
          var lemme = $("#flexion_lemme").val();
          var dataString = 'lemme=' + lemme + '&opera=' + opera + '&token=' + token;
          break;

        case "traite_txt":
          var action = $(this).val();
          var texte = $("#traitement_texte").val();
          var langue = $("#langue option:selected").val();
          $("#langue").change(function() {
            var langue = $(this).val();
          });
          var dataString = 'texte=' + texte + '&langue=' + langue + '&opera=' + opera + '&action=' + action + '&token=' + token;
          break;
      }

      if (lemme || texte) {
        ajaxRequest(dataString);
      }
      else {
        $("#modal-error").modal()
      }
    });

    var params = (new URL(document.location)).searchParams;
    var lemma = params.get("lemma") || "";
    var dict = params.get("dict") || "";
    var referer = params.get("referer") || "";
    if (lemma && dict && referer) {
        var dataString = 'lemme=' + lemma + '&dicos=' + dict + '&opera=consult&referer=' + referer;
        ajaxRequest(dataString);
    }
    window.history.replaceState({}, document.title, window.location.pathname);

    function ajaxRequest(dataString) {
      $.ajax({
        type: "POST",
        url: "/collatinus-web/collatinus-web.php",
        data: dataString,
        dataType: "html",
        cache: false,
      })
      .done(function(data) {
        $("#results").html(data);
        var divResults = $("#results");
        // Calculate best horizontal position
        var divResultsOffsetTop = divResults.offset().top;
        var divResultsOffsetTop = divResultsOffsetTop + 20;
        var divResultsWidth = divResults.width();
        var divResultsHeight = divResults.height();
        var windowWidth = $(window).width();
        var positionRight = (windowWidth - divResultsWidth) / 2 - 60;

        // $(window).scroll(function() {
        //     if ($(this).scrollTop() > divResultsOffsetTop) {
        //         $("#scrollToTop").css("right", positionRight).fadeIn();
        //     } else {
        //         $("#scrollToTop").fadeOut();
        //     }
        // });
        // Click event to go to top of #results
        // $("#scrollToTop a").click(function() {
        //     $("html, body").stop(true).animate({
        //         scrollTop: $("#results").offset().top
        //     }, 800);
        //     return false;
        // });

        // ScrollToTop
        $("html, body").stop(true).animate({
          scrollTop: $("#results").offset().top
        }, 600);

        afterHtmlAppendCallback();
      })
      .fail(function() {
        $("#results").html("<p class='text-danger'><strong>Une erreur s'est produite<strong></p>");
      });
    }

    function afterHtmlAppendCallback() {
      $(".pager a, .liste-liens a[data-value]").click(function(event) {
        event.preventDefault();
        var r = $(this).attr("data-value");
        var dataString = 'r=' + r;
        $.ajax({
            type: "POST",
            url: "/collatinus-web/collatinus-web.php",
            data: dataString,
            dataType: "html",
            cache: false,
          })
          .done(function(data) {
            $("#results").html(data);
            afterHtmlAppendCallback();
          })
          .fail(function() {
            $("#results").html("<p class='text-danger'><strong>Une erreur s'est produite<strong></p>");
          });
      });

      // get rid of href on useless links in du_Cange
      $(".text a.form").removeAttr("href");

      // animate scroll to anchors
      $('a[href^=#]:not([href=#])').click(function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').stop(true).animate({
            scrollTop: target.offset().top - header
          }, 1000);
          return false;
        }
      });
    }
  });
}(jQuery))
