<?php
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>
<section class="top-banner">
  <div class="container">
		<div class="banner-content row">
      <div class="page-identity col-sm-7 col-md-8">
    		<h1 class="page-name">Eulexis-web
          <span class="page-slogan">Lemmatiseur de grec ancien (version en ligne)</span>
        </h1>
      </div>
      <div class="col-sm-5 col-md-4 text-sm-end">
    		<div class="buttons-container">
    		  <a class="btn btn-lg" href="https://github.com/biblissima/outils.biblissima.fr/tree/master/eulexis-web"><i class="bi bi-github"></i> Code source sur Github</a>
          <a href="/fr/eulexis" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Mac OS et Windows"><i class="bi bi-window-dock"></i> Tester la version bureau</a>
    		</div>
      </div>
		</div>
	</div>
</section>

<div class="main-container container" role="main">
  <div class="row">
    <section class="col-sm-12">
			<div class="my-4">
        <h2 class="lead">Version web du logiciel multi-plateforme <a href="/fr/eulexis">Eulexis</a>, un <strong>lemmatiseur de textes en grec ancien</strong>.</h2>
      </div>
      <div class="alert alert-warning">
        Cette application est mise à disposition sans aucune garantie et reste soumise à corrections et améliorations.<br/>Si vous remarquez des erreurs ou des coquilles, n'hésitez pas à <a href="mailto:eulexis@biblissima-condorcet.fr">nous les signaler</a> !
      </div>

      <p><a href="#" class="btn btn-small" data-bs-toggle="modal" data-bs-target="#modalInfo"><i class="bi bi-info-circle"></i> En savoir plus sur Eulexis-web</a></p>
      <p>Pour une présentation détaillée d'Eulexis (versions bureau et web), voir <a href="https://www.arretetonchar.fr/memini12-le-lemmatiseur-eulexis-un-precieux-outil-danalyse-de-texte-et-dapprentissage-en-grec-ancien/">cet article</a> publié sur le site <em>Arrête ton Char</em>.</p>

      <hr/>

      <div class="forms mb-5">

        <!-- Recherche dicos -->
        <form method="post" role="form" class="row g-3" id="recherche_dicos">
          <div class="col-lg-4 col-md-5">
            <label for="recherche_lemme" class="form-label">Rechercher un lemme</label>
            <input type="text" name="lemme" id="recherche_lemme" value="" class="form-control" size="40" placeholder="Entrez un mot grec..." required>
          </div>
          <div class="col-lg-4 col-md-7">
            <button type="submit" value="Rechercher" class="btn btn-success" aria-controls="results">Rechercher</button>
          </div>
          <div class="d-flex mt-2">
            <input type="checkbox" name="dicos[]" value="LSJ" id="lsj" class="form-check-input"> <label for="lsj" title="Liddell–Scott–Jones Greek-English Lexicon" class="form-check-label me-2">LSJ</label>
            <input type="checkbox" name="dicos[]" value="Pape" id="pape" class="form-check-input"> <label for="pape" title="Handwörterbuch der griechischen Sprache (Pape 1880)" class="form-check-label me-2">Pape</label>
            <input type="checkbox" name="dicos[]" value="Bailly" id="bailly" class="form-check-input"> <label for="bailly" title="Dictionnaire Grec-français Bailly (1895; 11e éd. 1935)" class="form-check-label me-2">Bailly</label>
            <input type="checkbox" name="dicos[]" value="B_Abr" id="bailly_abr" class="form-check-input"> <label for="bailly_abr" title="Abrégé du Dictionnaire Grec-français Bailly (1901, 6e éd. 1919)" class="form-check-label me-2">Abrégé du Bailly</label>
          </div>
          <input type="hidden" name="consultation" value="true">
        </form>

        <!-- Flexion -->
        <form method="post" role="form" class="row g-3" id="flexion">
          <div class="col-lg-4 col-md-5">
            <label for="flexion_lemme" class="form-label">Fléchir un lemme</label>
            <input type="text" name="lemme" id="flexion_lemme" value="" class="form-control" size="40" placeholder="Entrez un mot grec..." required>
          </div>
          <div class="col-lg-4 col-md-7">
            <button type="submit" value="Fléchir" class="btn btn-success" aria-controls="results">Fléchir</button>
          </div>
          <input type="hidden" name="flexion" value="true">
        </form>

        <!-- Traitement -->
        <form method="post" role="form" class="row g-3" id="traitement">
          <div class="col-lg-8 col-md-11">
            <label for="lemmatiser_texte" class="form-label">Lemmatiser un texte grec</label>
            <textarea name="grec" id="lemmatiser_texte" value="" class="form-control" rows="6" cols="80" placeholder="Entrez un texte grec..." required></textarea>
          </div>
          <div class="col-lg-8 col-md-11 d-sm-flex align-items-center">
            <div class="col-md-9 col-sm-8 d-flex align-items-center">
              <button type="submit" name="action" value="Lemmatiser" class="btn btn-success me-3" aria-controls="results">Lemmatiser</button>

              <input type="checkbox" name="exacte" id="exacte" class="form-check-input"> <label for="exacte" class="form-check-label">Formes exactes seulement</label>
              <a role="button" class="ms-1" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Cette option permet de n'afficher que les lemmatisations des formes avec les mêmes signes diacritiques que la forme du texte (et éventuellement la majuscule initiale). S'il n'y a pas de solutions exactes, toutes les solutions sont affichées."><i class="bi bi-info-circle"></i></a>

              <input type="checkbox" name="beta_int" id="beta_int" class="form-check-input ms-3"> <label for="beta_int" class="form-check-label">Bêta intérieur</label>
              <a role="button" class="ms-1" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Cette option permet de distinguer, dans les réponses, le bêta initial 'β' du bêta intérieur 'ϐ'. Cette distinction correspond à la tradition française pour la typographie du grec ancien. Que cette option soit validée ou pas, le bêta intérieur est reconnu dans le texte saisi."><i class="bi bi-info-circle"></i></a>
            </div>
            <div class="col-md-3 col-sm-4 text-end">
              <button type="reset" name="action" value="Effacer" class="btn btn-sm btn-outline-danger btn-clear"><i class="bi bi-x-circle"></i> Effacer la saisie</button>
            </div>
          </div>
          <input type="hidden" name="lemmatisation" value="true">
          <input type="hidden" name="lemme" value="">
        </form>
      </div>

      <!-- Résultats -->
      <div class="results-container" id="myAffix-wrapper" data-spy="affix">
        <div class="results-header sticky-top" id="myAffix">
          <a class="scrolltop" href="#recherche_dicos"><i class="bi bi-arrow-up"></i> Retour au formulaire</a>
        </div>
        <div id="results" aria-live="polite" aria-label="Réponse d'Eulexis à votre requête">
        </div>
      </div>

      <!-- Informations -->
      <div class="alert alert-info mt-4">
        <p class="lead">Le &laquo; Bailly 2020 Hugo Chávez &raquo; disponible à la consultation sur Eulexis !</p>
        <p>Grâce au travail acharné d'une équipe de bénévoles animée par Gérard Gréco, et avec la participation spéciale d'André Charbonnet, de Mark De Wilde et de Bernard Maréchal, le Bailly 2020 Hugo Chávez est <a href="http://gerardgreco.free.fr/spip.php?article24">accessible sous conditions en PDF</a> depuis avril 2020. Vous pouvez maintenant le consulter en ligne. Si ce travail vous est utile, n'hésitez pas à l'encourager et <a href="http://gerardgreco.free.fr/spip.php?article24">à faire un don</a>.</p>
      </div>

			<div class="alert alert-light mt-4">
        <h3 class="mb-3">Crédits</h3>
        <p>Eulexis-web est développé par Philippe Verkerk avec l'aide de Régis Robineau.</p>
			 <p>Un grand merci à Philipp Roelli, André Charbonnet, Mark De Wilde, Gérard Gréco, Peter J. Heslin, Yves Ouvrard, Eduard Frunzeanu et Régis Robineau.</p>
			 <ul>
          <li>Le <abbr title="Liddell–Scott–Jones Greek-English Lexicon"><em>LSJ</em></abbr> est de <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revu et corrigé par <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
          <li>Le <em>Pape</em> est de <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revu et corrigé par <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
          <li>L'abrégé du <em>Bailly</em> est de <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
          <li>Le <em>Bailly 2020 Hugo Chávez</em> est de <a href="http://gerardgreco.free.fr/spip.php?article24">Gérard Gréco</a>, converti de TeX en HTML par Philippe Verkerk.</li>
          <li>La lemmatisation et la flexion ont été possibles grâce aux fichiers de <a href="https://d.iogen.es/d/">Diogenes</a> et de <a href="http://www.perseus.tufts.edu/">Perseus</a>.</li>
        </ul>
      </div>

      <div class="alert alert-dark card-quote" role="alert">
        <div class="icon-quote">
          <i class="bi bi-quote"></i>
        </div>
        <div class="text-quote">
          <h2 class="fs-3">Comment nous citer ?</h2>
          <p class="blockquote">VERKERK, Philippe (<?php echo date("Y") ?>). <em>Eulexis-web</em>. Disponible sur : <a href="https://outils.biblissima/fr/eulexis-web">https://outils.biblissima/fr/eulexis-web</a> (consulté le <?php echo $formatter->format(time()); ?>)</p>
        </div>
      </div>

  	</section>
	</div>
</div>

<section class="content-bottom">  
	<div class="container">
		<div class="row">
		  <div class="col-sm-9">
		    <p><img alt="Creative Commons License" src="https://static.biblissima.fr/images/cc-by-nc-4.0-88x31.png" class="me-1"><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a></p>
				<p>
		      <small>Philippe Verkerk, 2020 – Programme mis à votre disposition sans aucune garantie, mais avec l'espoir qu'il vous sera utile.</small>
		    </p>
		  </div>
		  <div class="col-sm-3">
        <p>Des remarques ou questions ? :<br/>
        <i class="bi bi-envelope-fill"></i>  <a href="mailto:eulexis@biblissima-condorcet.fr">Nous contacter</a></p>
		  </div>
		</div>
	</div>
</section>


<div class="modal fade" tabindex="-1" id="modalInfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3" id="modalInfo">En savoir plus</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <p>Les dictionnaires utilisés par l'application sont :</p>
        <ul>
            <li>le <abbr title="Liddel-Scott-Jones Greek-English Lexicon">LSJ</abbr> (1940) : Grec → Anglais
                <ul>
                    <li>une autre version du LSJ est consultable sur <a href="https://logeion.uchicago.edu">Logeion</a></li>
                </ul>
            </li>
            <li>le Pape (1880) : Grec → Allemand</li>
            <li>le <a href="http://gerardgreco.free.fr/spip.php?article24">Bailly 2020 Hugo Chávez</a> : Grec → Français</li>
            <li>le Bailly (Abr. 1919) : Grec → Français
                <ul>
                    <li><a href="http://www.tabularium.be/bailly/">Le Bailly en mode image sur Tabularium</a></li>
                    <li><a href="http://remacle.org/bloodwolf/vocabulaire/table.htm"> Le Bailly sur Remacle.org (incomplet)</a></li>
                </ul>
            </li>
        </ul>
        <p>Le programme ne tient pas compte des accents et esprits.</p>
        <p>Le lemme peut être écrit en grec ou en utilisant l'alphabet latin. Dans ce cas, on utilisera les équivalences suivantes qui sont compatibles avec le betacode :</p>
        <table>
            <tbody>
                <tr>
                    <td>&nbsp;a&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;α&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;i&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ι&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;r&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ρ&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;b&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;β&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;k&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;κ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;s&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;σ, ς&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;g&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;γ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;l&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;λ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;t&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;τ&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;d&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;δ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;m&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;μ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;u&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;υ&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;e&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ε&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;n&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ν&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;f&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;φ&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;z&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ζ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;c&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ξ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;x&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;χ&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;h&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;η&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;o&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ο&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;y&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ψ&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;q&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;θ&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;p&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;π&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;w&nbsp;</td>
                    <td>&nbsp;⇒&nbsp;</td>
                    <td>&nbsp;ω&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <br>
        <p>Sur Mac, le clavier "Grec Polytonique" est assez pratique.
            <br> On trouvera <a href="/resources/eulexis/doc/Cl_gr_polyt.pdf" target="_blank">ici le plan de ce clavier</a>.</p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
