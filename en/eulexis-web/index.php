---
title: Eulexis-web
id: eulexis-web
description: Lemmatiser and dictionaries for ancient Greek texts (Bailly, Liddell–Scott–Jones, Pape)
description_meta: Eulexis-web (online version of the Eulexis software) is a lemmatiser for Ancient Greek texts. It is capable of lemmatising a text in ancient greek and finding the correct root word to search for in several languages in three dictionaries.
categories: [pages]
lang: en
layout: default-banner
id_stat: 7
---

<?php
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('en_GB', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>
<section class="top-banner">
  <div class="container">
        <div class="banner-content row">
      <div class="page-identity col-sm-7 col-md-8">
            <h1 class="page-name">Eulexis-web
          <span class="page-slogan">Lemmatiser for ancient Greek texts (online app)</span>
        </h1>
      </div>
      <div class="col-sm-5 col-md-4 text-sm-end">
            <div class="buttons-container">
              <a class="btn btn-lg" href="https://github.com/biblissima/outils.biblissima.fr/tree/master/eulexis-web"><i class="bi bi-github"></i> Source code on Github</a>
          <a href="/fr/eulexis" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="For Mac OS and Windows"><i class="bi bi-window-dock"></i> Try the desktop app</a>
            </div>
      </div>
        </div>
    </div>
</section>

<div class="main-container container" role="main">
  <div class="row">
    <section class="col-sm-12">
            <div class="my-4">
        <h2 class="lead">Online version of <a href="/fr/eulexis">Eulexis</a>, <strong>a lemmatiser for Ancient Greek texts</strong>.</h2>
      </div>
      <div class="alert alert-warning">
        This application has been made available with no guarantee and may be subject to further corrections and improvements.<br /> If you notice any errors or typos, please do not hesitate to <a href="mailto:eulexis@biblissima-condorcet.fr">report them</a>! <br/>
      </div>

      <p><a href="#" class="btn btn-small" data-bs-toggle="modal" data-bs-target="#modalInfo"><i class="bi bi-info-circle"></i> More info on Eulexis-web</a></p>

      <p>For a detailed presentation of Eulexis (desktop and web versions), read <a href="https://www.arretetonchar.fr/memini12-le-lemmatiseur-eulexis-un-precieux-outil-danalyse-de-texte-et-dapprentissage-en-grec-ancien/">this article</a> published on <em>Arrête ton Char</em> (in French).</p>

      <hr/>

      <div class="forms mb-5">

        <!-- Recherche dicos -->
        <form method="post" role="form" class="row g-3" id="recherche_dicos">
          <div class="col-lg-4 col-md-5">
            <label for="recherche_lemme" class="form-label">Search for a lemma</label>
            <input type="text" name="lemme" id="recherche_lemme" value="" class="form-control" size="40" placeholder="Enter a Greek word..." required>
          </div>
          <div class="col-lg-4 col-md-7">
            <button type="submit" value="Submit" class="btn btn-success" aria-controls="results">Submit</button>
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
            <label for="flexion_lemme" class="form-label">Inflect a lemma</label>
            <input type="text" name="lemme" id="flexion_lemme" value="" class="form-control" size="40" placeholder="Enter a Greek word..." required>
          </div>
          <div class="col-lg-4 col-md-7">
            <button type="submit" value="Inflect" class="btn btn-success" aria-controls="results">Submit</button>
          </div>
          <input type="hidden" name="flexion" value="true">
        </form>

        <!-- Traitement -->
        <form method="post" role="form" class="row g-3" id="traitement">
          <div class="col-lg-8 col-md-11">
            <label for="lemmatiser_texte" class="form-label">Lemmatise a Greek text</label>
            <textarea name="grec" id="lemmatiser_texte" value="" class="form-control" rows="6" cols="80" placeholder="Enter a Greek text..." required></textarea>
          </div>
          <div class="col-lg-8 col-md-11 d-sm-flex align-items-center">
            <div class="col-md-8 col-sm-8 d-flex align-items-center">
              <button type="submit" name="action" value="Lemmatise" class="btn btn-success me-4" aria-controls="results">Lemmatise</button>
              
              <input type="checkbox" name="exacte" id="exacte" class="form-check-input"> <label for="exacte" class="form-check-label">Exact forms only</label>
              <a role="button" class="ms-1" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="This option only displays the lemmatisations of forms with the same diacritical marks as the form in the text (and possibly the initial capital letter). If there are no exact solutions, all solutions are displayed."><i class="bi bi-info-circle"></i></a>
            </div>
            <div class="col-md-4 col-sm-4 text-end">
              <button type="reset" name="action" value="Clear" class="btn btn-sm btn-outline-danger btn-clear"><i class="bi bi-x-circle"></i> Clear input</button>
            </div>
          </div>
          <input type="hidden" name="lemmatisation" value="true">
          <input type="hidden" name="lemme" value="">
        </form>
      </div>

      <!-- Résultats -->
      <div class="results-container" id="myAffix-wrapper" data-spy="affix">
        <div class="results-header sticky-top" id="myAffix">
          <a class="scrolltop" href="#recherche_dicos"><i class="bi bi-arrow-up"></i> Back to form</a>
        </div>
        <div id="results" aria-live="polite" aria-label="Eulexis response to your request">
        </div>
      </div>

      <!-- Informations -->
      <div class="alert alert-info mt-4">
        <p class="lead">The &laquo; Bailly 2020 Hugo Chávez &raquo; is available on Eulexis!</p>
                    <p>Thanks to the hard work of a team of volunteers led by Gérard Gréco, with special contribution of André Charbonnet, Mark De Wilde and Bernard Maréchal, the Bailly 2020 Hugo Chávez is <a href="http://gerardgreco.free.fr/spip.php?article52">available under conditions in PDF</a> since April 2020. You can now consult it online. If you find this work useful, do not hesitate to encourage it and <a href="http://gerardgreco.free.fr/spip.php?article52">make a donation</a>.</p>
      </div>

      <div class="alert alert-light mt-4">
        <h3 class="mb-3">Crédits</h3>
        <p>Eulexis-web is developed by Philippe Verkerk with the help of Régis Robineau.</p>
             <p>Many thanks to Philipp Roelli, André Charbonnet, Mark De Wilde, Gérard Gréco, Peter J. Heslin, Yves Ouvrard, Eduard Frunzeanu and Régis Robineau.</p>
             <ul>
                <li>The LSJ is from <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revised and corrected by <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                <li>The Pape is from <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revised and corrected by <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                <li>The abridged Bailly is from <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                <li>The <em>Bailly 2020 Hugo Chávez</em> is from <a href="http://gerardgreco.free.fr/spip.php?article52">Gérard Gréco</a>, converted from TeX to HTML by Philippe Verkerk.</li>
                <li>The lemmatisation and inflection functions are made possible with files from <a href="https://d.iogen.es/d/">Diogenes</a> and <a href="http://www.perseus.tufts.edu/">Perseus</a>.</li>
            </ul>
      </div>

      <div class="alert alert-dark card-quote" role="alert">
        <div class="icon-quote">
          <i class="bi bi-quote"></i>
        </div>
        <div class="text-quote">
          <h2 class="fs-3">How to cite us?</h2>
          <p class="blockquote">VERKERK, Philippe (<?php echo date("Y") ?>). <em>Eulexis-web</em>. Available at: <a href="https://outils.biblissima/en/eulexis-web">https://outils.biblissima/en/eulexis-web</a> (Accessed on <?php echo $formatter->format(time()); ?>)</p>
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
              <small>Philippe Verkerk, 2014 – Application made available with no guarantee, but in the hope that it will be useful to someone.</small>
            </p>
          </div>
          <div class="col-sm-3">
            <p>Any feedback or questions? :<br/>
            <i class="bi bi-envelope-fill"></i>  <a href="mailto:eulexis@biblissima-condorcet.fr">Contact us</a></p>
          </div>
        </div>
    </div>
</section>


<div class="modal fade" tabindex="-1" id="modalInfo">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-3" id="modalInfo">Read more</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>The following dictionaries are used in this application</p>
                <ul>
                    <li><abbr title="Liddel-Scott-Jones">LSJ</abbr> (1940): Greek → English
                        <ul>
                            <li>another version of the LSJ is available on <a href="https://logeion.uchicago.edu">Logeion</a></li>
                        </ul>
                    </li>
                    <li>Pape (1880): Greek → German</li>
                    <li><a href="http://gerardgreco.free.fr/spip.php?article52">Bailly 2020 Hugo Chávez</a> : Greek → French</li>
                    <li>Bailly (Abr. 1919) : Greek → French
                        <ul>
                            <li><a href="http://www.tabularium.be/bailly/">Scanned version of the Bailly on Tabularium</a></li>
                            <li><a href="http://remacle.org/bloodwolf/vocabulaire/table.htm">Bailly on Remacle.org (incomplete)</a></li>
                        </ul>
                    </li>
                </ul>
                <p>The application does not take accents and breathing into account</p>
                <p>A lemma can be typed in Greek or using the Latin alphabet, in which case the following letter equivalents should be used:</p>
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
                <p>On a Mac, the Polytonic Greek keyboard may be quite useful.
                <br> The keyboard layout can be found <a href="/resources/eulexis/doc/Cl_gr_polyt.pdf" target="_blank">here</a>.</p>
      </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
