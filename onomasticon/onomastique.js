(function($){
    $(document).ready(function() {
        // Soumission du formulaire pour traitement
        $('button[type="submit"]').on('click', function(event) {
            event.preventDefault();
            var form = $(this).closest('form');
            // Type d'operation
            var opera = form.find("input[name='opera']").val();
            // Valeur du token
            // Definition variables et parametres POST en fonction de l'operation
            var nom = $("#recherche_nom").val();
            var dico = $("#dicos option:selected").val();
            $("#dicos").change(function() {
                var dico = $(this).val();
            });
            var dataString = 'nom=' + nom + '&dico=' + dico;
            if (nom && nom.trim() !== "") {
                ajaxRequest(dataString);
            }
        });

        // var params = (new URL(document.location)).searchParams;
        // var lemma = params.get("lemma") || "";
        // var dict = params.get("dict") || [];
        // var hash = decodeURIComponent(window.location.hash.substr(1)) || "";
        // if (lemma) {
        //     var dataString = 'lemme=' + lemma + '&dicos=' + dict;
        //     ajaxRequest(dataString);
        // } else if (hash) {
        //     var dataString = 'lemme=' + hash + '&dicos=' + dict;
        //     ajaxRequest(dataString);
        // }

        function ajaxRequest(dataString) {
            $.ajax({
                type: "POST",
                url: "/onomasticon/onomastique.php",
                data: dataString,
                dataType: "html",
                cache: false,
            }).done(function(data) {
                $("#results").html(data);
                var divResults = document.querySelector('#results');
                window.scrollTo({
                  top: divResults.offsetTop,
                  behavior: "smooth",
                });
                afterHtmlAppendCallback(dataString);
            }).fail(function() {
                $("#results").html("<p class='text-danger'><strong>Une erreur s'est produite<strong></p>");
            });
        }

        /*
         * afterHtmlAppendCallback()
         * Fonction appelee dans done() apres injection de la reponse html
         */

        function afterHtmlAppendCallback(request) {
            $(".pager a").click(function(event) {
            event.preventDefault();
            var page = $(this).attr("data-value");
            var dataString = request + '&page=' + page;
            $.ajax({
                type: "POST",
                url: "/onomasticon/onomastique.php",
                data: dataString,
                dataType: "html",
                cache: false,
              })
              .done(function(data) {
                $("#results").html(data);
                afterHtmlAppendCallback(request);
              })
              .fail(function() {
                $("#results").html("<p class='text-danger'><strong>Une erreur s'est produite<strong></p>");
              });
          });
        }

        $("#dicos").on('change', function() {
            var form = $(this).closest('form');
            var input = form.find("input[name='nom']");
            input.off();
          if( $(this).val() === "benseler" ) {
            console.log("BENSELER");
            if(input.val() !== "") { input.val('') }
            input.on( "keyup", function(e) {
                // Valeur Unicode de la touche
                var keyCode = e.keyCode;
                // Conversion valeur Unicode en caractere
                keyString = String.fromCharCode(keyCode);
                // Mise en minuscules
                keyString = keyString.toLowerCase();
                // Caractere grec correspondant dans lat_grc.js
                value = lat_grc[keyString];
                if (value) {
                    // insere le caractere a la position du curseur
                    if (this.selectionStart || this.selectionStart == '0') { // FF
                        var startPos = this.selectionStart;
                        var endPos = this.selectionEnd;
                        this.value = latGrc(this.value);
                        this.focus();
                        this.setSelectionRange(startPos, startPos);
                    } else if (document.selection && document.selection.createRange) { // IE
                        sel = document.selection.createRange();
                        sel.moveStart('character', -1); // select one char back
                        sel.text = value; // replace this latin char by a greek char
                    } else { // replace complete value, caret position is lost
                        this.value = latGrc(this.value);
                    }
                }
            });
          }
        });

        function latGrc(text) {
            text = text.split('');
            max = text.length;
            for (var i = 0; i < max; i++) {
                c = lat_grc[text[i]];
                if (c) text[i] = c;
                // if ((text[i] == 'ς') && (i < max -1)) {
                //     text[i] == 'σ'; // Je remplace un éventuel ς perdu à l'intérieur par un σ
                // }
            }
            return text.join('');
        }
    });
}(jQuery))
