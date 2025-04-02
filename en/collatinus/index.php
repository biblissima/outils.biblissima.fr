---
title: Collatinus
id: collatinus
description: Lemmatiseur et analyseur morphologique de textes latins
description_meta: Collatinus est un logiciel libre et gratuit pour la lemmatisation et l'analyse morphologique de textes latins. Il est disponible pour Mac, GNU/Linux et Windows.
lang: en
categories: [pages] 
layout: default-banner
id_stat: 5
---

<?php 
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('en_GB', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

// détection mobile
require_once ($_SERVER['DOCUMENT_ROOT']. '/libs/Mobile_Detect.php');
$detect = new Mobile_Detect;

// détection user agent
$agent = $_SERVER['HTTP_USER_AGENT'];
if ( preg_match('/Linux/',$agent) )   $os = 'linux';
elseif ( preg_match('/Win/',$agent) ) $os = 'win';
elseif ( preg_match('/Mac/',$agent) ) $os = 'mac';
else $os = 'other';

if ( $os == 'linux') {
  $oslabel = 'GNU/Linux';
  $ext = '.tar.gz';
}
elseif ( $os == 'win') {
  $oslabel = 'Windows';
  $ext = '.exe';
}
elseif ( $os == 'mac') {
  $oslabel = 'MacOS';
  $ext = '.dmg';
}

// construction des liens de download
$version = '11.2';
$version_txt = '11.2';
$prev_version = '11.1';
//$link_prefix = './index.php?file=Collatinus_';
$link_prefix = 'https://sharedocs.huma-num.fr/wl/?id=NXicQKuXHYB3M9ZHqhI3zAUuFKZzflKU&path=';
//$link_base =  $link_prefix.$version;
$link_base =  $link_prefix.$oslabel."_Collatinus_".$version;
$link_full    =  $link_base.'_full';
$link_medium  =  $link_base.'_medium';
$link_mini    =  $link_base.'_mini';

// textes
$label_full   = "Full version (9 dictionaries)";
$label_medium = "Medium version (4 dictionaries)";
$label_mini   = "Light version (2 dictionaries)";

$desc_full    = "Lewis &amp; Short 1879 / Gaffiot 2016 / Du Cange 1883 / Georges 1913 / Jeanneau 2017 / Valbuena 1819 / Gaffiot 1934 / Calonghi 1898 / Quicherat 1836";
$desc_medium  = "Lewis &amp; Short 1879 / Gaffiot 2016 / Du Cange 1883 / Georges 1913";
$desc_mini    = "Lewis &amp; Short 1879 / Gaffiot 2016";
?>

<section class="top-banner">
  <div class="container">
    <div class="banner-content row">
      <div class="page-identity col-sm-7 col-md-8">
        <h1 class="page-name">Collatinus <small><?php echo $version_txt; ?></small>
          <span class="page-slogan">
            Lemmatiser and morphological analyser <br/>for Latin texts
          </span>
        </h1>
      </div>
      <div class="col-sm-5 col-md-4 text-sm-end">
        <div class="buttons-container">
          <?php if( !$detect->isMobile() ): ?>
            <div class="btn-group" role="group">
            <?php if ($os == 'mac'): ?>
              <button type="button" class="btn btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-apple"></i> Download for <?php echo $oslabel ?></button>
              <?php elseif ($os == 'win'): ?>
              <button type="button" class="btn btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-windows"></i> Download for <?php echo $oslabel ?></button>
              <?php elseif($os == 'linux'): ?>
                <a class="btn btn-lg" href="https://packages.ubuntu.com/collatinus" data-bs-toggle="tooltip" data-placement="bottom" data-original-title="Available in Ubuntu repositories"><i class="bi bi-ubuntu"></i> Package for Ubuntu/Debian</a>
            <?php endif; ?>

              <!-- <button class="btn btn-lg dropdown-toggle" data-bs-toggle="dropdown" aria-exanded="false"><span class="caret"><span class="sr-only">Toggle Dropdown</span></span></button> -->
              <ul class="dropdown-menu">
              <?php if ($os == 'mac'): ?>
                <li><a class="dropdown-item" href="<?php echo $link_full.$ext; ?>"><?php echo $label_full ?></a></li>
                <li><a class="dropdown-item" href="<?php echo $link_medium.$ext; ?>"><?php echo $label_medium ?></a></li>
                <li><a class="dropdown-item" href="<?php echo $link_mini.$ext; ?>"><?php echo $label_mini ?></a></li>
              <?php elseif ($os == 'win'): ?>
                <li><a class="dropdown-item" href="<?php echo $link_full."_win64".$ext; ?>"><?php echo $label_full ?> - 64 bits</a></li>
                <li><a class="dropdown-item" href="<?php echo $link_medium."_win64".$ext; ?>"><?php echo $label_medium ?> - 64 bits</a></li>
                <li><a class="dropdown-item" href="<?php echo $link_mini."_win64".$ext; ?>"><?php echo $label_mini ?> - 64 bits</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo $link_full."_win32".$ext; ?>"><?php echo $label_full ?> - 32 bits</a></li>
                <li><a class="dropdown-item" href="<?php echo $link_medium."_win32".$ext; ?>"><?php echo $label_medium ?> - 32 bits</a></li>
                <li><a class="dropdown-item" href="<?php echo $link_mini."_win32".$ext; ?>"><?php echo $label_mini ?> - 32 bits</a></li>
              <?php endif; ?>
              </ul>
            </div>

          <?php else: ?>
            <button class="btn btn-lg btn-warning" type="button" disabled>No version available for your system</button>
          <?php endif; ?>

          <a href="https://github.com/biblissima/collatinus" class="btn btn-lg"><i class="bi bi-github"></i> Source code on Github</a>
          <a href="/en/collatinus-web" class="btn btn-lg" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Based on Collatinus 11.2">Try the online app</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="main-container container" role="main">
  <div class="row">
    <section class="col-sm-12">
      <div class="my-4">
        <ul class="nav nav-pills nav-justified flex-column flex-md-row" id="collatinusTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <a class="nav-link active" href="#presentation" aria-controls="presentation" role="tab">Presentation</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="#news" aria-controls="news" role="tab">News</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="#screenshots" aria-controls="screenshots" role="tab">Screenshots</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="#downloads" aria-controls="downloads" role="tab">Downloads</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="#faq" aria-controls="faq" role="tab">FAQ</a>
          </li>
          <li class="nav-item" role="presentation">
            <a class="nav-link" href="#credits" aria-controls="credits" role="tab">Credits</a>
          </li>
        </ul>

        <div class="tab-content">
          <section role="tabpanel" class="tab-pane fade show active" id="presentation">
            <h2>Presentation</h2>
            <p class="lead">
              Collatinus is a free multi-OS (Mac, Windows, Ubuntu and Debian GNU/Linux) and open source application that is easy to install and use.
            </p>
            <p>
              Collatinus is both a lemmatiser and a morphological analyser for Latin texts: if a conjugated or declined form of a word is entered, it is capable of finding the correct root word to search for in the dictionary and then displaying its translation into another language, its different meanings, and any other information usually found in dictionaries. 
            </p>
            <p>
              In practice, Collatinus will be useful mostly for Latin teachers and professors who can quickly generate a complete lexical aid for any text and distribute it to their students. Students often use Collatinus as a reference when reading Latin texts, as they develop their vocabulary and language skills.
            </p>
            <h3>Main Features</h3>
            <ul>
              <li>lemmatise a Latin word or a full Latin text</li>
              <li>translate lemmas using the Latin dictionaries included in the application</li>
              <li>display syllable quantities (long and short syllables) and inflection (declension and conjugation)</li>
            </ul>
            <h3>Help</h3>
            <p><a href="/fr/collatinus/aide/" target="_blank" rel="noreferrer noopener">Read the help pages</a> (in French)</p>

            <div class="alert alert-light">
              <h3>Advantages of Collatinus</h3>
              <ul>
                <li>efficiency of the lemmatization process (~1000 words/s. ; depends of course on the machine on which the program is running),</li>
                <li>lemmas from <em>Lewis & Short 1879</em> and <em>Gaffiot 2016</em> (with the author's permission) with translations into English and French. Collation with those from <em>Georges 1913</em> and <em>Jeanneau 2017</em> (with the author's permission),</li>
                <li>basic glossary of 24,155 lemmas (Classic texts from LASLA) and extension of 58,384 lemmas, with some additional variants and the assimilation of the prefix,</li>
                <li>classification of the lemmatizations and morphosyntactic analysis according to the number of occurrences observed in LASLA texts,</li>
                <li>translations of about 11,000 lemmas in 6 different languages, other than French and English (to be improved)</li>
                <li>ability to colourize a text according to a list of known words,</li>
                <li>scansion and accentuation of a word or text,</li>
                <li>probabilistic tagger based on statistics from LASLA texts (~1,800,000 words)</li>
                <li>access to dictionaries in text or image mode (djvu). Easy to add new dicos (djvu), </li>
                <li>ability to use Collatinus from another program (e.g. LibreOffice) via an internal port,</li>
                <li>ability to query Collatinus from a client in console mode. Lemmatization of a text from a file</li>
                <li>software source code refactored in a modular way in order to facilitate the development of more specific applications</li>
              </ul>

              <h2>Project History</h2>
              <p>Originally, Collatinus was meant to produce printed documents, and it is still used for this purpose. Further improvements and adjustments were made when it became apparent that many people were using it for other purposes:</p>
              <ol>
                  <li>as a lexical and morphological reference when reading a Latin text disposer,</li>
                  <li>for lexical and stylistic searches</li>
                  <li>to provide students with exercises based on Latin texts</li>
              </ol>

              <h2>How it Works</h2>
              <p>Unlike the majority of lemmatisers, which use lists of inflected forms, Collatinus uses a lexicon containing the lemmas and all the necessary information for their inflection. The advantage to this approach is that Collatinus, with its 11,000 lemmas, is capable of recognising over half a million forms. Adding lemmas with spelling variants (such as medieval spellings, for example) would make it possible to recognise all of their inflected forms as well.</p>
              <p>Starting from a lemma and its associated flexional endings, Collatinus is also capable of displaying the corresponding inflection tables, which Latin learners may find useful.</p>
              <p>Finally, when syllable quantities are known for a given lemma, Collatinus can scan the word and even the entire text. When scanning a text, Collatinus applies the usual rules of elision and hiatus.</p>
            </div>
          </section>

          <section role="tabpanel" class="tab-pane fade" id="news">
            <h2>News</h2>
            <p>
              The current version of Collatinus, <strong><?php echo $version_txt; ?></strong>, comes with some new features, improvements and bug fixes:
            </p>
            <ul>
              <li>ability to export the results of a lemmatisation or tagging process as CSV</li>
              <li>recovery of 13 000 english translations</li>
              <li>documentation of the server-side application of Collatinus (in French only)</li>
              <li>Collatinus now takes into account non-Latin alphabets in a different alphabetical order, including those with digrams, for the consultation of dictionaries in Djvu format (for example if you want to add a dictionary Czech-Latin). Ability to take into account characters of the same rank, for instance ph=f et y=i (in Djvu).</li>
              <li>bugs fixes:
                  <ul>
                    <li>the english version is now fully available</li>
                    <li>lemmatisation and translation of words that are supposed to be known (during the colorization of a text) are not given anymore. It is possible to get the number of occurrences of known words.</li>
                  </ul>
              </li>
            </ul>

            <p>
              The previous version of Collatinus (11 bêta) added a lot of new features:
            </p>
            <ul>
              <li>"complete" lexicon (82 000 entries)</li>
              <li>ordering of the solutions depending on frequencies</li>
              <li>inclusion of the Gaffiot 2016 Latin-French dictionary</li>
              <li>ability to display two pages of dictionary (synchronized or not)</li>
              <li>simpler dictionary installation</li>
              <li>marking of accent and hyphenation of the text</li>
              <li>ability to color a text depending on a list of known words</li>
              <li>probabilistic tagger to find the "most probable" lemmatisation</li>
              <li>internal server to use Collatinus from the command line or, for instance, to scan a text without leaving the text editor.</li>
            </ul>
          </section>

          <section role="tabpanel" class="tab-pane fade" id="screenshots">
            <h2>Screenshots</h2>
            <div class="row">
              <div class="gallery">
                <a href="/images/captures/Coll_capt1.png" class="col-xs-6 col-md-3" title="Lexicons Tab: lemmatise and translate all the words in a text"><img src="/images/captures/Coll_capt1_min.png" alt="Capture d'écran 1"></a>
                <a href="/images/captures/Coll_capt2.png" class="col-xs-6 col-md-3" title="Dictionaries Tab: define a word using the Lewis & Short"><img src="/images/captures/Coll_capt2_min.png" alt="Capture d'écran 2"></a>
                <a href="/images/captures/Coll_capt3.png" class="col-xs-6 col-md-3" title="Scansion Tab: display the syllable quantities (long/short) for a text"><img src="/images/captures/Coll_capt3_min.png" alt="Capture d'écran 3"></a>
                <a href="/images/captures/Coll_capt4.png" class="col-xs-6 col-md-3" title="Inflection Tab: display the conjugation/declension of a Latin word"><img src="/images/captures/Coll_capt4_min.png" alt="Capture d'écran 4"></a>
              </div>
            </div>
          </section>

          <section role="tabpanel" class="tab-pane fade" id="downloads">
            <h2>Downloads</h2>

            <p class="lead">There are <strong>three versions</strong> of Collatinus available (customisable). The difference is the number of pre-installed dictionaries that come with the application:</p>
            <ul>
              <li><strong>full</strong> (9 dictionaries)</li>
              <li><strong>medium</strong> (5 dictionaries)</li>
              <li><strong>light</strong> (2 dictionaries)</li>
            </ul>

            <p>These versions can be completed at any time by <strong>downloading one or more of the dictionaries</strong> listed below and by installing them from the <code>Extra</code> menu in Collatinus.</p>

            <h3>Dictionaries</h3>
            <p>The following dictionaries are compatible with Collatinus <strong>version 11 and higher</strong>.</p>
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <h4>In text mode:</h4>
                <ul class="list-no-margin">
                  <ul class="list-no-margin">
                  <li><a download href="/collatinus/ressources/Gaffiot_2016-avr17.col" title="Gaffiot 2016, par Gérard Gréco (2015-2016, CC BY-NC-ND)">Gaffiot 2016</a> (15 Mo &mdash; latin-french)</li>
                  <li><a download href="/collatinus/ressources/Jeanneau_2017-avr17.col" title="Dictionnaire Latin-Français">Jeanneau 2017</a> (12 Mo &mdash; latin-french)</li>
                  <li><a download href="/collatinus/ressources/Georges_1913-avr17.col" title="Georges K. E., Kleines deutsch-lateinisches Handwörterbuch, 1913">K. E. Georges 1913</a> (16 Mo &mdash; latin-german)</li>
                  <li><a download href="/collatinus/ressources/Lewis_and_Short_1879-avr17.col" title="Lewis Ch. T., Short Ch., A Latin Dictionary, 1879">Lewis &amp; Short 1879</a> (22 Mo &mdash; latin-english)</li>
                </ul>
                <ul class="list-no-margin">
                  <li><a download href="/collatinus/ressources/du_Cange_1883-7-oct18.col" title="Glossaire du latin médiéval (Du Cange, et al., Glossarium mediæ et infimæ latinitatis. Niort : L. Favre, 1883-1887). École nationale des Chartes)">Du Cange 1883</a> (58 Mo &mdash; glossary of medieval latin)</li>
                  <li><a download href="/collatinus/ressources/Koebler_2010-jan20.col">Köbler 2010</a> (34 Mo &mdash; medieval latin-german) <span class="label label-info">New</span></li>
                  <li><a download href="/collatinus/ressources/Ramminger_2020-jan20.col">Ramminger 2020</a> (9 Mo &mdash; neolatin-german) <span class="label label-info">New</span></li>
                </ul>
              </div>
              <div class="col-md-6 col-sm-12">
                <h4>In image mode:</h4>
                <ul class="list-no-margin">
                  <li><a download href="/collatinus/ressources/Calonghi_1898-avr17.col" title="Calonghi F., Dizionario latino-italiano, 1898">Calonghi 1898</a> (62 Mo &mdash; latin-italian)</li>
                  <li><a download href="/collatinus/ressources/de_Miguel_1867-dec18.col">De Miguel 1867</a> (153 Mo &mdash; latin-spanish)</li>
                  <li><a download href="/collatinus/ressources/Faria_Junqueira_1975-sep20.col">Faria 1975</a> (171 Mo — latin-portuguese) <span class="label label-info">New</span></li>
                  <li><a download href="/collatinus/ressources/Gaffiot_1934-avr17.col" title="Gaffiot F., Dictionnaire illustré latin-français, 1934">Gaffiot 1934</a> (101 Mo &mdash; latin-french)</li>
                  <li><a download href="/collatinus/ressources/Noel_1851-nov19.col" title="">Nöel 1851</a> (218 Mo &mdash; latin-french)</li>
                  <li><a download href="/collatinus/ressources/Valbuena_1819-avr17.col" title="Valbuena, Diccionario universal latino-español">Valbuena 1819</a> (86 Mo &mdash; latin-spanish)</li>
                  <li><a download href="/collatinus/ressources/Lebaigue_1921-oct23.col">Lebaigue 1921</a> (223 Mo &mdash; latin-french)</li>
                </ul>
                <ul class="list-no-margin">
                  <li><a download href="/collatinus/ressources/Quicherat_1836-avr17.col">Quicherat 1836</a> (303 Mo &mdash; prosodic french)</li>
                  <li><a download href="/collatinus/ressources/Franklin_1875-mai19.col" title="Dictionnaire des noms, surnoms et pseudonymes latins de l'histoire littéraire du Moyen Âge (1100 à 1530)">Franklin 1875</a> (17 Mo &mdash; proper nouns)</li>
                  <li><a download href="/collatinus/ressources/Noel_1824-mai19.col" title="Dictionnaire étymologique des noms propres et surnoms hébreux, arabes, grecs et romains">Noël 1824</a> (21 Mo &mdash; etymology of proper nouns)</li>
                </ul>
              </div>
            </div>

            <h3 class="my-3">Collatinus <?php echo $version_txt; ?> (current version)</h3>

            <?php if (!$detect->isMobile()): ?>

            <div class="row">
              <div class="col-md-4 col-sm-6">
                <h4>Full version<br />
                <small>(9 dictionaries included)</small></h4>

                <?php if($os == 'mac'): ?>
                  <p><a href="<?php echo $link_full.$ext; ?>" class="btn btn-lg">
                    <i class="bi bi-apple"></i> Download for <?php echo $oslabel; ?>
                  </a></p>

                <?php elseif ($os == 'win'): ?>
                  <p>Download for <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_full."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_full."_win64".$ext; ?>">64 bits</a></p>

                <?php elseif ($os == 'linux'): ?>
                  <p><a class="btn btn-lg" href="https://packages.ubuntu.com/collatinus" data-bs-toggle="tooltip" data-placement="bottom" data-original-title="Available in Ubuntu and Debian repositories">
                    <i class="bi bi-ubuntu"></i> Package available for Ubuntu/Debian
                  </a></p>
                  <p class="text-danger"><small>The Ubuntu/Debian package is provided without dictionaries.<br />
                  You can download them in the "Dictionaries" section (below) and install them using the menu entry "Extra > Install dictionaries" of the Collatinus software.<br />
                  The recommanded package <a href="https://packages.debian.org/jessie/felix-latin-data">felix-latin-data</a> enables the latin-french dictionary (Gaffiot).</small></p>
                <?php endif; ?>
                <ul class="small">
                  <li>Lewis &amp; Short, 1879 (latin-english)</li>
                  <li>Gaffiot, 2016 (latin-french)</li>
                  <li>Du Cange, 1883 (medieval latin glossary)</li>
                  <li>Georges, 1913 (latin-german)</li>
                  <li>Jeanneau, 2017 (latin-french)</li>
                  <li>Gaffiot, 1934 (latin-french)</li>
                  <li>Calonghi, 1898 (latin-italian)</li>
                  <li>Valbuena, 1819 (latin-spanish)</li>
                  <li>Quicherat, 1836 (latin-french)</li>
                </ul>
              </div>

              <div class="col-md-4 col-sm-6">
                <h4>Medium version<br />
                <small>(5 dictionaries included)</small></h4>

                <?php if($os == 'mac'): ?>
                  <p><a href="<?php echo $link_medium.$ext; ?>" class="btn btn-lg"><i class="bi bi-apple"></i> Download for <?php echo $oslabel; ?></a></p>

                <?php elseif ($os == 'win'): ?>
                  <p>Download for <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_medium."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_medium."_win64".$ext; ?>">64 bits</a></p>
                <?php endif; ?>
                <ul class="small">
                  <li>Lewis &amp; Short, 1879 (latin-english)</li>
                  <li>Gaffiot, 2016 (latin-french)</li>
                  <li>Du Cange, 1883 (medieval latin glossary)</li>
                  <li>Georges, 1913 (latin-german)</li>
                  <li>Jeanneau, 2017 (latin-french)</li>
                </ul>
              </div>

              <div class="col-md-4 col-sm-6">
                <h4>Light version<br />
                <small>(2 dictionaries included)</small></h4>

                <?php if ($os == 'mac'): ?>
                  <p><a href="<?php echo $link_mini.$ext ?>" class="btn btn-lg"><i class="bi bi-apple"></i> Download for <?php echo $oslabel ?></a></p>

                <?php elseif ($os == 'win'): ?>
                  <p>Download for <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_mini."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_mini."_win64".$ext; ?>">64 bits</a></p>

                <?php endif; ?>
                <ul class="small">
                  <li>Lewis &amp; Short, 1879 (latin-english)</li>
                  <li>Gaffiot, 2016 (latin-french)</li>
                </ul>
              </div>
            </div>

            <?php else: ?>
              <button class="btn btn-lg btn-danger" type="button" disabled="disabled">No compatible version for your system</button>
              <p class="text-muted"><small>This software is available only in his desktop version for Mac OS, Windows and Debian GNU/Linux.</small></p>
            <?php endif; ?>

            <div class="row">
              <div class="col-md-4">
                <h4>Sources</h4>
                <div class="btn-container">
                  <a class="btn btn-lg" href="https://github.com/biblissima/collatinus"><i class="bi bi-github"></i> Collatinus 11 on Github</a>
                </div>
              </div>

              <div class="col-md-8">
                <h3>All versions <small>(by operating system)</small></h3>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Mac OS</th>
                      <th>Windows (32 bits)</th>
                      <th>Windows (64 bits)</th>
                      <th>GNU/Linux</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>Full version</small></td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."MacOS_Collatinus_".$version."_full.dmg"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."Windows_Collatinus_".$version."_full_win32.exe"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."Windows_Collatinus_".$version."_full_win64.exe"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td rowspan="3" class="hasRowSpan text-center align-middle">
                          <a href="https://packages.ubuntu.com/collatinus" data-placement="bottom" data-bs-toggle="tooltip" data-original-title="Available in Ubuntu and Debian repositories"><i class="bi bi-ubuntu"></i><br/><small>Ubuntu package</small></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Medium version</td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."MacOS_Collatinus_".$version."_medium.dmg"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."Windows_Collatinus_".$version."_medium_win32.exe"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."Windows_Collatinus_".$version."_medium_win64.exe"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Light version</small></td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."MacOS_Collatinus_".$version."_mini.dmg"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."Windows_Collatinus_".$version."_mini_win32.exe"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                        <td align="center">
                          <a href="<?php echo $link_prefix."Windows_Collatinus_".$version."_mini_win64.exe"; ?>"><i class="bi bi-download"></i></a>
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>

<!--            <div class="row">
              <h2>Archives (versions antérieures)</h2>

              <h3>Collatinus 11.1</h3>

              <div class="col-sm-12">
                <?php if (!$detect->isMobile()): ?>
                  
                  <h4>Version complète <small>(tous les dictionnaires inclus)</small></h4>
                  <?php if($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_11.1_full.dmg" class="btn btn-sm">Télécharger pour <?php echo $oslabel; ?></a>
                      <small class="text-muted">&nbsp;(.dmg)</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_11.1_full_win32.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (32 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                    <a href="index.php?file=Collatinus_11.1_full_win64.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (64 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <p class="text-danger"><small>Le paquet Debian de la version 11 est fourni sans dictionnaire (lire les indications ci-dessous).</small></p>
                  <?php endif; ?>

                  <h4>Version intermédiaire <small>(5 dictionnaires inclus)</small></h4>
                  <?php if($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_11.1_medium.dmg" class="btn btn-sm">Télécharger pour <?php echo $oslabel; ?></a>
                      <small class="text-muted">&nbsp;(.dmg)</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_11.1_medium_win32.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (32 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                    <a href="index.php?file=Collatinus_11.1_medium_win64.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (64 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <p class="text-danger"><small>Le paquet Debian de la version 11 est fourni sans dictionnaire (lire les indications ci-dessous).</small></p>
                  <?php endif; ?>
                  
                  <h4>Version lite <small>(2 dictionnaires inclus)</small></h4>

                  <?php if ($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_11.1_mini.dmg" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?></a>
                      <small class="text-muted">&nbsp;(.dmg)</small>
                    <?php elseif ($os == 'win'): ?>
                      <a href="index.php?file=Collatinus_11.1_mini_win32.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (32 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                      <a href="index.php?file=Collatinus_11.1_mini_win64.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (64 bits)</a>
                        <small class="text-muted">&nbsp;(.exe)</small>
                      <a href="index.php?file=Collatinus_11.1_mini_winXP.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (Windows XP)</a>
                        <small class="text-muted">&nbsp;(.exe)</small>
                    <?php elseif ($os == 'linux'): ?>
                      <a href="https://packages.debian.org/cosmic/collatinus" role="button" class="btn btn-sm" data-bs-toggle="tooltip" data-placement="bottom" data-original-title="Disponible dans les dépôts Universe d'Ubuntu 18.10 (Cosmic). Pour Debian : disponible uniquement dans les dépôts unstable (sid)">Disponible dans les dépôts Debian</a>
                      <p class="text-danger"><small>Le paquet Ubuntu/Debian est fourni sans dictionnaire.<br />
                        Vous pouvez les télécharger depuis la section "Dictionnaires" (ci-dessous) et installer via le menu "Extra > Installer les dictionnaires téléchargés" de Collatinus.<br />
                        Le paquet (recommandé) <a href="https://packages.ubuntu.com/cosmic/felix-latin-data" target="_blank">felix-latin-data</a> permet d'activer le dictionnaire Gaffiot latin-français</small></p>
                    <?php endif; ?>

                <?php else: ?>
                  <button class="btn btn-sm btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
                  <p class="text-muted"><small>Ce programme n'est disponible qu'en version desktop pour Mac OS, Windows et Debian GNU/Linux.</small></p>
                <?php endif; ?>

                <h4>Sources</h4>
                <div class="btn-container">
                  <a class="btn btn-sm" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus 11 sur Github</a>
                </div>
              </div>

              <h3>Collatinus 11 (bêta)</h3>

              <div class="col-sm-12">
                <?php if (!$detect->isMobile()): ?>
                  
                  <h4>Version complète <small>(tous les dictionnaires inclus)</small></h4>
                  <?php if($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_11.beta_full.dmg" class="btn btn-sm">Télécharger pour <?php echo $oslabel; ?></a>
                      <small class="text-muted">&nbsp;(.dmg)</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_11.beta_full_win32.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (32 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                    <a href="index.php?file=Collatinus_11.beta_full_win64.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (64 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                     <a href="index.php?file=Collatinus_11.beta_full_winXP.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (Windows XP)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <p class="text-danger"><small>Le paquet Debian de la version 10.2 est fourni sans dictionnaire (lire les indications ci-dessous).</small></p>
                  <?php endif; ?>

                  <h4>Version intermédiaire <small>(5 dictionnaires inclus)</small></h4>
                  <?php if($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_11.beta_medium.dmg" class="btn btn-sm">Télécharger pour <?php echo $oslabel; ?></a>
                      <small class="text-muted">&nbsp;(.dmg)</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_11.beta_medium_win32.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (32 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                    <a href="index.php?file=Collatinus_11.beta_medium_win64.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (64 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                    <a href="index.php?file=Collatinus_11.beta_medium_winXP.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (Windows XP)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <p class="text-danger"><small>Le paquet Debian de la version 10.2 est fourni sans dictionnaire (lire les indications ci-dessous).</small></p>
                  <?php endif; ?>
                  
                  <h4>Version lite <small>(2 dictionnaires inclus)</small></h4>

                  <?php if ($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_11.beta_mini.dmg" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?></a>
                      <small class="text-muted">&nbsp;(.dmg)</small>
                    <?php elseif ($os == 'win'): ?>
                      <a href="index.php?file=Collatinus_11.beta_mini_win32.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (32 bits)</a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                      <a href="index.php?file=Collatinus_11.beta_mini_win64.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (64 bits)</a>
                        <small class="text-muted">&nbsp;(.exe)</small>
                      <a href="index.php?file=Collatinus_11.beta_mini_winXP.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?> (Windows XP)</a>
                        <small class="text-muted">&nbsp;(.exe)</small>
                    <?php elseif ($os == 'linux'): ?>
                      <a href="https://packages.debian.org/jessie/collatinus" role="button" class="btn btn-sm">Disponible dans les dépôts Debian</a>
                       <p class="text-danger"><small>Le paquet Debian de la version 10.2 est fourni sans dictionnaire.<br/>
                      On peut les installer au choix en utilisant le menu "Lexiques > Ajouter et corriger les lexiques".<br>
                      Le paquet recommandé <a href="https://packages.debian.org/jessie/felix-latin-data">felix-latin-data</a> permet d'obtenir le dictionnaire latin-français Gaffiot (requiert l'utilitaire <a href="https://packages.debian.org/jessie/djvulibre-bin">Djvu</a>).</small></p>
                    <?php endif; ?>

                <?php else: ?>
                  <button class="btn btn-sm btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
                  <p class="text-muted"><small>Ce programme n'est disponible qu'en version desktop pour Mac OS, Windows et Debian GNU/Linux.</small></p>
                <?php endif; ?>

                <h4>Sources</h4>
                <div class="btn-container">
                  <a class="btn btn-sm" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus 11 sur Github</a>
                </div>
              </div>


              <h3>Collatinus 10.2.2</h3>
              <div class="col-sm-6">
              <?php if (!$detect->isMobile()): ?>
                
                <h4>Version standard <small>(tous les dictionnaires inclus)</small></h4>

                  <?php if($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_10.2.2_mac_standard.zip" class="btn btn-sm">Télécharger pour <?php echo $oslabel; ?></a>
                      <small class="text-muted">&nbsp;(.zip) - Testé sous Mac OS 10.6 à 10.9</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_10.2.2_win_standard.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?></a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <p class="text-danger"><small>Le paquet Debian de la version 10.2 est fourni sans dictionnaire (lire les indications ci-dessous).</small></p>
                  <?php endif; ?>

                <h4>Version standard <small>(tous les dictionnaires inclus)</small></h4>

                  <?php if($os == 'mac'): ?>
                      <a href="index.php?file=Collatinus_10.2.2_mac_standard.zip" class="btn btn-sm">Télécharger pour <?php echo $oslabel; ?></a>
                      <small class="text-muted">&nbsp;(.zip) - Testé sous Mac OS 10.6 à 10.9</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_10.2.2_win_standard.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?></a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <p class="text-danger"><small>Le paquet Debian de la version 10.2 est fourni sans dictionnaire (lire les indications ci-dessous).</small></p>
                  <?php endif; ?>
                
                <h4>Version lite <small>(sans dictionnaire)</small></h4>

                <?php if ($os == 'mac'): ?>
                    <a href="index.php?file=Collatinus_10.2.2_mac_lite.zip" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?></a>
                    <small class="text-muted">&nbsp;(.zip) - Testé sous Mac OS 10.6 à 10.9</small>
                  <?php elseif ($os == 'win'): ?>
                    <a href="index.php?file=Collatinus_10.2.2_win_lite.exe" class="btn btn-sm">Télécharger pour <?php echo $oslabel ?></a>
                      <small class="text-muted">&nbsp;(.exe)</small>
                  <?php elseif ($os == 'linux'): ?>
                    <a href="https://packages.debian.org/jessie/collatinus" role="button" class="btn btn-sm">Disponible dans les dépôts Debian</a>
                     <p class="text-danger"><small>Le paquet Debian de la version 10.2 est fourni sans dictionnaire.<br/>
                    On peut les installer au choix en utilisant le menu "Lexiques > Ajouter et corriger les lexiques".<br>
                    Le paquet recommandé <a href="https://packages.debian.org/jessie/felix-latin-data">felix-latin-data</a> permet d'obtenir le dictionnaire latin-français Gaffiot (requiert l'utilitaire <a href="https://packages.debian.org/jessie/djvulibre-bin">Djvu</a>).</small></p>
                  <?php endif; ?>

                <?php else: ?>
                  <button class="btn btn-sm btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
                  <p class="text-muted"><small>Ce programme n'est disponible qu'en version desktop pour Mac OS, Windows et Debian GNU/Linux.</small></p>
                <?php endif; ?>

                <h4>Sources</h4>
                <div class="btn-container">
                  <a class="btn btn-sm" href="https://github.com/biblissima/collatinus-10-src"><span class="fa fa-github"></span>Collatinus 10 sur Github</a>
                </div>
              </div>

              <div class="col-sm-6">
                <h4>Toutes les versions <small>(par langue de dictionnaire et par système)</small></h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Mac OS</th>
                      <th>Windows</th>
                      <th>GNU/Linux</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td>Français <small>(Gaffiot 1934)</small></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_mac_fr.zip"><span class="glyphicon glyphicon-download"></span></a></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_win_fr.exe"><span class="glyphicon glyphicon-download"></span></a></td>
                        <td rowspan="5" class="hasRowSpan debian-logo">
                          <a href="https://packages.debian.org/jessie/collatinus" data-placement="bottom" data-bs-toggle="tooltip" data-original-title="Paquet .deb et sources disponibles dans les dépôts Debian testing (jessie)"><img src="/images/debian.png" alt="logo Debian" width="32" height="40"><small>Paquet Debian</small></a>
                        </td>
                      </tr>
                      <tr>
                        <td>Anglais <small>(Lewis &amp; Short 1879)</small></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_mac_en.zip"><span class="glyphicon glyphicon-download"></span></a></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_win_en.exe"><span class="glyphicon glyphicon-download"></span></a></td>
                      </tr>
                      <tr>
                        <td>Allemand <small>(K. E. Georges 1913)</small></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_mac_de.zip"><span class="glyphicon glyphicon-download"></span></a></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_win_de.exe"><span class="glyphicon glyphicon-download"></span></a></td>
                      </tr>
                      <tr>
                        <td>Italien <small>(Calonghi 1898)</small></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_mac_it.zip"><span class="glyphicon glyphicon-download"></span></a></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_win_it.exe"><span class="glyphicon glyphicon-download"></span></a></td>
                      </tr>
                      <tr>
                        <td>Versions standard <small>(4 dicos)</small></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_mac_standard.zip"><span class="glyphicon glyphicon-download"></span></a></td>
                        <td align="center"><a href="index.php?file=Collatinus_10.2.2_win_standard.exe"><span class="glyphicon glyphicon-download"></span></a></td>
                      </tr>
                  </tbody>
                </table>

                <h4>Dictionnaires</h4>
                <ul class="list-no-margin">
                  <li><a href="/collatinus/ressources/Gaffiot_1934.djvu" title="Gaffiot F., Dictionnaire illustré latin-français, 1934">Gaffiot 1934</a> (djvu, 97 Mo)</li>
                  <li><a href="/collatinus/ressources/Lewis_and_Short_1879.xml" title="Lewis Ch. T., Short Ch., A Latin Dictionary, 1879">Lewis &amp; Short 1879</a> (xml, 66 Mo)</li>
                  <li><a href="/collatinus/ressources/Georges_1913.xml" title="Georges K. E., Kleines deutsch-lateinisches Handwörterbuch, 1913">K. E. Georges 1913</a> (xml, 25 Mo)</li>
                  <li><a href="/collatinus/ressources/Calonghi_1898.djvu" title="Calonghi F., Dizionario latino-italiano, 1898">Calonghi 1898</a> (djvu, 60 Mo)</li>
                  <li><a href="/collatinus/ressources/Jeanneau_2013.xml" title="Jeanneau et al. Version figée du dictionnaire Latin-Français en ligne">Jeanneau 2013</a> (xml, 20 Mo)</li>
                  <li><a href="/collatinus/ressources/Valbuena_1819.djvu" title="Valbuena, Diccionario universal latino-español">Valbuena 1819</a> (djvu, 82 Mo)</li>
                </ul>
              </div>
            </div> -->
          </section>

          <section role="tabpanel" class="tab-pane fade" id="faq">
            <h2>FAQ</h2>
            <p>Apologies, the FAQ is only available <a href="/fr/collatinus#faq">in French</a>.</p>
          </section>

          <section role="tabpanel" class="tab-pane fade" id="credits">
            <h2>Crédits</h2>
            <p>Collatinus is developed and maintained Yves Ouvrard, with the valuable support of Philippe Verkerk</p>
            <p>It is available under the GNU GPL licence</p>
            <p>With thanks to William Whitaker †, Jose Luis Redrejo, Georges Khaznadar, Matthias Bussonier, Gérard Jeanneau, Philippe Verkerk, Jean-Paul Woitrain, Philipp Roelli, Perseus Digital Library.</p>
          </section>
        </div>

        <div class="alert alert-dark card-quote" role="alert">
          <div class="icon-quote">
            <i class="bi bi-quote"></i>
          </div>
          <div class="text-quote">
            <h2 class="fs-3">How to cite us?</h2>
            <p class="blockquote">OUVRARD, Yves, VERKERK, Philippe (<?php echo date("Y") ?>). <em>Collatinus</em> (<?php echo $version_txt; ?>). Available at: <a href="https://outils.biblissima/en/collatinus">https://outils.biblissima/en/collatinus</a> (Accessed on <?php echo $formatter->format(time()); ?>)</p>
          </div>
        </div>

      </div>
    </section>
  </div>
</div>

<section class="content-bottom">  
  <div class="container">
    <div class="row">
        <div class="col-sm-9">
          <p>Collatinus is developed and maintained by Yves Ouvrard and Philippe Verkerk. It is made available under <a rel="license" href="http://www.gnu.org/licenses/gpl.html">GNU GPL v3 license</a>.</p>
        </div>
        <div class="col-sm-3">
            <p>Any feedback or questions?<br/>
            <i class="bi bi-envelope-fill"></i>  <a href="mailto:collatinus@biblissima-condorcet.fr"> Contact us</a></p>
        </div>
    </div>
  </div>
</section>
