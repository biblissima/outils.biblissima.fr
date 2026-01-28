---
title: Onomasticon
id: onomastique
description: Greek and Latin onomastics dictionaries (Forcellini-Perin, Forcellini-De Vit, Pape-Benseler)
description_meta: Onomasticon allows to search within 3 Greek and Latin onomastics dictionaries (Forcellini-Perin, Forcellini-De Vit, Pape-Benseler)
categories: [pages]
lang: en
layout: default-banner
id_stat: 22
---

<?php
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>
<section class="top-banner">
  <div class="container">
    <div class="banner-content row">
      <div class="page-identity col-sm-7 col-md-8">
        <h1 class="page-name">Onomasticon
          <span class="page-slogan">Search tool for Greek and Latin onomastics dictionaries</span>
        </h1>
      </div>
    </div>
  </div>
</section>

<div class="main-container container" role="main">
  <div class="row">
    <section class="col-sm-12">
      <div class="my-4">
        <h2 class="lead">This page provides access to <strong>3 Greek and Latin onomastics dictionaries</strong> in image mode:</h2>
        <ul class="mt-3">
          <li><strong>Forcellini-Perin 1913-1920</strong> : <em>Onomasticon</em> (Latin-Latin)</li>
          <li><strong>Forcellini-De Vit 1859-1892</strong> : <em>Onomasticon</em> (Latin-Latin, up to the end of letter O)</li>
          <li><strong>Pape-Benseler 1863-1870</strong> : <em>Wörterbuch der griechischen Eigennamen</em> (Greek-German in Gothic script)</em> 
            <!-- <a role="button" class="ms-1" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Pour chercher un nom dans le Pape-Benseler, il faut taper du betacode (en minuscules et sans diacritique)."><i class="bi bi-exclamation-triangle-fill"></i></a> -->
          </li>
        </ul>
      </div>
      <div class="alert alert-warning">
        The search only covers dictionary entries, not their content.
      </div>

      <hr/>

      <div class="forms mb-5">

        <!-- Recherche dicos -->
        <form method="post" role="form" id="recherche" class="row g-3">
          <div class="col-lg-4 col-md-5">
            <label for="recherche_nom" class="form-label">Search for a name</label>
            <input id="recherche_nom" type="text" name="nom" class="form-control" size="40" placeholder="Enter a name..." required>
          </div>
          <div class="col-lg-4 col-md-4">
            <label for="dicos" class="form-label"> in the dictionary </label>
            <select name="dicos" id="dicos" class="form-select">
              <option value="perin" title="Forcellini-Perin 1913-1920: Onomasticon (Latin-Latin)">Forcellini-Perin (Latin-Latin)</option>
              <option value="de_vit" title="Forcellini-De Vit 1859-1892: Onomasticon (Latin-Latin) [up to the end of letter O]">Forcellini-De Vit (Latin-Latin) [up to the end of letter O]</option>
              <option value="benseler" title="Pape-Benseler 1863-1870: Wörterbuch der griechischen Eigennamen (Greek-German in Gothic script)">Pape-Benseler (Greek-German in Gothic script)</option>
            </select>
          </div>
          <div class="col-lg-4 col-md-3">
            <button type="submit" value="Rechercher" class="btn btn-success" aria-controls="results">Submit</button>
          </div>
          <input type="hidden" name="opera" value="consult">
        </form>

      </div>

      <!-- Résultats -->
      <div class="results-container" id="myAffix-wrapper" data-spy="affix">
        <div class="results-header sticky-top" id="myAffix">
          <a class="scrolltop" href="#recherche"><i class="bi bi-arrow-up"></i> Back to form</a>
        </div>
        <div id="results" aria-live="polite" aria-label="Response to your request">
        </div>
      </div>

      <!-- Informations -->
      <div class="alert alert-info mt-4">
        <h3 class="mb-3">Perin vs De Vit</h3>
        <p>Both the <em>Forcellini-Perin</em> and <em>Forcellini-De Vit</em> dictionaries follow the principles laid down by <strong>Forcellini</strong> in his famous dictionary. While Joseph Perin follows in the direct footsteps of successive editors, Vincenzo De Vit deviates somewhat from this tradition.</p>
        <p><a href="https://www.treccani.it/enciclopedia/vincenzo-de-vit_(Dizionario-Biografico)/">Vincenzo De Vit</a> was a student of <strong>Furlanetto</strong> (who took over the dictionary from <strong>Forcellini</strong> in the early 19th century). Working alongside <strong>Corradini</strong>, he undertook a revision of Forcellini's dictionary. He extended the period covered to 568 and produced a more voluminous dictionary (6 volumes instead of 4), but was accused of plagiarism by the original publisher (in Padua). These six volumes were published in Prato between 1859 and 1879. De Vit excluded proper names from the dictionary, but collected them in a separate <em>Onomasticon</em>. Unfortunately, De Vit died in 1892, leaving the <em>Onomasticon</em> unfinished (at the end of the letter O).</p>
        <p><strong>Corradini</strong> and <strong>Perin</strong> took over the edition from Furlanetto and published the <em>Lexicon</em> between 1864 and 1926. The last edition we are aware of is the second anastatic reproduction from 1965 with additions by Joseph Perin. Volume V of the <em>Lexicon Totius Latinitatis</em> also bears the title <em>Onomasticon Totius Latinitatis Tom. I</em> with the sole name of Joseph Perin. It is dated 1913 and the second volume is dated 1920.</p>
        <p>It would undoubtedly be interesting to compare in detail the two branches claiming to be based on Forcellini, both for the <em>Lexicon</em> and for the <em>Onomasticon</em>. <br/> For patristic studies, De Vit may be more comprehensive, since the period covered extends to 568 (the year of the abolition of the Roman Senate).</p>    
      </div>

      <div class="alert alert-light mt-4">
        <h3 class="mb-3">Credits</h3>
        <p><strong>The Forcellini-Perin was digitised by Google at the Prague Library.</strong></p>
        <p class="ps-3"><i><b>Lexicon Totius Latinitatis</b> Ab Aeg. Forcellini Seminarii Patavini Alumno Lucubratum Dein A Jos. Furlanetto Seminarii Ejusdem Alumno Emendatum Et Auctum Nunc Demum Fr. Corradini Et Jos. Perin Seminarii Patavini Item Alumnis Curantibus Emendatius Et Auctius Melioremque In Formam Redactum Adjecto Altera Quasi Parte<br />
        <b>Onomastico Totius Latinitatis</b> Opera Et Studio Ejusdem Jos. Perin.</i>
        <a href="https://www.manuscriptorium.com/apis/resolver-api/cs/catalog/default/detail/manuscriptorium%7CNKCR__-NKCR__8C000002T5__2ZADWSF-cs">8 C 000002/T.5</a> and <a href="https://www.manuscriptorium.com/apps/index.php?direct=record&pid=NKCR__-NKCR__8C000002T6__0VQBCN5-cs">8 C 000002/T.6</a>; Národní knihovna České republiky; Praha; Česká republika;
        </p>
        <p class="ps-3">Many thanks to Tomáš Klimek!</p>
        
        <p><strong>The Forcellini-De Vit comes from the Princeton University Library.</strong></p>
        <p class="ps-3"><i><b>Totius latinitatis lexicon</b> opera et studio Aegidii Forcellini seminarii patavini alumni lucubratum et in hac editione novo ordine digestum amplissime auctum atque emendatum adiecto insuper altera quasi parte <br />
        <b>Onomastico totius latinitatis</b> cura et studio doct. Vincentii De-Vit.</i>
        <a href="https://catalog.princeton.edu/catalog/997331703506421">ReCAP - Remote Storage  2530.354.15q Oversize</a></p>
        <p class="ps-3">Thanks to Jules Nuguet from cluster 7 of Biblissima+ for downloading the pages of the 4 volumes.</p>
        
        <p><strong>Pape-Benseler comes from the Munich Library.</strong></p>
        <p class="ps-3"><i>W. Pape's Handwörterbuch der griechischen Sprache: in vier Bänden. 3.1 and 3.2</i> (BSB10585211 and BSB10585212) <a href="https://www.digitale-sammlungen.de/en/view/bsb10585211?page=7">Munich, Bavarian State Library -- L.gr. 245 n-3.1</a> and <a href="https://www.digitale-sammlungen.de/en/view/bsb10585212?page=7">Munich, Bavarian State Library -- L.gr. 245 n-3,2</a> (<a href="https://mdz-nbn-resolving.de/urn:nbn:de:bvb:12-bsb10585211-8">urn:nbn:de:bvb: 12-bsb10585211-8</a> and <a href="https://mdz-nbn-resolving.de/urn:nbn:de:bvb:12-bsb10585212-4">urn:nbn:de:bvb:12-bsb10585212-4)</a></p>
        
        <p class="ps-3">We would like to thank the Bayerische Staatsbibliothek for kindly providing digital copies of their documents.</p>

        <p><strong>Source of the illustrative image (banner)</strong>: <a href="https://commons.wikimedia.org/wiki/File:TabulaPeutingeriana.jpg">Tabula Peutingeriana [Wikimedia Commons]</a> (public domain)</p>
      </div>

      <div class="alert alert-dark card-quote" role="alert">
        <div class="icon-quote">
          <i class="bi bi-quote"></i>
        </div>
        <div class="text-quote">
          <h2 class="fs-3">How to cite us?</h2>
          <p class="blockquote">VERKERK, Philippe (<?php echo date("Y") ?>). <em>Onomasticon</em>. Disponible sur : <a href="https://outils.biblissima.fr/en/onomasticon">https://outils.biblissima.fr/en/onomasticon</a> (consulté le <?php echo $formatter->format(time()); ?>)</p>
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
          <small>Philippe Verkerk, 2025 - Application made available with no guarantee, but in the hope that it will be useful to someone.</small>
        </p>
      </div>
      <div class="col-sm-3">
        <p>Any feedback or questions?:<br/>
        <i class="bi bi-envelope-fill"></i>  <a href="mailto:collatinus@biblissima-condorcet.fr"> Contact us</a></p>
      </div>
    </div>
  </div>
</section>
