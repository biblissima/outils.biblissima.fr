(function($){
    $(document).ready(function() {

        // Soumission du formulaire pour traitement
        //$(".form-lemme input[type='submit']").click(function(event) {
        $('form').on('submit', function(event){
            event.preventDefault();

            // Type d'operation
            var opera = $(this).find("input[value='true']").attr("name");
            // Valeur du token
            //var token = $(this).siblings("input[name='token']").val();
            // Definition variables et parametres POST en fonction de l'operation
            switch (opera) {
                case "consultation":
                    var lemme = $("#recherche_lemme").val();
                    var dicos = $('input[type="checkbox"]:checked').map(function() {
                        return $(this).val();
                    }).get();
                    var dataString = 'lemme=' + lemme + '&dicos=' + dicos;
                    break;
                case "flexion":
                    var lemme = $("#flexion_lemme").val();
                    var dataString = 'lemme=' + lemme + '&' + opera + '=';
                    break;
                case "lemmatisation":
                    //var action = $(this).val();
                    var grec = $("#lemmatiser_texte").val();
                    var exacte = $("#exacte:checked");
                    var beta_int = $("#beta_int:checked");
                    if (exacte.length !== 0 && beta_int.length !== 0) {
                        var dataString = 'grec=' + grec + '&' + opera + '=' + '&' + 'exacte=' + '&' + 'beta_int=';
                    } 
                    else if (exacte.length !== 0) {
                        var dataString = 'grec=' + grec + '&' + opera + '=' + '&' + 'exacte=';
                    } 
                    else if (beta_int.length !== 0) {
                        var dataString = 'grec=' + grec + '&' + opera + '=' + '&' + 'beta_int=';
                    } else {
                        var dataString = 'grec=' + grec + '&' + opera + '=';
                    }
                    break;
            }

            if (lemme || grec) {
                ajaxRequest(dataString);
            } else {
                $('#modal-error').modal()
            }
        });

        var params = (new URL(document.location)).searchParams;
        var lemma = params.get("lemma") || "";
        var dict = params.get("dict") || [];
        var hash = decodeURIComponent(window.location.hash.substr(1)) || "";
        if (lemma) {
            var dataString = 'lemme=' + lemma + '&dicos=' + dict;
            ajaxRequest(dataString);
        } else if (hash) {
            var dataString = 'lemme=' + hash + '&dicos=' + dict;
            ajaxRequest(dataString);
        }

        $(".form-control").keyup(function(e) {
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

        function ajaxRequest(dataString) {
            $.ajax({
                type: "POST",
                url: "/eulexis-web/eulexis.php",
                data: dataString,
                dataType: "html",
                cache: false,
            }).done(function(data) {
                $("#results").html(data);

                // enable BS tooltips
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl, {html: true}));

                var headerHeight = 230;    
                $('html, body').stop(true).animate({
                    scrollTop: $("#results").offset().top - headerHeight
                }, 600);
                afterHtmlAppendCallback();

            }).fail(function() {
                $("#results").html("<p class='text-danger'><strong>Une erreur s'est produite<strong></p>");
            });
        }

        /*
         * afterHtmlAppendCallback()
         * Fonction appelee dans done() apres injection de la reponse html
         */

        function afterHtmlAppendCallback() {
            /*
             * Selection et memorisation mise en page dicos
             */
            var tableDicos = $('.table-dicos');
            var colMots = tableDicos.children('.mots');

            if (tableDicos.length) { // Si la div dicos existe dans #results
                var selectedLayout = sessionStorage.getItem("layout");
                var selectLayoutDiv = document.createElement("div");
                var columnBtn = document.createElement("a");
                var rowBtn = document.createElement("a");
                selectLayoutDiv.setAttribute("class", "selectLayoutDiv");
                columnBtn.setAttribute("href", "#");
                columnBtn.setAttribute("class", "columnBtn");
                columnBtn.setAttribute("title", "Affichage en colonnes");
                rowBtn.setAttribute("href", "#");
                rowBtn.setAttribute("class", "rowBtn");
                rowBtn.setAttribute("title", "Affichage en lignes");
                selectLayoutDiv.appendChild(columnBtn);
                selectLayoutDiv.appendChild(rowBtn);

                tableDicos.before(selectLayoutDiv);
                var selectedClass = "selected";
                if (selectedLayout == 'column') {
                    $(".columnBtn").addClass(selectedClass);
                } else {
                    $(".rowBtn").addClass(selectedClass);
                }

                $(".dicos div").each(function() {
                    if (sessionStorage.layout) {
                        $(this).attr("class", selectedLayout);
                    } else {
                        $(this).attr("class", "row");
                    }
                });

                // Bouton "en colonnes"
                $(".columnBtn").click(function(event) {
                    event.preventDefault();
                    $(this).addClass(selectedClass);
                    $(".rowBtn").removeClass(selectedClass);
                    $(".dicos div").toggleClass("row column");
                    selectedLayout = $(".dicos div:first-child").attr("class");
                    sessionStorage.setItem("layout", selectedLayout);
                });

                // Bouton "en rangees"
                $(".rowBtn").click(function(event) {
                    event.preventDefault();
                    $(this).addClass("selected");
                    $(".columnBtn").removeClass(selectedClass);
                    $(".dicos div").toggleClass("column row");
                    selectedLayout = $(".dicos div:first-child").attr("class");
                    sessionStorage.setItem("layout", selectedLayout);
                });

                tableDicos
                    .before('<button type="button" class="btn btn-sm" id="colMots"><span class="glyphicon glyphicon-list"></span>Mots avoisinants</button>')
                    .prev('#colMots').on('click', function(event) {
                        event.stopPropagation();
                        colMots.toggleClass('open');
                    });
            }

            /*
             * Requetes pour les liens sur lemmes
             */
            // Dans les entrees de dicos
            //$("a[data-lemme]").click(function(event) {
            $('a[data-lemme]').on('click', function(event){
                event.preventDefault();
                var lemme = $(this).attr("data-lemme");
                var dataString = 'lemme=' + lemme;
                ajaxRequest(dataString);
            });

            // Dans la colonne laterale mots voisins et le pager
            $("a[data-pos]").click(function(event) {
                event.preventDefault();
                var pos_ind = $(this).attr("data-pos");
                var dataString = 'pos_ind=' + pos_ind;
                ajaxRequest(dataString);
            });

            /*
             * Scroll anime vers ancres
             */
            $('a[href^=#]:not([href=#])').click(function() {
                //if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').stop(true).animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            });
        }
    });
}(jQuery))
