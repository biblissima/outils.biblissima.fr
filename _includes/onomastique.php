<?php
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>
<section class="top-banner">
  <div class="container">
    <div class="banner-content row">
      <div class="page-identity col-sm-7 col-md-8">
        <h1 class="page-name">Onomasticon
          <span class="page-slogan">Outil de consultation de dictionnaires d'onomastique</span>
        </h1>
      </div>
    </div>
  </div>
</section>

<div class="main-container container" role="main">
  <div class="row">
    <section class="col-sm-12">
      <div class="my-4">
        <h2 class="lead">Cette page permet de consulter <strong>3 dictionnaires d'onomastique grecque et latine</strong> :</h2>
        <ul class="mt-3">
          <li><strong>Forcellini-Perin 1913-1920</strong> : <em>Onomasticon</em> (Latin-Latin)</li>
          <li><strong>Forcellini-De Vit 1859-1892</strong> : <em>Onomasticon</em> (Latin-Latin jusqu'à la fin de la lettre O)</li>
          <li><strong>Pape-Benseler 1863-1870</strong> : <em>Wörterbuch der griechischen Eigennamen</em> (Grec-Allemand en gothique)</em></li>
        </ul>
      </div>
      <div class="alert alert-warning">
        L'interrogation porte uniquement sur les entrées du dictionnaire, pas sur leur contenu.
      </div>

      <hr/>

      <div class="forms mb-5">

        <!-- Recherche dicos -->
        <form method="post" role="form" id="recherche" class="row g-3">
          <div class="col-lg-4 col-md-5">
            <label for="recherche_nom" class="form-label">Rechercher un nom</label>
            <input id="recherche_nom" type="text" name="nom" class="form-control" size="40" placeholder="Entrez un nom..." required>
          </div>
          <div class="col-lg-4 col-md-4">
            <label for="dicos" class="form-label">dans le dictionnaire</label>
            <select name="dicos" id="dicos" class="form-select">
              <option value="perin" title="Forcellini-Perin 1913-1920 : Onomasticon (Latin-Latin)">Forcellini-Perin (Latin-Latin)</option>
              <option value="de_vit" title="Forcellini-De Vit 1859-1892 : Onomasticon (Latin-Latin jusqu'à la fin de la lettre O)">Forcellini-De Vit (Latin-Latin)</option>
              <option value="benseler" title="Pape-Benseler 1863-1870 : Wörterbuch der griechischen Eigennamen (Grec-Allemand en gothique)">Pape-Benseler (Grec-Allemand en gothique)</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-3">
            <button type="submit" value="Rechercher" class="btn btn-success" aria-controls="results">Valider</button>
          </div>
          <input type="hidden" name="opera" value="consult">
        </form>

      </div>

      <!-- Résultats -->
      <div class="results-container" id="myAffix-wrapper" data-spy="affix">
        <div class="results-header sticky-top" id="myAffix">
          <a class="scrolltop" href="#recherche"><i class="bi bi-arrow-up"></i> Retour au formulaire</a>
        </div>
        <div id="results" aria-live="polite" aria-label="Réponse à votre requête">
        </div>
      </div>

      <!-- Informations -->
      <div class="alert alert-info mt-4">
        <h3 class="mb-3">Perin vs De Vit</h3>
        <p> Les deux dictionnaires <em>Forcellini-Perin</em> et <em>Forcellini-De Vit</em> reprennent tous deux les principes posés par <strong>Forcellini</strong> dans son célèbre dictionnaire. Si Joseph Perin s'inscrit dans la lignée directe des éditeurs successifs, Vincenzo De Vit s'en écarte quelque peu.</p>
        <p><a href="https://www.treccani.it/enciclopedia/vincenzo-de-vit_(Dizionario-Biografico)/">Vincenzo De Vit</a> est un élève de <strong>Furlanetto</strong> (qui a repris le dictionnaire de <strong>Forcellini</strong> au début du XIXe siècle). En parallèle avec <strong>Corradini</strong>, il entreprend une refonte du dictionnaire de Forcellini. Il en étend la période couverte jusqu'en 568 et produit un dictionnaire plus volumineux (6 volumes au lieu de 4) tout en étant accusé de plagiat par l'éditeur historique (à Padoue). Ces six volumes sont publiés à Prato entre 1859 et 1879. <strong>De Vit</strong> exclut les noms propres du dictionnaire, mais les collecte dans un <em>Onomasticon</em> séparé. Malheureusement, De Vit meurt en 1892, laissant l'<em>Onomasticon</em> inachevé (à la fin de la lettre O). Il nous manque donc environ un tiers du dictionnaire, soit un gros volume (ou deux petits). </p>
        <p><strong>Corradini</strong> et <strong>Perin</strong> reprennent l'édition de Furlanetto et publient le <em>Lexicon</em> entre 1864 et 1926. La dernière édition dont nous avons connaissance est la seconde reproduction anastatique de 1965 avec les compléments de Joseph Perin. Le tome V du <em>Lexicon Totius Latinitatis</em> porte également le titre de <em>Onomasticon Totius Latinitatis Tom. I</em> avec le seul nom de Joseph Perin. Il est daté de 1913 et le second volume est daté de 1920.</p>
        <p>Il serait sans doute intéressant de comparer dans le détail les deux branches se réclamant de Forcellini, tant pour le <em>Lexicon</em> que pour l'<em>Onomasticon</em>.<br/> Pour les études patristiques, De Vit sera peut-être plus riche, puisque la période couverte va jusqu'en 568 (année de l'abolition du Sénat romain).</p>
      </div>

      <div class="alert alert-light mt-4">
        <h3 class="mb-3">Crédits</h3>
        <p><strong>Le Forcellini-Perin a été numérisé par Google à la Bibliothèque de Prague.</strong></p>
        <p class="ps-3"><i><b>Lexicon Totius Latinitatis</b> Ab Aeg. Forcellini Seminarii Patavini Alumno Lucubratum Dein A Jos. Furlanetto Seminarii Ejusdem Alumno Emendatum Et Auctum Nunc Demum Fr. Corradini Et Jos. Perin Seminarii Patavini Item Alumnis Curantibus Emendatius Et Auctius Melioremque In Formam Redactum Adjecto Altera Quasi Parte<br />
        <b>Onomastico Totius Latinitatis</b> Opera Et Studio Ejusdem Jos. Perin.</i>
        <a href="https://www.manuscriptorium.com/apps/index.php?direct=record&pid=NKCR__-NKCR__8C000002T6__0VQBCN5-cs">8 C 000002/T.5 et 6; Národní knihovna České republiky; Praha; Česká republika;</a>
        </p>
        <p class="ps-3">Un grand merci à Tomáš Klimek !</p>
        
        <p><strong>Le Forcellini-De Vit provient de la Bibliothèque de l'Université de Princeton.</strong></p>
        <p class="ps-3"><i><b>Totius latinitatis lexicon</b> opera et studio Aegidii Forcellini seminarii patavini alumni lucubratum et in hac editione novo ordine digestum amplissime auctum atque emendatum adiecto insuper altera quasi parte <br />
        <b>Onomastico totius latinitatis</b> cura et studio doct. Vincentii De-Vit.</i>
        <a href="https://catalog.princeton.edu/catalog/997331703506421">ReCAP - Remote Storage  2530.354.15q Oversize</a></p>
        <p class="ps-3">Merci à Jules Nuguet du cluster 7 de Biblissima+ pour avoir téléchargé les pages des 4 volumes.</p>
        
        <p><strong>Le Pape-Benseler provient de la Bibliothèque de Munich.</strong></p>
        <p class="ps-3"><i>W. Pape's Handwörterbuch der griechischen Sprache: in vier Bänden. 3,1 et 3,2</i> (BSB10585211 et BSB10585212) <a href="https://www.digitale-sammlungen.de/en/view/bsb10585211?page=7">München, Bayerische Staatsbibliothek -- L.gr. 245 n-3,1</a> et <a href="https://www.digitale-sammlungen.de/en/view/bsb10585212?page=7">München, Bayerische Staatsbibliothek -- L.gr. 245 n-3,2</a> (<a href="https://mdz-nbn-resolving.de/urn:nbn:de:bvb:12-bsb10585211-8">urn:nbn:de:bvb:12-bsb10585211-8</a> et <a href="https://mdz-nbn-resolving.de/urn:nbn:de:bvb:12-bsb10585212-4">urn:nbn:de:bvb:12-bsb10585212-4)</a></p>
        <p class="ps-3">Merci à la Bayerische Staatsbibliothek de fournir gracieusement des copies numériques de leurs documents.</p>
      </div>

      <div class="alert alert-dark card-quote" role="alert">
        <div class="icon-quote">
          <i class="bi bi-quote"></i>
        </div>
        <div class="text-quote">
          <h2 class="fs-3">Comment nous citer ?</h2>
          <p class="blockquote">VERKERK, Philippe (<?php echo date("Y") ?>). <em>XXX</em>. Disponible sur : <a href="https://outils.biblissima/fr/xxx">https://outils.biblissima/fr/xxx</a> (consulté le <?php echo $formatter->format(time()); ?>)</p>
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
        <i class="bi bi-envelope-fill"></i>  <a href="mailto:collatinus@biblissima-condorcet.fr">Nous contacter</a></p>
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

      </div>
    </div> <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div>
