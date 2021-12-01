---
title: Collatinus
id: collatinus
description: Lemmatiser and morphological analyser for Latin texts
description_meta: Collatinus is a free multi-OS (Mac, Windows et Debian GNU/Linux) and open source application designed for the lemmatisation and morphological analysis of Latin texts.
categories: [pages] 
layout: default-banner
id_stat: 5
lang: en
---
<?php 

// détection mobile
require_once ($_SERVER['DOCUMENT_ROOT']. '/libs/Mobile_Detect.php');
$detect = new Mobile_Detect;

// détection user agent
$agent = $_SERVER['HTTP_USER_AGENT'];
if ( preg_match('/Linux/',$agent) ) 	$os = 'linux';
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
  $oslabel = 'Mac OS';
  $ext = '.dmg';
}

// construction des liens de download
$version = '11.2';
$version_txt = '11.2';
$prev_version = '11.1';
$link_prefix = './index.php?file=Collatinus_';
$link_base =  $link_prefix.$version;
$link_full		=  $link_base.'_full';
$link_medium 	=  $link_base.'_medium';
$link_mini 		=  $link_base.'_mini';

// textes
$label_full 	= "Full version (9 dictionaries)";
$label_medium = "Medium version (4 dictionaries)";
$label_mini 	= "Light version (2 dictionaries)";

$desc_full		= "Lewis &amp; Short 1879 / Gaffiot 2016 / Du Cange 1883 / Georges 1913 / Jeanneau 2017 / Valbuena 1819 / Gaffiot 1934 / Calonghi 1898 / Quicherat 1836";
$desc_medium	= "Lewis &amp; Short 1879 / Gaffiot 2016 / Du Cange 1883 / Georges 1913";
$desc_mini		= "Lewis &amp; Short 1879 / Gaffiot 2016";
?>

<section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
			<div class="col-sm-7 col-md-8">
				<h1>Collatinus <small><?php echo $version_txt; ?></small></h1>
				<h2>Lemmatiser and morphological analyser <br/> for Latin texts</h2>
			</div>
		    <div class="col-sm-5 col-md-4 text-right">
		    	<div class="buttons-container">

				    <?php if( !$detect->isMobile() ): ?>

				    <div class="btn-group">
				    	<?php if ($os == 'mac'): ?>
				    		<button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-apple"></span>Download for <?php echo $oslabel ?> <span class="caret"></span></button>
				    	<?php elseif ($os == 'win'): ?>
				    		<button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-windows"></span>Download for <?php echo $oslabel ?> <span class="caret"></span></button>
				    	<?php elseif($os == 'linux'): ?>
				    		<button type="button" class="btn btn-lg" href="https://packages.ubuntu.com/cosmic/collatinus" data-toggle="tooltip" data-placement="bottom" data-original-title="Available in the Universe repository for Ubuntu 18.10 (Cosmic). For Debian : available only in the unstable repository (sid)"><span class="fa fa-linux"></span>Package available for Ubuntu/Debian</button>
						<?php endif; ?>

				    	<!-- <button class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-exanded="false"><span class="caret"><span class="sr-only">Toggle Dropdown</span></span></button> -->
					    <ul class="dropdown-menu">
					    <?php if ($os == 'mac'): ?>
					    	<li><a href="<?php echo $link_full.$ext; ?>"><?php echo $label_full ?></a></li>
					    	<li><a href="<?php echo $link_medium.$ext; ?>"><?php echo $label_medium ?></a></li>
					    	<li><a href="<?php echo $link_mini.$ext; ?>"><?php echo $label_mini ?></a></li>
					    <?php elseif ($os == 'win'): ?>
					    	<li><a href="<?php echo $link_full."_win64".$ext; ?>"><?php echo $label_full ?> - 64 bits</a></li>
					    	<li><a href="<?php echo $link_medium."_win64".$ext; ?>"><?php echo $label_medium ?> - 64 bits</a></li>
					    	<li><a href="<?php echo $link_mini."_win64".$ext; ?>"><?php echo $label_mini ?> - 64 bits</a></li>
					    	<li role="separator" class="divider"></li>
					    	<li><a href="<?php echo $link_full."_win32".$ext; ?>"><?php echo $label_full ?> - 32 bits</a></li>
					    	<li><a href="<?php echo $link_medium."_win32".$ext; ?>"><?php echo $label_medium ?> - 32 bits</a></li>
					    	<li><a href="<?php echo $link_mini."_win32".$ext; ?>"><?php echo $label_mini ?> - 32 bits</a></li>
					    <?php endif; ?>
					    </ul>
				    </div>

					<?php else: ?>
						<button class="btn btn-lg btn-danger" type="button" disabled="disabled">No version available for your system</button>
					<?php endif; ?>

			    <div class="clearfix"></div>
	    		<a href="https://github.com/biblissima/collatinus" class="btn btn-lg"><span class="fa fa-github"></span>Collatinus on Github</a>
	    		<a href="/en/collatinus-web" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="based on Collatinus 11.2">Try the online app</a>
		    </div>
		  </div>
		</div>
	</div>
</section>

<div class="main-container container" role="main">
	<div class="row">
	    <section class="col-sm-12">
			<div class="region region-content">
				<ul class="nav nav-pills nav-justified" id="collatinusTabs" role="tablist">
					<li role="presentation" class="active"><a href="#presentation" aria-controls="presentation" role="tab">Presentation</a></li>
					<li role="presentation"><a href="#news" aria-controls="news" role="tab">New features</a></li>
					<li role="presentation"><a href="#screenshots" aria-controls="screenshots" role="tab">Screenshots</a></li>
					<li role="presentation"><a href="#downloads" aria-controls="downloads" role="tab">Downloads</a></li>
					<li role="presentation"><a href="#faq" aria-controls="faq" role="tab">FAQ</a></li>
					<li role="presentation"><a href="#credits" aria-controls="credits" role="tab">Credits</a></li>
				</ul>
				<div class="tab-content">
					<section role="tabpanel" class="tab-pane active fade in" id="presentation">
						<h1>Presentation</h1>
						<p class="lead">
							Collatinus is a free multi-OS (Mac, Windows, Ubuntu and Debian GNU/Linux) and open source application that is easy to install and use.
						</p>
						<p>
							Collatinus is both a lemmatiser and a morphological analyser for Latin texts: if a conjugated or declined form of a word is entered, it is capable of finding the correct root word to search for in the dictionary and then displaying its translation into another language, its different meanings, and any other information usually found in dictionaries. 
						</p>
						<p>
							In practice, Collatinus will be useful mostly for Latin teachers and professors who can quickly generate a complete lexical aid for any text and distribute it to their students. Students often use Collatinus as a reference when reading Latin texts, as they develop their vocabulary and language skills.
						</p>
						<h2>Main Features</h2>
			    	<ul>
			    	    <li>lemmatise a Latin word or a full Latin text</li>
			    	    <li>translate lemmas using the Latin dictionaries included in the application</li>
			    	    <li>display syllable quantities (long and short syllables) and inflection (declension and conjugation)</li>
			    	</ul>
			    	<h2>Help</h2>
            <p><a href="/fr/collatinus/aide/" target="_blank" rel="noreferrer noopener">Read the help pages</a> (in French)</p>
				    <div class="well">
				    	<h2>Advantages of Collatinus</h2>
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
						<h1>New features</h1>
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
						<h1>Screenshots</h1>
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
						<h1>Downloads</h1>

						<p>There are <strong>three versions</strong> of Collatinus available (customisable). The difference is the number of pre-installed dictionaries that come with the application:</p>
						<ul>
							<li>full (9 dictionaries)</li>
							<li>medium (5 dictionaries)</li>
							<li>light (2 dictionaries)</li>
						</ul>

						<p>These versions can be completed at any time by <strong>downloading one or more of the dictionaries</strong> listed below and by installing them from the <code>Extra</code> menu in Collatinus.</p>

						<h2>Dictionaries</h2>
						<p>The following dictionaries are compatible with Collatinus <strong>version 11 and higher</strong>.</p>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<h4 style="margin-top:15px;">In text mode:</h4>
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
								<h4 style="margin-top:15px;">In image mode:</h4>
								<ul class="list-no-margin">
									<li><a download href="/collatinus/ressources/Calonghi_1898-avr17.col" title="Calonghi F., Dizionario latino-italiano, 1898">Calonghi 1898</a> (62 Mo &mdash; latin-italian)</li>
									<li><a download href="/collatinus/ressources/de_Miguel_1867-dec18.col">De Miguel 1867</a> (153 Mo &mdash; latin-spanish)</li>
									<li><a download href="/collatinus/ressources/Faria_Junqueira_1975-sep20.col">Faria 1975</a> (171 Mo — latin-portuguese) <span class="label label-info">New</span></li>
							    <li><a download href="/collatinus/ressources/Gaffiot_1934-avr17.col" title="Gaffiot F., Dictionnaire illustré latin-français, 1934">Gaffiot 1934</a> (101 Mo &mdash; latin-french)</li>
							    <li><a download href="/collatinus/ressources/Noel_1851-nov19.col" title="">Nöel 1851</a> (218 Mo &mdash; latin-french)</li>
							    <li><a download href="/collatinus/ressources/Valbuena_1819-avr17.col" title="Valbuena, Diccionario universal latino-español">Valbuena 1819</a> (86 Mo &mdash; latin-spanish)</li>
							  </ul>
							  <ul class="list-no-margin">
							    <li><a download href="/collatinus/ressources/Quicherat_1836-avr17.col">Quicherat 1836</a> (303 Mo &mdash; prosodic french)</li>
							    <li><a download href="/collatinus/ressources/Franklin_1875-mai19.col" title="Dictionnaire des noms, surnoms et pseudonymes latins de l'histoire littéraire du Moyen Âge (1100 à 1530)">Franklin 1867</a> (17 Mo &mdash; proper nouns)</li>
							    <li><a download href="/collatinus/ressources/Noel_1824-mai19.col" title="Dictionnaire étymologique des noms propres et surnoms hébreux, arabes, grecs et romains">Noël 1824</a> (21 Mo &mdash; etymology of proper nouns)</li>
								</ul>
							</div>
						</div>

						<h2>Collatinus <?php echo $version_txt; ?> (current version)</h2>

						<?php if (!$detect->isMobile()): ?>

						<div class="row">

							<div class="col-md-4 col-sm-6">
								<h3>Full version<br />
								<small>(9 dictionaries included)</small></h3>

								<?php if($os == 'mac'): ?>
									<a href="<?php echo $link_full.$ext; ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Download for <?php echo $oslabel; ?></a>

								<?php elseif ($os == 'win'): ?>
									Download for <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_full."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_full."_win64".$ext; ?>">64 bits</a>

								<?php elseif ($os == 'linux'): ?>
									<a class="btn btn-lg" href="https://packages.ubuntu.com/cosmic/collatinus" data-toggle="tooltip" data-placement="bottom" data-original-title="Available in the Universe repository for Ubuntu 18.10 (Cosmic). For Debian : available only in the unstable repository (sid)"><span class="fa fa-linux"></span>Package available for Ubuntu/Debian</a>
									
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
								<h3>Medium version<br />
								<small>(5 dictionaries included)</small></h3>

								<?php if($os == 'mac'): ?>
								  <a href="<?php echo $link_medium.$ext; ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Download for <?php echo $oslabel; ?></a>

								<?php elseif ($os == 'win'): ?>
									Download for <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_medium."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_medium."_win64".$ext; ?>">64 bits</a>

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
								<h3>Light version<br />
								<small>(2 dictionaries included)</small></h3>

								<?php if ($os == 'mac'): ?>
								  <a href="<?php echo $link_mini.$ext ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Download for <?php echo $oslabel ?></a>

								<?php elseif ($os == 'win'): ?>
									Download for <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_mini."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_mini."_win64".$ext; ?>">64 bits</a>

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
								<h3>Sources</h3>
								<div class="btn-container">
									<a class="btn btn-lg" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus 11 on Github</a>
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
						            <td align="center"><a href="<?php echo $link_full.".dmg"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td align="center"><a href="<?php echo $link_full."_win32.exe"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td align="center"><a href="<?php echo $link_full."_win64.exe"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td rowspan="3" class="hasRowSpan debian-logo">
						            	<a href="https://packages.debian.org/source/buster/collatinus" data-placement="bottom" data-toggle="tooltip" data-original-title="Deb package and source available on Debian repositories"><img src="/images/debian.png" alt="logo Debian" width="32" height="40"><small>Debian package</small></a>
						            </td>
							        </tr>
							        <tr>
						            <td>Medium version</td>
						            <td align="center"><a href="<?php echo $link_medium.".dmg"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td align="center"><a href="<?php echo $link_medium."_win32.exe"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td align="center"><a href="<?php echo $link_medium."_win64.exe"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
							        </tr>
							        <tr>
						            <td>Light version</small></td>
						            <td align="center"><a href="<?php echo $link_mini.".dmg"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td align="center"><a href="<?php echo $link_mini."_win32.exe"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
						            <td align="center"><a href="<?php echo $link_mini."_win64.exe"; ?>"><span class="glyphicon glyphicon-download"></span></a></td>
							        </tr>
							    </tbody>
								</table>
							</div>
						</div>

						<div class="row">
							<h2>Archives (previous versions)</h2>

							<h3>Collatinus 11.1</h3>

							<div class="col-sm-12">
								<?php if (!$detect->isMobile()): ?>
								  
								  <h4>Full version <small>(all dictionaries included)</small></h4>
									<?php if($os == 'mac'): ?>
									    <a href="index.php?file=Collatinus_11.1_full.dmg" class="btn btn-sm">Download for <?php echo $oslabel; ?></a>
									    <small class="text-muted">&nbsp;(.dmg)</small>
									<?php elseif ($os == 'win'): ?>
										<a href="index.php?file=Collatinus_11.1_full_win32.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (32 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									  <a href="index.php?file=Collatinus_11.1_full_win64.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (64 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									<?php elseif ($os == 'linux'): ?>
										<p class="text-danger"><small>The Ubuntu/Debian package for version 11 is provided without dictionaries (see below).</small></p>
									<?php endif; ?>

									<h4>Medium version <small>(5 dictionaries included)</small></h4>
									<?php if($os == 'mac'): ?>
									    <a href="index.php?file=Collatinus_11.1_medium.dmg" class="btn btn-sm">Download for <?php echo $oslabel; ?></a>
									    <small class="text-muted">&nbsp;(.dmg)</small>
									<?php elseif ($os == 'win'): ?>
										<a href="index.php?file=Collatinus_11.1_medium_win32.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (32 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									  <a href="index.php?file=Collatinus_11.1_medium_win64.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (64 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									<?php elseif ($os == 'linux'): ?>
										<p class="text-danger"><small>The Ubuntu/Debian package for version 11 is provided without dictionaries (see below).</small></p>
									<?php endif; ?>
									
									<h4>Light version <small>(2 dictionaries included)</small></h4>

									<?php if ($os == 'mac'): ?>
									 		<a href="index.php?file=Collatinus_11.1_mini.dmg" class="btn btn-sm">Download for <?php echo $oslabel ?></a>
										  <small class="text-muted">&nbsp;(.dmg)</small>
										<?php elseif ($os == 'win'): ?>
											<a href="index.php?file=Collatinus_11.1_mini_win32.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (32 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
										  <a href="index.php?file=Collatinus_11.1_mini_win64.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (64 bits)</a>
										    <small class="text-muted">&nbsp;(.exe)</small>
										<?php elseif ($os == 'linux'): ?>
											<a href="https://packages.debian.org/cosmic/collatinus" role="button" class="btn btn-sm"></a>
							         <p class="text-danger"><small>The Ubuntu/Debian package for version 11 is provided without dictionaries.<br/>
											It is possible to install them by using the menu entry "Lexiques > Ajouter et corriger les lexiques".<br/>
											The recommanded package <a href="https://packages.ubuntu.com/cosmic/felix-latin-data">felix-latin-data</a> enables the latin-french dictionary (Gaffiot) (requires <a href="https://packages.ubuntu.com/cosmic/djvulibre-bin">Djvu</a>).</small></p>
										<?php endif; ?>

								<?php else: ?>
									<button class="btn btn-sm btn-danger" type="button" disabled="disabled">No compatible version for your system</button>
									<p class="text-muted"><small>This software is available only as a desktop application for Mac OS, Windows and Debian GNU/Linux.</small></p>
								<?php endif; ?>

								<h4>Sources</h4>
								<div class="btn-container">
									<a class="btn btn-sm" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus 11 on Github</a>
								</div>
							</div>

							<h3>Collatinus 11 (bêta)</h3>

							<div class="col-sm-12">
								<?php if (!$detect->isMobile()): ?>
								  
								  <h4>Full version <small>(all dictionaries included)</small></h4>
									<?php if($os == 'mac'): ?>
									    <a href="index.php?file=Collatinus_11.beta_full.dmg" class="btn btn-sm">Download for <?php echo $oslabel; ?></a>
									    <small class="text-muted">&nbsp;(.dmg)</small>
									<?php elseif ($os == 'win'): ?>
										<a href="index.php?file=Collatinus_11.beta_full_win32.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (32 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									  <a href="index.php?file=Collatinus_11.beta_full_win64.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (64 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									   <a href="index.php?file=Collatinus_11.beta_full_winXP.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (Windows XP)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									<?php elseif ($os == 'linux'): ?>
										<p class="text-danger"><small>The Debian package for version 10.2 is provided without dictionaries (see below).</small></p>
									<?php endif; ?>

									<h4>Medium version <small>(5 dictionaries included)</small></h4>
									<?php if($os == 'mac'): ?>
									    <a href="index.php?file=Collatinus_11.beta_medium.dmg" class="btn btn-sm">Download for <?php echo $oslabel; ?></a>
									    <small class="text-muted">&nbsp;(.dmg)</small>
									<?php elseif ($os == 'win'): ?>
										<a href="index.php?file=Collatinus_11.beta_medium_win32.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (32 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									  <a href="index.php?file=Collatinus_11.beta_medium_win64.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (64 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									  <a href="index.php?file=Collatinus_11.beta_medium_winXP.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (Windows XP)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									<?php elseif ($os == 'linux'): ?>
										<p class="text-danger"><small>The Debian package for version 10.2 is provided without dictionaries (see below).</small></p>
									<?php endif; ?>
									
									<h4>Light version <small>(2 dictionaries included)</small></h4>

									<?php if ($os == 'mac'): ?>
									 		<a href="index.php?file=Collatinus_11.beta_mini.dmg" class="btn btn-sm">Download for <?php echo $oslabel ?></a>
										  <small class="text-muted">&nbsp;(.dmg)</small>
										<?php elseif ($os == 'win'): ?>
											<a href="index.php?file=Collatinus_11.beta_mini_win32.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (32 bits)</a>
									    <small class="text-muted">&nbsp;(.exe)</small>
										  <a href="index.php?file=Collatinus_11.beta_mini_win64.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (64 bits)</a>
										    <small class="text-muted">&nbsp;(.exe)</small>
										  <a href="index.php?file=Collatinus_11.beta_mini_winXP.exe" class="btn btn-sm">Download for <?php echo $oslabel ?> (Windows XP)</a>
										    <small class="text-muted">&nbsp;(.exe)</small>
										<?php elseif ($os == 'linux'): ?>
											<a href="https://packages.debian.org/jessie/collatinus" role="button" class="btn btn-sm"></a>
							         <p class="text-danger"><small>The Debian package for version 10.2 is provided without dictionaries.<br/>
											It is possible to install them by using the menu entry "Lexiques > Ajouter et corriger les lexiques".<br/>
											The recommanded package <a href="https://packages.debian.org/jessie/felix-latin-data">felix-latin-data</a> enables the latin-french dictionary (Gaffiot) (requires <a href="https://packages.debian.org/jessie/djvulibre-bin">Djvu</a>).</small></p>
										<?php endif; ?>

								<?php else: ?>
									<button class="btn btn-sm btn-danger" type="button" disabled="disabled">No compatible version for your system</button>
									<p class="text-muted"><small>This software is available only as a desktop application for Mac OS, Windows and Debian GNU/Linux.</small></p>
								<?php endif; ?>

								<h4>Sources</h4>
								<div class="btn-container">
									<a class="btn btn-sm" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus 11 on Github</a>
								</div>
							</div>

							<h3>Collatinus 10.2.2</h3>

							<div class="col-sm-6">
							  <h3>Standard version <small>(includes all dictionaries)</small></h3>
								<?php if (!$detect->isMobile()): ?>
									<?php if($os == 'mac'): ?>
									    <a href="<?php echo $link_std; ?>" class="btn btn-sm">Download for <?php echo $oslabel; ?></a>
									    <small class="text-muted">&nbsp;(.zip) - Tested with Mac OS 10.6 to 10.9</small>
									<?php elseif ($os == 'win'): ?>
										<a href="<?php echo $link_std; ?>" class="btn btn-sm">Download for <?php echo $oslabel ?></a>
									  <small class="text-muted">&nbsp;(.exe)</small>
									<?php elseif ($os == 'linux'): ?>
										<p class="text-danger"><small>The Debian package for version 10.2 is provided without dictionaries (see below).</small></p>
									<?php endif; ?>
								    <h3>Light version <small>(no dictionaries)</small></h3>
								    <?php if ($os == 'mac'): ?>
									    <a href="<?php echo $link_lite ?>" class="btn btn-sm">Download for <?php echo $oslabel ?></a>
									    <small class="text-muted">&nbsp;(.zip) - Tested with Mac OS 10.6 to 10.9</small>
									<?php elseif ($os == 'win'): ?>
										<a href="<?php echo $link_lite ?>" class="btn btn-sm">Download for <?php echo $oslabel ?></a>
									    <small class="text-muted">&nbsp;(.exe)</small>
									<?php elseif ($os == 'linux'): ?>
										<a href="https://packages.debian.org/jessie/collatinus" role="button" class="btn btn-lg">Available in the Debian repositories</a>
						                <p class="text-danger"><small>The Debian package for version 10.2 is provided without dictionaries.<br>
										It is possible to install them by using the menu entry "Lexiques > Ajouter et corriger les lexiques".
										<br>
										The recommanded package <a href="https://packages.debian.org/jessie/felix-latin-data">felix-latin-data</a> enables the latin-french dictionary (Gaffiot) (requires <a href="https://packages.debian.org/jessie/djvulibre-bin">Djvu</a>).</small></p>
									<?php endif; ?>
								<?php else: ?>
									<button class="btn btn-sm btn-danger" type="button" disabled="disabled">No compatible version for your system</button>
          							<p class="text-muted"><small>This software is available only as a desktop application for Mac OS, Windows and Debian GNU/Linux.</small></p>
          						<?php endif; ?>

								<h3>Source code</h3>
								<a class="btn btn-sm" href="<?php echo $link_base; ?>_src.zip">Source code</a>
								<small class="text-muted">&nbsp;(.zip)</small>
								<div class="btn-container">
								    <a class="btn btn-sm" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus on Github</a>
								</div>
							</div>

							<div class="col-sm-6">
								<h3>All versions <small>(by dictionary language and by OS)</small></h3>
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
								            <td>French <small>(Gaffiot, 1934)</small></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_mac_fr.zip"><span class="glyphicon glyphicon-download"></span></a></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_win_fr.exe"><span class="glyphicon glyphicon-download"></span></a></td>
								            <td rowspan="5" class="hasRowSpan debian-logo">
								                <a href="https://packages.debian.org/jessie/collatinus" data-placement="bottom" data-toggle="tooltip" data-original-title="Debian package and sources available in the Debian testing repository (jessie)"><img src="/images/debian.png" alt="logo Debian" width="32" height="40"><small>Debian package</small></a>
								            </td>
								        </tr>
								        <tr>
								            <td>English <small>(Lewis &amp; Short, 1879)</small></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_mac_en.zip"><span class="glyphicon glyphicon-download"></span></a></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_win_en.exe"><span class="glyphicon glyphicon-download"></span></a></td>
								        </tr>
								        <tr>
								            <td>German <small>(K. E. Georges, 1913)</small></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_mac_de.zip"><span class="glyphicon glyphicon-download"></span></a></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_win_de.exe"><span class="glyphicon glyphicon-download"></span></a></td>
								        </tr>
								        <tr>
								            <td>Italian <small>(Calonghi, 1898)</small></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_mac_it.zip"><span class="glyphicon glyphicon-download"></span></a></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_win_it.exe"><span class="glyphicon glyphicon-download"></span></a></td>
								        </tr>
								        <tr>
								            <td>Standard versions <small>(4 dictionaries)</small></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_mac_standard.zip"><span class="glyphicon glyphicon-download"></span></a></td>
								            <td align="center"><a href="<?php echo $link_base; ?>_win_standard.exe"><span class="glyphicon glyphicon-download"></span></a></td>
								        </tr>
								    </tbody>
								</table>
							</div>
						</div>
					</section>

 			<section role="tabpanel" class="tab-pane fade" id="faq">
						<h1>FAQ</h1>
						<p>Apologies, the FAQ is only available <a href="/fr/collatinus#faq">in French</a>.</p>
						<!--<dl>
						    <dt><span class="glyphicon glyphicon-chevron-right"></span> Comment voir une page du Gaffiot sur Mac ?</dt>
						    <dd>
						        <p>Pour afficher une page du Gaffiot (ou du Calonghi et, plus généralement, de tous les dictionnaires présents sous la forme d'un fichier djvu), Collatinus utilise un programme externe qui convertit une page du fichier djvu en une image Tiff. Il faut donc installer l'utilitaire <strong>DjVuLibre</strong> (libre et gratuit) que l'on trouvera sur SourceForge :
						            <a href="http://sourceforge.net/projects/djvu/files/">http://sourceforge.net/projects/djvu/files/</a></p>
						        <p>L'installation est standard et une application <strong>DjView</strong> (ou DjView.app) doit apparaître dans le dossier <code>Applications</code>. Vous êtes alors prêt pour consulter le Gaffiot dans Collatinus.</p>
						    </dd>
						    <dt><span class="glyphicon glyphicon-chevron-right"></span> Je voudrais ajouter des lemmes dans le lexique de Collatinus. Où sont les données que Collatinus exploite ?</dt>
						    <dd>
						        <p>Sous Windows, toutes les données sont dans le répertoire <code>ressources/</code> à côté de l'exécutable <code>Collatinus.exe</code>. Sur un Mac, elles sont un peu plus cachées. Pour les voir, il faut commencer par <em>"Afficher le contenu du paquet"</em> avec un clic droit (ou ctrl-clic) sur <code>Collatinus.app</code>. On avance alors dans l'arborescence <code>Contents/MacOS/ressources</code> et là on trouve tous les fichiers qu'utilise Collatinus. Attention, à manipuler avec précaution !</p>
						        <p>Si on veut ajouter des lemmes dans le lexique de Collatinus, on ouvrira <code>lemmata.la</code> avec un éditeur de texte ou un tableur (le fichier est au format CSV avec le caractère "|" comme séparateur de champs). On se réfèrera à l'aide en ligne pour connaître l'usage des divers champs. Si toutes les données sont correctes, Collatinus sait fléchir ce nouveau lemme et reconnaître dans un texte toutes ses formes. Pour donner une traduction à ce nouveau mot, il faut intervenir dans les <code>lemmata.*</code> (lemmata.fr pour les traductions françaises).</p>
						        <p>Des données erronées peuvent conduire à un comportement imprévisible. Si on prévoit de revenir souvent dans le répertoire <code>ressources/</code>, on peut en faire un alias que l'on met à un endroit plus accessible et qui pointera vers l'emplacement souhaité.</p>
						    </dd>
						    <dt><span class="glyphicon glyphicon-chevron-right"></span> Je souhaite ajouter un dictionnaire à Collatinus. Comment faire ?</dt>
						    <dd>
						        <p>Tout d'abord, il faut distinguer deux types d'objets différents qui correspondent au sens courant de dictionnaire :</p>
						        <ul>
						            <li>les <strong>lexiques</strong> : Collatinus les utilise pour reconnaître les formes fléchies et donner le sens du lemme correspondant. Ces fichiers sont nommés <code>lemmata.*</code> et se trouvent dans le répertoire <code>ressources/</code>.</li>
						            <li>les "vrais" <strong>dictionnaires</strong> (comme le Gaffiot, le Lewis &amp; Short, etc...) : ces dictionnaires doivent être dans un format entièrement numérique XML/HTML (fichier .xml) ou dans un format image (fichier .djvu). Ils sont rangés dans le répertoire <code>ressources/dicos</code> et sont accompagnés d'un fichier d'index (fichier .idx) et d'un fichier de configuration (fichier .cfg). Eventuellement complétés par un feuille de transformation (fichier .xsl) et/ou une feuille de style (fichier .css).</li>
						        </ul>
						        <p>Aujourd'hui, avec la version 10.2, l'utilisateur peut ajouter tout seul des lexiques (ou des entrées dans les lexiques existants) ou des dictionnaires en djvu, à ses risques et périls. Pour que le programme reconnaisse un nouveau dictionnaire, les fichiers <code>mon_dico.cfg</code> et <code>mon_dico.idx</code>, dans le répertoire <code>ressources/dicos</code> à côté de <code>mon_dico.djvu</code>, sont indispensables (et <code>mon_dico</code> ne sera visible qu'après redémarrage du programme).
						            <br>On s'inspirera des fichiers existants pour constituer le fichier .cfg ; l'item <code>"debut="</code> doit être un entier et indique le nombre de pages à sauter au début du fichier pour trouver le premier mot de l'index ; l'item <code>"echelle="</code> est aussi un entier (en %) et permet d'agrandir (ou rapetisser) l'image pour l'affichage à l'écran, par défaut l'échelle vaut 160.
						            <br>Le fichier .idx contient l'index du dictionnaire et doit être constitué à la main. Il faut relever le premier mot de chaque page et le mettre, en minuscules, sur les lignes successives du fichier. Les mots doivent être en ordre alphabétique, ce qui est en général le cas pour un dictionnaire mais attention aux exceptions (certains placent le "ph" avec le "f" entre le "e" et le "g").</p>
						        <p>Pour les dictionnaires en XML/HTML, la constitution de l'index doit passer par un programme et nécessite quelques manipulations trop complexes pour être décrites ici, mais nous pouvons le faire pour vous. Les règles générales pour le format du fichier .xml sont que chaque article occupe une ligne (et une seule) et que le lemme doit être facilement identifiable (par exemple, le premier mot entre des balises <code>&lt;H1&gt;&lt;/H1&gt;</code> ou l'attribut key de la balise EntryFree...).</p>
						    </dd>
						</dl>-->
					</section> 
					<section role="tabpanel" class="tab-pane fade" id="credits">
						<h1>Credits</h1>
						<p>Collatinus is developed and maintained Yves Ouvrard, with the valuable support of Philippe Verkerk</p>
						<p>It is available under the GNU GPL licence</p>
						<p>With thanks to William Whitaker †, Jose Luis Redrejo, Georges Khaznadar, Matthias Bussonier, Gérard Jeanneau, Philippe Verkerk, Jean-Paul Woitrain, Philipp Roelli, Perseus Digital Library.</p>
					</section>
				</div>
			</div>
	  </section>
	</div>
</div>

<section class="content-bottom">  
	<div class="container">
		<div class="row">
		    <div class="col-sm-9">
		      <p>Collatinus is developed and maintained by Yves Ouvrard and Philippe Verkerk. It is made available under the <a rel="license" href="http://www.gnu.org/licenses/gpl.html">GNU GPL v3</a> licence.</p>
		    </div>
		    <div class="col-sm-3">
		        <p>Any feedback or questions?<br/>
		        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:collatinus@biblissima-condorcet.fr">Contact us</a></p>
		    </div>
		</div>
	</div>
</section>
