<?php 
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>
<section class="top-banner">
  <div class="container">
    <div class="banner-content row">
      <div class="page-identity col-sm-7 col-md-8">
        <h1 class="page-name">Collatinus-web 
          <span class="page-slogan">Version web du lemmatiseur et analyseur <br />morphologique de textes latins</span>
        </h1>
      </div>
      <div class="col-sm-5 col-md-4 text-sm-end">
        <div class="buttons-container">
          <a href="https://github.com/biblissima/collatinus/tree/Daemon" class="btn btn-lg"><i class="bi bi-github"></i> Code source sur Github</a>
          <a href="/fr/collatinus" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Mac, Windows, GNU/Linux"><i class="bi bi-window-dock"></i> Tester la version bureau</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="main-container container" role="main">
  <div class="row">
    <section class="col-sm-12">
      <div class="my-4">
        <h2 class="lead">
          Version web du logiciel multi-plateforme <a href="/fr/collatinus" title="Page de téléchargement de Collatinus">Collatinus</a>, un <strong>lemmatiseur et analyseur morphologique de textes latins</strong>.
        </h2>
      </div>
      <hr/>
      <div class="forms mb-5">
        <!-- Recherche dicos -->
        <form method="post" role="form" id="recherche_dicos" class="row g-3">
          <div class="col-lg-4 col-md-5">
            <label for="recherche_lemme" class="form-label">Rechercher le mot</label>
            <input id="recherche_lemme" type="text" name="lemme" class="form-control" size="40" placeholder="Entrez un mot latin..." required>
          </div>
          <div class="col-lg-4 col-md-4">
            <label for="dicos" class="form-label">dans le dictionnaire</label>
            <select name="dicos" id="dicos" class="form-select">
              <option value="dgaf " title="latin-français">Gaffiot</option>
              <option value="dlew " title="latin-anglais">Lewis &amp; Short</option>
              <option value="dgeo " title="latin-allemand">Georges</option>
              <option value="djea " title="latin-français">Jeanneau</option>
              <option value="dduc " title="glossaire du latin médiéval">du Cange</option>
              <option value="dram " title="néolatin-allemand">Ramminger</option>
              <option value="dkoe " title="latin médiéval-allemand">Köbler</option>
              <option value="dcal " title="latin-italien">Calonghi (mode image)</option>
              <option value="dfar " title="latin-portugais">Faria (mode image)</option>
              <option value="dfg " title="latin-français">Gaffiot (mode image)</option>
              <option value="drai " title="latin-espagnol">De Miguel (mode image)</option>
              <option value="dval " title="latin-espagnol">Valbuena (mode image)</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-3">
            <button type="submit" value="Rechercher" class="btn btn-success" aria-controls="results">Valider</button>
          </div>
          <input type="hidden" name="opera" value="consult">
          <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

        <!-- Flexion -->
        <form method="post" role="form" class="row g-3" id="flexion">
          <div class="col-lg-4 col-md-5">
            <label for="flexion_lemme" class="form-label">Conjuguer/décliner le mot</label>
            <input id="flexion_lemme" type="search" name="lemme" class="form-control" size="40" placeholder="Entrez un mot latin..." required>
          </div>
          <div class="col-lg-4 col-md-7">
            <button type="submit" value="Fléchir" class="btn btn-success" aria-controls="results">Valider</button>
          </div>
          <input type="hidden" name="opera" value="flexion">
          <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>

        <!-- Traitement -->
        <form method="post" role="form" class="row g-3" id="traitement">
          <div class="col-lg-8 col-md-11">
            <label for="traitement_texte" class="form-label">Traiter un texte latin</label>
            <textarea name="texte" id="traitement_texte" class="form-control" rows="6" cols="80" placeholder="Entrez un texte latin..." required></textarea>
          </div>
          <div class="col-lg-8 col-md-11 d-sm-flex align-items-center">
          	<div class="col-md-8 col-sm-8 d-flex align-items-center">
              <label for="langue" class="form-label">Langue cible</label>
              <select name="langue" id="langue" class="form-select me-4">
                <option value="es ">Castellano</option>
                <option value="ca ">Catalán</option>
                <option value="de ">Deutsch</option>
                <option value="en ">English</option>
                <option value="eu ">Euskara</option>
                <option value="fr " selected="selected">Français</option>
                <option value="gl ">Galego</option>
                <option value="it ">Italiano</option>
                <option value="nl ">Nederlands</option>
              </select>
              <!-- <input class="form-check-input" type="checkbox" id="medieval" name="medieval" autocomplete="off"> -->
              <!-- <label for="medieval" class="form-check-label">Graphies médiévales</label> -->
              <!-- <a role="button" class="ms-1" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Cette option ne prend en compte que les variations graphiques les plus courantes entre latin classique et médiéval. Pour connaître le détail des règles de transformation, voir le fichier <a href='https://github.com/biblissima/collatinus/blob/Daemon/bin/data/medieval.txt' target='_blank'>medieval.txt</a>"><i class="bi bi-info-circle"></i></a> -->
            </div>
            <div class="col-md-4 col-sm-4 text-end">
            	<button type="button" name="action" value="Effacer" class="btn btn-sm btn-outline-danger btn-clear" aria-controls="results"><i class="bi bi-x-circle"></i> Effacer la saisie</button>
            </div>
          </div>
          <div class="col-lg-8 col-md-11 d-sm-flex btn-group-traitement">
            <button type="submit" name="action" value="Lemmatiser" class="btn btn-success" aria-controls="results"> Lemmatiser</button>
            <button type="submit" name="action" value="Analyser" class="btn btn-success" aria-controls="results">Analyser</button>
            <button type="submit" name="action" value="Taguer" class="btn btn-success" aria-controls="results">Taguer</button>
            <button type="submit" name="action" value="Scander" class="btn btn-success" aria-controls="results">Scander</button>
            <button type="submit" name="action" value="Accentuer" class="btn btn-success" aria-controls="results">Accentuer</button>
          </div>
          <input type="hidden" name="opera" value="traite_txt">
          <input type="hidden" name="token" value="<?php echo $token ?>">
        </form>
      </div>

      <!-- Résultats -->
      <div class="results-container" id="myAffix-wrapper" data-spy="affix">
        <div class="results-header sticky-top" id="myAffix">
          <a class="scrolltop" href="#recherche_dicos"><i class="bi bi-arrow-up"></i> Retour au formulaire</a>
        </div>
        <div id="results" aria-live="polite" aria-label="Réponse de Collatinus à votre requête">
        </div>
      </div>

      <ul class="nav nav-pills nav-justified flex-column flex-md-row" id="collatinusTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" href="#presentation" aria-controls="presentation" role="tab">Présentation</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" href="#news" aria-controls="news" role="tab">Nouveautés</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" href="#credits" aria-controls="credits" role="tab">Crédits</a>
        </li>
      </ul>

      <div class="tab-content">
        <section role="tabpanel" class="tab-pane fade show active" id="presentation">
          <h2>Présentation</h2>
          <p>Collatinus-web est basé sur la <strong>version 11.2 de Collatinus</strong>.</p> 
          <p>Son lexique a été élargi grâce au dépouillement systématique des dictionnaires numériques (Gaffiot 2016, Jeanneau 2017, Lewis &amp; Short 1879 et Georges 1913).<br/>
            Le lexique contient aujourd'hui plus de <strong>80&nbsp;000 lemmes</strong>.</p>
          <p>Faute de place sur une page web, les options de Collatinus 11 ne sont pas toutes accessibles. Pour un usage ponctuel, cette page web convient. Pour une utilisation plus poussée, nous recommandons l'installation de la <a href="/fr/collatinus" title="Page de téléchargement de Collatinus">version résidente de Collatinus</a> qui est disponible pour Windows, Mac OS et Linux/Debian.</p>
          <div class="alert alert-warning">
            Cette application est mise à disposition sans aucune garantie et reste soumise à corrections et améliorations.
          </div>
        </section>

        <section role="tabpanel" class="tab-pane fade" id="news">
          <h2>Nouveautés</h2>
          <p>&mdash; Juillet 2023 : Deux langues corrigées dans le lexique de Collatinus, le <strong>Castillan</strong> et l'<strong>Euskara</strong>.</p>
          <p>&mdash; Juin 2021 : Deux langues ajoutées au registre de Collatinus, le <strong>Hollandais</strong> et <strong>l'Euskara</strong>.</p>
          <p>&mdash; Juin 2021 : Lancement d'une campagne de <strong>vérifications des traductions dans les langues de l'Espagne</strong> :</p>
          <p>(FR) Une vaste campagne de vérification des traductions a été lancée par nos amis espagnols. Il s'agit de vérifier les traductions des lemmes latins dans les quatre langues officielles de l'Espagne. Le Castillan et l'Euskara sont aujourd'hui (juillet 2023) corrigés. Le Catalan et le Galicien sont encore en cours de relecture. Si vous souhaitez participer à cette relecture, <a href="mailto:collatinus@biblissima-condorcet.fr">contactez-nous</a> : nous vous mettrons en contact avec les équipes concernées.</p>
          <p>(ES) Una amplia campaña de verificación de traducciones se ha iniciado por parte de nuestros amigos españoles. Se trata de verificar las traducciones de los términos latinos en las cuatro lenguas oficiales de España. El castellano y el euskara ya están corregidos (julio 2023). El catalán y gallego aún se están revisando. Si desean participar en esta revisión, <a href="mailto:collatinus@biblissima-condorcet.fr">pónganse en contacto con nosotros</a> para que podamos ponerles en contacto con los equipos correspondientes.</p>
        </section>

        <section role="tabpanel" class="tab-pane fade" id="credits">
          <h2>Crédits</h2>
          <p>Collatinus web est développé par Yves Ouvrard, avec l'aide de Philippe Verkerk et Régis Robineau.</p>
          <p>Une bonne partie des traductions en hollandais ont été revues par Jan Bart.</p>
          <p>Les traductions en Castillan ont été revues par un groupe de professeurs de latin en Extremadura : Ángel Luis Gallego Real, Guadalupe Santos Martín, Juan José Morcillo Romero, Mario del Río González, Santiago Campo Moreno, Juan Carlos Oliva Muñoz et Carlos Cabanillas.</p>
          <p>Les traductions en Euskara ont été revues par un groupe d'enseignants à l'initiative de Carlos Cabanillas : Garbiñe Agirre Urteaga, Ana Botello Fernandez, Francisco Garayoa Huarte, Alvaro Hurtado Usoz, Maite Jurio Bidarte, Jesús Madinabeitia Ortiz de Lazcano, Begoña Martinez Lasheras, Amaia Zubillaga Mina.</p>
        </section>
      </div>

      <div class="alert alert-dark card-quote" role="alert">
        <div class="icon-quote">
          <i class="bi bi-quote"></i>
        </div>
        <div class="text-quote">
          <h2 class="fs-3">Comment nous citer ?</h2>
          <p class="blockquote">OUVRARD, Yves, VERKERK, Philippe (<?php echo date("Y") ?>). <em>Collatinus-web</em>. Disponible sur : <a href="https://outils.biblissima/fr/collatinus-web">https://outils.biblissima/fr/collatinus-web</a> (consulté le <?php echo $formatter->format(time()); ?>)</p>
        </div>
      </div>
    </section>
  </div>
</div>

<section class="content-bottom">
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <p>
          <img alt="Creative Commons License" src="https://static.biblissima.fr/images/cc-by-nc-4.0-88x31.png" class="me-1"><a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>
        </p>
        <p>
          <small>Yves Ouvrard et Philippe Verkerk, 2019 – Programme mis à votre disposition sans aucune garantie, mais avec l'espoir qu'il vous sera utile.</small>
        </p>
      </div>
      <div class="col-sm-3">
        <p>Des remarques ou questions ? :<br />
          <i class="bi bi-envelope-fill"></i> <a href="mailto:collatinus@biblissima-condorcet.fr">Nous contacter</a></p>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-error">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span><span class="sr-only">Fermer</span></button>
        <h4>Erreur</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning">
          Veuillez saisir un texte dans un des champs.
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
