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
                url: "/onomastique/onomastique.php",
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
            console.log(request);
            var dataString = request + '&page=' + page;
            console.log(request);
            $.ajax({
                type: "POST",
                url: "/onomastique/onomastique.php",
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
    });
}(jQuery))
