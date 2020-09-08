---
title: Collatinus
id: collatinus
description: Lemmatiseur et analyseur morphologique de textes latins
description_meta: Collatinus est un logiciel libre et gratuit pour la lemmatisation et l'analyse morphologique de textes latins. Il est disponible pour Mac, GNU/Linux et Windows.
url: /fr/collatinus/
lang: fr
categories: [pages] 
layout: default-banner
id_stat: 5
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
$label_full 	= "Version complète (9 dictionnaires)";
$label_medium = "Version intermédiaire (4 dictionnaires)";
$label_mini 	= "Version minimale (2 dictionnaires)";

$desc_full		= "Lewis &amp; Short 1879 / Gaffiot 2016 / Du Cange 1883 / Georges 1913 / Jeanneau 2017 / Valbuena 1819 / Gaffiot 1934 / Calonghi 1898 / Quicherat 1836";
$desc_medium	= "Lewis &amp; Short 1879 / Gaffiot 2016 / Du Cange 1883 / Georges 1913";
$desc_mini		= "Lewis &amp; Short 1879 / Gaffiot 2016";
?>

<section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
			<div class="col-sm-7 col-md-8">
				<h1>Collatinus <small><?php echo $version_txt; ?></small></h1>
				<h2>Lemmatiseur et analyseur <br/>morphologique de textes latins</h2>
			</div>
		    <div class="col-sm-5 col-md-4 text-right">
		    	<div class="buttons-container">

				    <?php if( !$detect->isMobile() ): ?>

				    <div class="btn-group">
				    	<?php if ($os == 'mac'): ?>
				    		<button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-apple"></span>Télécharger pour <?php echo $oslabel ?> <span class="caret"></span></button>
				    	<?php elseif ($os == 'win'): ?>
				    		<button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-windows"></span>Télécharger pour <?php echo $oslabel ?> <span class="caret"></span></button>
				    	<?php elseif($os == 'linux'): ?>
				    		<button type="button" class="btn btn-lg" href="https://packages.ubuntu.com/cosmic/collatinus" data-toggle="tooltip" data-placement="bottom" data-original-title="Disponible dans les dépôts Universe d'Ubuntu 18.10 (Cosmic). Pour Debian : disponible uniquement dans les dépôts unstable (sid)"><span class="fa fa-linux"></span>Paquet disponible pour Ubuntu/Debian</button>
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
						<button class="btn btn-lg btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
					<?php endif; ?>

			    <div class="clearfix"></div>
	    		<a href="https://github.com/biblissima/collatinus" class="btn btn-lg"><span class="fa fa-github"></span>Collatinus sur Github</a>
	    		<a href="/fr/collatinus-web" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Utilise la version 11.2 de Collatinus">Tester la version web</a>
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
					<li role="presentation" class="active"><a href="#presentation" aria-controls="presentation" role="tab">Présentation</a></li>
					<li role="presentation"><a href="#news" aria-controls="news" role="tab">Nouveautés</a></li>
					<li role="presentation"><a href="#screenshots" aria-controls="screenshots" role="tab">Captures d'écran</a></li>
					<li role="presentation"><a href="#downloads" aria-controls="downloads" role="tab">Téléchargements</a></li>
					<li role="presentation"><a href="#faq" aria-controls="faq" role="tab">FAQ</a></li>
					<li role="presentation"><a href="#credits" aria-controls="credits" role="tab">Crédits</a></li>
				</ul>
				<div class="tab-content">
					<section role="tabpanel" class="tab-pane active fade in" id="presentation">
						<h1>Présentation</h1>
						<p class="lead">
							Collatinus est une application libre, gratuite et multi-plateforme (Mac, Windows, Ubuntu et Debian GNU/Linux), simple à installer et facile à utiliser.
						</p>
						<p>
							Collatinus est à la fois <strong>un lemmatiseur et un analyseur morphologique de textes latins</strong> : il est capable, si on lui donne une forme déclinée ou conjuguée, de trouver quel mot il faudra chercher dans le dictionnaire pour avoir sa traduction dans une autre langue, ses différents sens, et toutes les autres données que fournit habituellement un dictionnaire.
						</p>
						<p>
							En pratique, il est utile surtout au professeur de latin, qui peut ainsi très rapidement, à partir d’un texte hors-manuel, distribuer à ses élèves un texte inédit avec son aide lexicale. Les élèves s’en servent souvent pour lire plus facilement le latin lorsque leurs connaissances lexicales et morphologiques sont encore insuffisantes.
						</p>
				    <div class="well">
				    	<h2>Principales fonctionnalités</h2>
				    	<ul>
				    	    <li>lemmatisation de mots latins ou d'un texte latin entier,</li>
				    	    <li>traduction des lemmes grâce aux dictionnaires de latin incorporés dans l'application,</li>
				    	    <li>affichage des quantités (durée longue ou brève des syllabes) et des flexions (déclinaison ou conjugaison).</li>
				    	</ul>

				    	<h2>Atouts de Collatinus</h2>
				    	<ul>
				    		<li>efficacité de la lemmatisation (~1000 mots/s. ; dépend bien sûr de la machine sur laquelle le programme tourne),</li>
				    		<li>lemmes extraits du <em>Lewis & Short 1879</em> et du <em>Gaffiot 2016</em> (avec l'autorisation de l'auteur) avec les traductions en anglais et en français. Collation avec ceux issus du <em>Georges 1913</em> et du <em>Jeanneau 2017</em> (avec l'autorisation de l'auteur),</li>
				    		<li>lexique de base de 24 155 lemmes (textes classiques du LASLA) et extension de 58 384 lemmes auxquels s'ajoutent quelques variantes graphiques et l'assimilation du préfixe,</li>
				    		<li>classement des lemmatisations et des analyses morpho-syntaxiques en fonction du nombre d'occurrences observé dans les textes du LASLA,</li>
				    		<li>traductions d'environ 11 000 lemmes dans 6 langues différentes, autres que le français et l'anglais (à améliorer)</li>
				    		<li>possibilité de coloriser un texte en fonction d'une liste de mots connus,</li>
				    		<li>scansion et accentuation d'un mot ou d'un texte,</li>
				    		<li>tagueur probabiliste basé sur les statistiques faites sur les textes du LASLA (~1 800 000 mots)</li>
				    		<li>consultation de dictionnaires en mode texte ou image (djvu). Facilité d'ajout de nouveaux dicos (djvu),</li>
				    		<li>possibilité de consulter Collatinus depuis un autre programme (par exemple, LibreOffice) via un port interne,</li>
				    		<li>possibilité d'interroger Collatinus à partir d'un client en mode console. Lemmatisation d'un texte à partir d'un fichier</li>
				    		<li>code source du logiciel organisé en modules de manière à faciliter le développement d'applications plus spécifiques</li>
				    	</ul>
				    </div>

						<h3>Historique</h3>
						<p>Collatinus était destiné, à l'origine, à produire des documents sur papier, et c'est encore souvent dans ce but que je l'utilise. J'ai commencé à le perfectionner quand je me suis aperçu que de nombreux utilisateurs s'en servaient à d'autres fins :</p>
						<ol>
						    <li>disposer, lorsqu'on lit un texte latin, d'une aide lexicale et morphologique immédiate et discrète,</li>
						    <li>faire des recherches lexicales et stylistiques,</li>
						    <li>donner aux élèves des tâches d'identification, de relevé, de transformation.</li>
						</ol>
						<h3>Principes de fonctionnement</h3>
						<p>Contrairement à la majorité des lemmatiseurs qui utilisent une liste de formes fléchies, Collatinus utilise un lexique contenant les lemmes et les informations nécessaires pour leur flexion. L'avantage est qu'avec 11 000 lemmes, Collatinus est capable de reconnaître plus d'un demi-million de formes. L'ajout du lemme correspondant à une variante orthographique (médiévale, par exemple) permettrait également de reconnaître toutes ses formes fléchies.</p>
						<p>A partir du lemme et des désinences qui lui sont associées, Collatinus peut aussi donner des tableaux de flexion qui peuvent être utiles lors de l'apprentissage du latin.</p>
						<p>Enfin, lorsque les quantités sont connues pour le lemme, Collatinus peut scander le mot et par là même tout un texte. Lorsqu'il scande un texte, Collatinus applique les règles habituelles d'allongement et d'élision.</p>

						<p>Le lexique a d'abord été constitué au fil des années par les utilisateurs de Collatinus. Il a ensuite été complété par un dépouillement systématique des dictionnaires numériques (qui sont par ailleurs consultables dans Collatinus). Il compte environ 82 000 lemmes (et probablement quelques erreurs et de nombreux doublons, en particulier avec les formes grecques en -os qui coexistent avec la forme latinisée en -us). Afin d'optimiser le temps de chargement du programme, le lexique a été divisé en deux parties inégales. Le lexique de base compte environ 24 000 lemmes et devrait permettre de lemmatiser une bonne partie de la littérature classique. L'extension du lexique (58 000 lemmes) contient pour sa part des mots peu usités. Bien évidemment, le programme peut encore achopper sur les mots les plus rares ou sur les formes irrégulières.</p>
					</section>
					<section role="tabpanel" class="tab-pane fade" id="news">
						<h1>Nouveautés</h1>
						<p>
							La version actuelle de Collatinus, numérotée <strong><?php echo $version_txt; ?></strong>, apporte son lot de nouveautés et d'améliorations :
						</p>
						<ul>
							<li>possibilité d'exporter les résultats de lemmatisation ou de tagage au format CSV</li>
							<li>récupération de quelque 13 000 traductions anglaises</li>
							<li>documentation de la partie serveur de Collatinus (en français seulement)</li>
							<li>prise en compte des alphabets non-latins avec un ordre alphabétique différent, y compris avec des digrammes, pour la consultation des dicos en djvu (si on veut, par exemple, ajouter un dictionnaire Tchèque-Latin). Possibilité de prendre en compte des caractères de même rang, par exemple ph=f et y=i, toujours en djvu</li>
							<li>corrections de bugs :
									<ul>
										<li>l'interface en anglais est maintenant fonctionnelle</li>
										<li>la lemmatisation et la traduction des mots censés être connus (lors de la colorisation d'un texte) ne sont plus données. On peut récupérer les nombres d'occurrences (donc l'utilisation) des mots connus.</li>
									</ul>
							</li>
						</ul>
						
						<p>La version 11 (bêta), sortie en juin 2017, a ajouté de nombreuses fonctionnalités au logiciel :</p>
						<ul>
							<li>lexique "complet" (85 000 entrées)</li>
							<li>rangement des lemmatisations d'une forme en fonction des fréquences</li>
							<li>consultation du Gaffiot 2016 (Gréco)</li>
							<li>possibilité de consulter deux pages de dictionnaire simultanément (synchronisées ou non)</li>
							<li>simplification de l'installation des dictionnaires</li>
							<li>possibilité d'accentuer les textes (et de marquer les syllabes)</li>
							<li>possibilité de coloriser les textes en fonction d'une liste de mots connus</li>
							<li>ajout d'un tagueur probabiliste qui tient compte du contexte (tags) pour trouver la lemmatisation "la plus probable"</li>
							<li>serveur sur un port interne qui permet une utilisation en ligne de commande avec la possibilité d'interroger Collatinus sans quitter son traitement de texte</li>
						</ul>

					</section>
					<section role="tabpanel" class="tab-pane fade" id="screenshots">
						<h1>Captures d'écran</h1>
						<div class="row">
							<div class="gallery">
								<a href="/images/captures/Coll_capt1.png" class="col-xs-6 col-md-3" title="Onglet Lexiques : lemmatisation et traduction de tous les mots d'un texte"><img src="/images/captures/Coll_capt1_min.png" alt="Capture d'écran 1"></a>
								<a href="/images/captures/Coll_capt2.png" class="col-xs-6 col-md-3" title="Onglet Dictionnaires : définition d'un mot dans le Lewis &amp; Short"><img src="/images/captures/Coll_capt2_min.png" alt="Capture d'écran 2"></a>
								<a href="/images/captures/Coll_capt3.png" class="col-xs-6 col-md-3" title="Onglet Scansion : texte avec notation des syllabes longues ou brèves"><img src="/images/captures/Coll_capt3_min.png" alt="Capture d'écran 3"></a>
								<a href="/images/captures/Coll_capt4.png" class="col-xs-6 col-md-3" title="Onglet Flexion : affichage de la conjugaison d'un mot latin"><img src="/images/captures/Coll_capt4_min.png" alt="Capture d'écran 4"></a>
							</div>
						</div>
					</section>

					<section role="tabpanel" class="tab-pane fade" id="downloads">
						<h1>Téléchargements</h1>

						<p>Collatinus est proposé en <strong>trois versions</strong>, qui se distinguent par le nombre de dictionnaires pré-installés :</p>
						<ul>
							<li>complète (9 dictionnaires)</li>
							<li>intermédiaire (5 dictionnaires)</li>
							<li>minimale (2 dictionnaires)</li>
						</ul>
 
						<p>Ces versions peuvent être complétées à tout moment en <strong>téléchargeant un ou plusieurs dictionnaires</strong> proposés ci-dessous et en les installant depuis le menu <code>Extra</code> de Collatinus.</p>

						<h2>Dictionnaires</h2>
						<p>Les dictionnaires suivants sont compatibles avec la <strong>version 11 et supérieure</strong> de Collatinus.</p>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<h4 style="margin-top:15px;">En mode texte :</h4>
								<ul class="list-no-margin">
									<li><a download href="/collatinus/ressources/Gaffiot_2016-avr17.col" title="Gaffiot 2016, par Gérard Gréco (2015-2016, CC BY-NC-ND)">Gaffiot 2016</a> (15 Mo &mdash; latin-français)</li>
									<li><a download href="/collatinus/ressources/Jeanneau_2017-avr17.col" title="Dictionnaire Latin-Français">Jeanneau 2017</a> (12 Mo &mdash; latin-français)</li>
									<li><a download href="/collatinus/ressources/Georges_1913-avr17.col" title="Georges K. E., Kleines deutsch-lateinisches Handwörterbuch, 1913">K. E. Georges 1913</a> (16 Mo &mdash; latin-allemand)</li>
									<li><a download href="/collatinus/ressources/Lewis_and_Short_1879-avr17.col" title="Lewis Ch. T., Short Ch., A Latin Dictionary, 1879">Lewis &amp; Short 1879</a> (22 Mo &mdash; latin-anglais)</li>
								</ul>
								<ul class="list-no-margin">
									<li><a download href="/collatinus/ressources/du_Cange_1883-7-oct18.col" title="Glossaire du latin médiéval (Du Cange, et al., Glossarium mediæ et infimæ latinitatis. Niort : L. Favre, 1883-1887). École nationale des Chartes)">Du Cange 1883</a> (58 Mo &mdash; glossaire du latin médiéval)</li>
									<li><a download href="/collatinus/ressources/Koebler_2010-jan20.col">Köbler 2010</a> (34 Mo &mdash; latin médiéval-allemand) <span class="label label-info">Nouveau</span></li>
									<li><a download href="/collatinus/ressources/Ramminger_2020-jan20.col">Ramminger 2020</a> (9 Mo &mdash; néolatin-allemand) <span class="label label-info">Nouveau</span></li>
								</ul>
							</div>
							<div class="col-md-6 col-sm-12">
								<h4 style="margin-top:15px;">En mode image :</h4>
								<ul class="list-no-margin">
									<li><a download href="/collatinus/ressources/Calonghi_1898-avr17.col" title="Calonghi F., Dizionario latino-italiano, 1898">Calonghi 1898</a> (62 Mo &mdash; latin-italien)</li>
									<li><a download href="/collatinus/ressources/de_Miguel_1867-dec18.col">De Miguel 1867</a> (153 Mo &mdash; latin-espagnol)</li>
									<li><a download href="/collatinus/ressources/Faria_Junqueira_1975-sep20.col">Faria 1975</a> (171 Mo — latin-portugais) <span class="label label-info">Nouveau</span></li>
							    <li><a download href="/collatinus/ressources/Gaffiot_1934-avr17.col" title="Gaffiot F., Dictionnaire illustré latin-français, 1934">Gaffiot 1934</a> (101 Mo &mdash; latin-français)</li>
									<li><a download href="/collatinus/ressources/Noel_1851-nov19.col" title="">Nöel 1851</a> (218 Mo &mdash; latin-français)</li>
							    <li><a download href="/collatinus/ressources/Valbuena_1819-avr17.col" title="Valbuena, Diccionario universal latino-español">Valbuena 1819</a> (86 Mo &mdash; latin-espagnol)</li>
							  </ul>
							  <ul class="list-no-margin">
							    <li><a download href="/collatinus/ressources/Quicherat_1836-avr17.col">Quicherat 1836</a> (303 Mo &mdash; prosodique français)</li>
							    <li><a download href="/collatinus/ressources/Franklin_1875-mai19.col" title="Dictionnaire des noms, surnoms et pseudonymes latins de l'histoire littéraire du Moyen Âge (1100 à 1530)">Franklin 1867</a> (17 Mo &mdash; noms propres)</li>
							    <li><a download href="/collatinus/ressources/Noel_1824-mai19.col" title="Dictionnaire étymologique des noms propres et surnoms hébreux, arabes, grecs et romains">Noël 1824</a> (21 Mo &mdash; étymologique des noms propres)</li>
								</ul>
							</div>
						</div>

						<h2>Collatinus <?php echo $version_txt; ?> (version courante)</h2>

						<?php if (!$detect->isMobile()): ?>

						<div class="row">
							<div class="col-md-4 col-sm-6">
								<h3>Version complète<br />
								<small>(9 dictionnaires inclus)</small></h3>

								<?php if($os == 'mac'): ?>
									<a href="<?php echo $link_full.$ext; ?>" class="btn btn-lg">
										<span class="fa fa-apple"></span>Télécharger pour <?php echo $oslabel; ?>
									</a>

								<?php elseif ($os == 'win'): ?>
									Télécharger pour <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_full."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_full."_win64".$ext; ?>">64 bits</a>

								<?php elseif ($os == 'linux'): ?>
									<a class="btn btn-lg" href="https://packages.ubuntu.com/cosmic/collatinus" data-toggle="tooltip" data-placement="bottom" data-original-title="Disponible dans les dépôts Universe d'Ubuntu 18.10 (Cosmic). Pour Debian : disponible uniquement dans les dépôts unstable (sid)">
										<span class="fa fa-linux"></span>Paquet disponible pour Ubuntu/Debian
									</a>
									<p class="text-danger"><small>Le paquet Ubuntu/Debian est fourni sans dictionnaire.<br />
									Vous pouvez les télécharger depuis la section "Dictionnaires" (ci-dessous) et installer via le menu "Extra > Installer les dictionnaires téléchargés" de Collatinus.<br />
									Le paquet (recommandé) <a href="https://packages.ubuntu.com/cosmic/felix-latin-data" target="_blank">felix-latin-data</a> permet d'activer le dictionnaire Gaffiot latin-français</small></p>
								<?php endif; ?>
								<ul class="small">
									<li>Lewis &amp; Short, 1879 (latin-anglais)</li>
									<li>Gaffiot, 2016 (latin-français)</li>
									<li>Du Cange, 1883 (glossaire de latin médiéval)</li>
									<li>Georges, 1913 (latin-allemand)</li>
									<li>Jeanneau, 2017 (latin-français)</li>
									<li>Gaffiot, 1934 (latin-français)</li>
									<li>Calonghi, 1898 (latin-italien)</li>
									<li>Valbuena, 1819 (latin-espagnol)</li>
									<li>Quicherat, 1836 (latin-français)</li>
								</ul>
							</div>

							<div class="col-md-4 col-sm-6">
								<h3>Version intermédiaire<br />
								<small>(5 dictionnaires inclus)</small></h3>

								<?php if($os == 'mac'): ?>
								  <a href="<?php echo $link_medium.$ext; ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Télécharger pour <?php echo $oslabel; ?></a>

								<?php elseif ($os == 'win'): ?>
									Télécharger pour <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_medium."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_medium."_win64".$ext; ?>">64 bits</a>
								<?php endif; ?>
								<ul class="small">
									<li>Lewis &amp; Short, 1879 (latin-anglais)</li>
									<li>Gaffiot, 2016 (latin-français)</li>
									<li>Du Cange, 1883 (glossaire de latin médiéval)</li>
									<li>Georges, 1913 (latin-allemand)</li>
									<li>Jeanneau, 2017 (latin-français)</li>
								</ul>
							</div>

							<div class="col-md-4 col-sm-6">
								<h3>Version minimale<br />
								<small>(2 dictionnaires inclus)</small></h3>

								<?php if ($os == 'mac'): ?>
								  <a href="<?php echo $link_mini.$ext ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Télécharger pour <?php echo $oslabel ?></a>

								<?php elseif ($os == 'win'): ?>
									Télécharger pour <?php echo $oslabel ?> : <a class="btn" href="<?php echo $link_mini."_win32".$ext; ?>">32 bits</a> &mdash; <a class="btn" href="<?php echo $link_mini."_win64".$ext; ?>">64 bits</a>

								<?php endif; ?>
								<ul class="small">
									<li>Lewis &amp; Short, 1879 (latin-anglais)</li>
									<li>Gaffiot, 2016 (latin-français)</li>
								</ul>
							</div>
						</div>

						<?php else: ?>
							<button class="btn btn-lg btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
      				<p class="text-muted"><small>Ce programme n'est disponible qu'en version bureau pour Mac OS, Windows, Ubuntu et Debian GNU/Linux.</small></p>
      			<?php endif; ?>

      			<h3>Sources</h3>
						<div class="btn-container">
							<a class="btn btn-lg" href="https://github.com/biblissima/collatinus"><span class="fa fa-github"></span>Collatinus 11 sur Github</a>
						</div>

						<div class="row">
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
											<a href="https://packages.debian.org/cosmic/collatinus" role="button" class="btn btn-sm" data-toggle="tooltip" data-placement="bottom" data-original-title="Disponible dans les dépôts Universe d'Ubuntu 18.10 (Cosmic). Pour Debian : disponible uniquement dans les dépôts unstable (sid)">Disponible dans les dépôts Debian</a>
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
						            	<a href="https://packages.debian.org/jessie/collatinus" data-placement="bottom" data-toggle="tooltip" data-original-title="Paquet .deb et sources disponibles dans les dépôts Debian testing (jessie)"><img src="/images/debian.png" alt="logo Debian" width="32" height="40"><small>Paquet Debian</small></a>
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
						</div>
					</section>

					<section role="tabpanel" class="tab-pane fade" id="faq">
						<h1>FAQ</h1>
						<ul>
							<li><a href="#faq1">Comment installer dans Collatinus un lexique ou un dictionnaire téléchargé depuis cette page ?</a></li>
							<li><a href="#faq2">Comment voir une page d'un dictionnaire en mode image sur Mac ?</a></li>
							<li><a href="#faq3">Je voudrais ajouter des lemmes dans le lexique de Collatinus. Où sont les données que Collatinus exploite ?</a></li>
							<li><a href="#faq4">Je souhaite ajouter un nouveau dictionnaire à Collatinus. Comment faire ?</a></li>
							<li><a href="#faq5">Collatinus ne reconnaît pas certains mots pourtant assez courants. Pourquoi ?</a></li>
							<li><a href="#faq6">Pour préparer les listes de vocabulaire pour mes étudiants, je voudrais supprimer les mots trop courants qu'ils connaissent. Collatinus peut-il le faire ?</a></li>
							<li><a href="#faq7">Comment lemmatiser un texte qui contient des graphies médiévales ?</a></li>
						</ul>
						<dl>
								<dt id="faq1"><span class="glyphicon glyphicon-chevron-right"></span> Comment installer dans Collatinus un lexique ou un dictionnaire téléchargé depuis cette page ?</dt>
								<dd>
									<p>Les dictionnaires ou les lexiques disponibles sur ce site sont dans un format compressé <code>.col</code>. Ce format est reconnu par Collatinus qui décompressera le fichier téléchargé et installera tous les fichiers nécessaires là où il faut.</p>
									<p>Pour installer un dictionnaire ou un lexique, il faut procéder en deux temps :</p>
									<ol>
										<li><p>On télécharge le (ou les) dictionnaire(s) (ou lexiques) que l'on souhaite installer.<br /> <small>En général, le navigateur propose spontanément d'enregistrer le fichier cible dans le dossier "Téléchargements" (ou équivalent, si la langue du système n'est pas le français). Parfois il faut avoir recours au clic-droit (ou Cmd-clic sur Mac avec un seul bouton) pour avoir accès au menu contextuel dans lequel on peut trouver "Enregistrer la cible du lien sous..." (ou une formulation équivalente). On notera soigneusement l'endroit où le fichier est enregistré.</small></p></li>
										<li><p>Dans Collatinus, on va dans le menu <code>Extra</code> et on sélectionne l'entrée <code>Installer les dictionnaires téléchargés</code> ou <code>Installer les lexiques téléchargés</code>. Apparaît alors une fenêtre qui vous demande de localiser le fichier ".col" que vous souhaitez installer. Si tout se passe bien, l'installation se termine avec un message de confirmation.<br/> <span class="text-danger">Pour que l'installation de nouveaux lexiques soit effective, il faut probablement quitter et relancer Collatinus</span>. C'est inutile pour les dictionnaires, ceux-ci sont immédiatement consultables.</p></li>
									</ol>
								</dd>

						    <dt id="faq2"><span class="glyphicon glyphicon-chevron-right"></span> Comment voir une page d'un dictionnaire en mode image sur Mac ?</dt>
						    <dd>
						        <p>Pour afficher une page d'un dictionnaire en mode image, Collatinus utilise un programme externe qui convertit une page du fichier Djvu en une image Tiff. Il faut donc installer l'utilitaire <strong>DjVuLibre</strong> (libre et gratuit) que l'on trouvera sur SourceForge :
						            <a href="http://sourceforge.net/projects/djvu/files/">http://sourceforge.net/projects/djvu/files/</a></p>
						        <p>L'installation est standard et une application <strong>DjView</strong> (ou DjView.app) doit apparaître dans le dossier <code>Applications</code>. Vous êtes alors prêt pour consulter le dictionnaire dans Collatinus.</p>
						    </dd>

						    <dt id="faq3"><span class="glyphicon glyphicon-chevron-right"></span> Je voudrais ajouter des lemmes dans le lexique de Collatinus. Où sont les données que Collatinus exploite ?</dt>
						    <dd>
						        <p>Sous Windows, toutes les données sont dans le répertoire <code>data/</code> à côté de l'exécutable <code>Collatinus.exe</code>. Sur un Mac, elles sont un peu plus cachées. Pour les voir, il faut commencer par <em>"Afficher le contenu du paquet"</em> avec un clic droit (ou ctrl-clic) sur <code>Collatinus.app</code>. On avance alors dans l'arborescence <code>Contents/MacOS/data</code> et là on trouve tous les fichiers qu'utilise Collatinus. Attention, à manipuler avec précaution !</p>
						        <p>Si on veut ajouter des lemmes dans le lexique de Collatinus, on ouvrira <code>lemmes.la</code> avec un éditeur de texte ou un tableur (le fichier est au format CSV avec le caractère "|" comme séparateur de champs). On se réfèrera à l'aide en ligne pour connaître l'usage des divers champs. Si toutes les données sont correctes, Collatinus sait fléchir ce nouveau lemme et reconnaître dans un texte toutes ses formes. Pour donner une traduction à ce nouveau mot, il faut intervenir dans les <code>lemmes.*</code> (lemmes.fr pour les traductions françaises).</p>
						        <p>Des données erronées peuvent conduire à un comportement imprévisible. Si on prévoit de revenir souvent dans le répertoire <code>data/</code>, on peut en faire un alias que l'on met à un endroit plus accessible et qui pointera vers l'emplacement souhaité.</p>
						    </dd>

						    <dt id="faq4"><span class="glyphicon glyphicon-chevron-right"></span> Je souhaite ajouter un nouveau dictionnaire à Collatinus. Comment faire ?</dt>
						    <dd>
						        <p>Tout d'abord, il faut distinguer deux types d'objets différents qui correspondent au sens courant de dictionnaire :</p>
						        <ul>
						            <li>les <strong>lexiques</strong> : Collatinus les utilise pour reconnaître les formes fléchies et donner le sens du lemme correspondant. Ces fichiers sont nommés <code>lemmes.*</code> et se trouvent dans le répertoire <code>data/</code>.</li>
						            <li>les "vrais" <strong>dictionnaires</strong> (comme le Gaffiot, le Lewis &amp; Short, etc...) : ces dictionnaires doivent être dans un format entièrement numérique XML/HTML (fichier .xml) ou dans un format image (fichier .djvu). Ils sont rangés dans le répertoire <code>data/dicos</code> et sont accompagnés d'un fichier d'index (fichier .idx) et d'un fichier de configuration (fichier .cfg). Eventuellement complétés par un feuille de transformation (fichier .xsl) et/ou une feuille de style (fichier .css).</li>
						        </ul>
						        <p>Aujourd'hui, avec la version 11, l'utilisateur peut ajouter tout seul des lexiques (ou des entrées dans les lexiques existants) ou des dictionnaires en djvu, à ses risques et périls. Pour que le programme reconnaisse un nouveau dictionnaire, les fichiers <code>mon_dico.cfg</code> et <code>mon_dico.idx</code>, dans le répertoire <code>data/dicos</code> à côté de <code>mon_dico.djvu</code>, sont indispensables (et <code>mon_dico</code> ne sera visible qu'après redémarrage du programme).
						            <br>On s'inspirera des fichiers existants pour constituer le fichier .cfg ; l'item <code>"debut="</code> doit être un entier et indique le nombre de pages à sauter au début du fichier pour trouver le premier mot de l'index ; l'item <code>"echelle="</code> est aussi un entier (en %) et permet d'agrandir (ou rapetisser) l'image pour l'affichage à l'écran, par défaut l'échelle vaut 160.
						            <br>Le fichier .idx contient l'index du dictionnaire et doit être constitué à la main. Il faut relever le premier mot de chaque page et le mettre, en minuscules, sur les lignes successives du fichier. Les mots doivent être en ordre alphabétique, ce qui est en général le cas pour un dictionnaire mais attention aux exceptions (certains placent le "ph" avec le "f" entre le "e" et le "g").</p>
						        <p>Pour les dictionnaires en XML/HTML, la constitution de l'index doit passer par un programme et nécessite quelques manipulations trop complexes pour être décrites ici, mais nous pouvons le faire pour vous. Les règles générales pour le format du fichier .xml sont que chaque article occupe une seule ligne ou soit encadré par des balises spéciales (c'est-à-dire qui ne sont pas utilisées par ailleurs, par exemple <code>&lt;item&gt;...&lt;/item&gt;</code> ou <code>&lt;entryFree&gt;...&lt;/entryFree&gt;</code> ou même <code>&lt;div&gt;...&lt;/div&gt;</code> à condition qu'il n'y en ait pas d'autres), et que le lemme doit être facilement identifiable (par exemple, le premier mot entre des balises <code>&lt;H1&gt;&lt;/H1&gt;</code> ou l'attribut key de la balise EntryFree...).</p>
						    </dd>

						    <dt id="faq5"><span class="glyphicon glyphicon-chevron-right"></span> Collatinus ne reconnaît pas certains mots pourtant assez courants. Pourquoi ?</dt>
						    <dd>
						    	<p>Pour optimiser le démarrage du programme, le lexique que connaît Collatinus a été divisé en deux parties. Le lexique de base contient 24000 lemmes et il est systématiquement chargé. Il permet de lemmatiser beaucoup de textes classiques. Toutefois, si on va chercher des textes un peu "exotiques", ce vocabulaire classique peut être insuffisant. Il convient alors d'activer "l'extension du lexique" qui contient 58000 lemmes supplémentaires. Pour ce faire, on ira dans le menu <code>Lexique</code> et on sélectionnera l'entrée <code>Extension du lexique</code>.</p>
						    	<p>Désactiver l'extension après l'avoir activée ne revient pas exactement à la situation initiale (avant la première activation). L'extension sera utilisée dans ce cas comme un "réservoir" d'information. Si une forme peut être lemmatisée avec le seul lexique de base, seules ces solutions seront proposées. Cela évite d'être "pollué" par des lemmatisations très improbables. En revanche, si le lexique de base ne suffit pas pour lemmatiser une forme, la recherche se fera aussi dans l'extension et toutes les solutions (s'il y en a) seront proposées.</p>
						    </dd>

						    <dt id="faq6"><span class="glyphicon glyphicon-chevron-right"></span> Pour préparer les listes de vocabulaire pour mes étudiants, je voudrais supprimer les mots trop courants qu'ils connaissent. Collatinus peut-il le faire ?</dt>
						    <dd>
						    	<p>Quand on donne des listes de vocabulaire, il est souvent inutile de donner la traduction des mots trop courants comme "et", "cum" etc... Collatinus peut lire une liste de mots connus (menu <code>Fichier > Lire une liste de mots connus</code>) qui est particulièrement facile à déterminer si les étudiants ont des listes de vocabulaire à apprendre. Une liste de mots connus est un fichier de type texte (.txt), contenant un seul mot par ligne. On trouvera un exemple de liste dans le fichier <a href="https://github.com/biblissima/collatinus/raw/master/doc-usr/Exemple_liste.txt.zip" target="_blank">Exemple_liste.txt.zip</a>. On peut évidemment définir autant de listes que l'on souhaite, une pour chaque niveau, par exemple. Remarque : les listes ne se cumulent pas, seule la dernière liste chargée est active (les précédentes sont effacées).</p>
						    	<p>L'effet de la lecture d'une liste de mots connus est double : lorsque l'on lemmatise un texte (dans la fenêtre supérieure de Collatinus), celui-ci est colorisé et les mots connus n'apparaissent pas dans la liste de vocabulaire (dans l'onglet "Lexique et morphologie" qui doit être actif). Le code couleur par défaut est :</p>
						    	<ul>
						    		<li>vert pour les formes dont le lemme est connu (c'est-à-dire dans la liste)</li>
						    		<li>noir pour les formes que Collatinus reconnaît mais qui relèvent de lemmes qui ne sont pas dans la liste de mots connus</li>
						    		<li>rouge pour les formes que Collatinus ne reconnaît pas.</li>
						    	</ul>
						    	<p>Attention, quand un lemme est donné dans la liste de mots connus, il est implicitement supposé que l'étudiant connaît toutes les formes qui peuvent en découler. Par exemple, si "sum" apparaît dans la liste de mots connus, une forme un peu exotique comme "forent" sera supposée connue&hellip;</p>
						    </dd>

						    <dt id="faq7"><span class="glyphicon glyphicon-chevron-right"></span> Comment lemmatiser un texte qui contient des graphies médiévales ?</dt>
						    <dd>
						    	<p>Dans la version 11.2 a été ajoutée une option expérimentale pour que Collatinus puisse reconnaître certaines graphies médiévales. Dans le menu <code>Lexique</code>, on activera l'option <code>Graphies médiévales</code>. Attention, cela peut introduire de fausses lemmatisations si on travaille sur un texte classique ou un texte dont la graphie a été "normalisée". On évitera donc soigneusement d'utiliser cette option sur des textes classiques.</p>
						    	<p>Le résultat de la lemmatisation ou de la scansion est classicisé : si le texte contient "celum", on obtiendra les lemmatisations "cāelŭm, cōelum, i, n.".<p>
						    	<p>Cette option est toute nouvelle et seulement expérimentale. Nous espérons qu'elle puisse être utile à certains, mais il faut garder en tête que son utilisation n'est pas sans risque.</p>
						    </dd>
						</dl>
					</section>
					<section role="tabpanel" class="tab-pane fade" id="credits">
						<h1>Crédits</h1>
						<p>Collatinus est développé par Yves Ouvrard, avec l'aide précieuse de Philippe Verkerk.</p>
						<p>Il est publié sous licence GPL.</p>
						<p>Remerciements : William Whitaker †, Jose Luis Redrejo, Georges Khaznadar, Matthias Bussonier, Gérard Jeanneau, Philippe Verkerk, Jean-Paul Woitrain, Philipp Roelli, Perseus Digital Library.</p>
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
		      <p>Le logiciel Collatinus est mis à disposition par Yves Ouvrard et Philippe Verkerk sous licence <a rel="license" href="http://www.gnu.org/licenses/gpl.html">GNU GPL v3</a>.</p>
		    </div>
		    <div class="col-sm-3">
		        <p>Des remarques ou questions ? :<br/>
		        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:collatinus@biblissima-condorcet.fr">Nous contacter</a></p>
		    </div>
		</div>
	</div>
</section>
