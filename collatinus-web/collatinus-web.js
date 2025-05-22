(function($) {
  $(document).ready(function() {
    var header = 185; // 20px more than the size of reduced header

    // submit form via Ajax for processing by collatinus-web.php
    $('button[type="submit"]').on('click', function(event){
      event.preventDefault();

      var form = $(this).closest('form');

      // Type of operation
      var opera = form.find("input[name='opera']").val();
      // Valeur du token
      var token = form.find("input[name='token']").val();
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
          var medieval = $("#medieval").is(":checked");
          var dataString = 'texte=' + texte + '&langue=' + langue + '&opera=' + opera + '&action=' + action + '&token=' + token + '&medieval=' + medieval;
          break;
      }
      if (texte && texte.trim() !== "") {
        ajaxRequest(dataString);
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

        var divResults = document.querySelector('#results');
        window.scrollTo({
          top: divResults.offsetTop,
          behavior: "smooth",
        });

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
    }
  });
}(jQuery))
