---
title: Eulexis
id: eulexis
description: Lemmatiseur de grec ancien
description_meta: Eulexis un logiciel libre et gratuit qui permet de lemmatiser ou fléchir un texte en grec ancien et de rechercher dans des dictionnaires de grec ancien en plusieurs langues.
categories: [pages]
lang: fr
layout: default-banner
id_stat: 7
---

<?php
// détection mobile
require_once ($_SERVER['DOCUMENT_ROOT']. '/libs/Mobile_Detect.php');
$detect = new Mobile_Detect;

// détection user agent
$agent = $_SERVER['HTTP_USER_AGENT'];
if ( preg_match('/Linux/',$agent) )   $os = 'linux';
elseif ( preg_match('/Win/',$agent) ) $os = 'win';
elseif ( preg_match('/Mac/',$agent) ) $os = 'mac';
else $os = 'other';

if ( $os == 'win') {
  $oslabel = 'Windows';
  $ext = '.exe';
}
elseif ( $os == 'mac') {
  $oslabel = 'Mac OS';
  $ext = '.dmg';
}
// elseif ( $os == 'linux') {
//   $oslabel = 'GNU/Linux';
//   $ext = '.tar.gz';
// }

// construction des liens de download
$version = '1.1';
$version_txt = 'version 1.1';
//$prev_version = '10.2.2';
$link_prefix = './index.php?file=Eulexis_';
$link_base =  $link_prefix.$version;
?>

<section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
            <div class="col-sm-7 col-md-8">
    			<h1>Eulexis <small><?php echo $version_txt; ?></small></h1>
    			<h2>Lemmatiseur de grec ancien</h2>
            </div>
            <div class="col-sm-5 col-md-4 text-right">
    		    <div class="buttons-container">

                    <?php if( !$detect->isMobile() ): ?>
                    <div class="btn-group">
                        <?php if ($os == 'mac'): ?>
                            <a href="<?php echo $link_base.$ext; ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Télécharger pour <?php echo $oslabel ?></a>
                        <?php elseif ($os == 'win'): ?>
                            <a href="<?php echo $link_base.$ext; ?>" class="btn btn-lg"><span class="fa fa-windows"></span>Télécharger pour <?php echo $oslabel ?></a>
                        <?php else: ?>
                            <button class="btn btn-lg btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
                        <?php endif; ?>
                    </div>

                    <?php else: ?>
                        <button class="btn btn-lg btn-danger" type="button" disabled="disabled">Pas de version disponible pour votre système</button>
                    <?php endif; ?>

    		    	<a class="btn btn-lg" href="https://github.com/PhVerkerk/Eulexis_off_line"><span class="fa fa-github"></span>Eulexis sur Github</a>
                    <a href="/fr/eulexis-web" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Version en ligne d'Eulexis">Tester la version en ligne</a>
    		    </div>
            </div>
		</div>
	</div>
</section>
<div class="main-container container" role="main">
	<div class="row">
	    <section class="col-sm-12">
			<div class="region region-content">
			    <div class="intro">
                    <p class="lead">Eulexis est un logiciel de <strong>lemmatisation de textes en grec ancien</strong>, libre et gratuit, disponible pour Mac OS et Windows.</p>
                    <div class="news bg-warning">
                        <p class="lead">Le &laquo; Bailly 2020 Hugo Chávez &raquo; disponible à la consultation dans Eulexis !</p>
                        <p>Grâce au travail acharné d'une équipe de bénévoles animée par Gérard Gréco, et avec la participation spéciale d'André Charbonnet, de Mark De Wilde et de Bernard Maréchal, le Bailly 2020 Hugo Chávez est <a href="http://gerardgreco.free.fr/spip.php?article52">accessible sous conditions en PDF</a> depuis avril 2020. Vous pouvez maintenant le consulter avec Eulexis. Si ce travail vous est utile, n'hésitez pas à l'encourager et <a href="http://gerardgreco.free.fr/spip.php?article52">à faire un don</a>.</p>
                    </div>
                    <p>Cette application est mise à disposition sans aucune garantie, mais avec l'espoir qu'elle vous sera utile, et reste soumise à corrections et améliorations. Si vous remarquez des erreurs ou des coquilles, n'hésitez pas à <a href="mailto:eulexis@biblissima-condorcet.fr">nous les signaler</a> !</p>
                </div>

                <h2>Téléchargements</h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h3>Pour Mac OS</h3>
                        <a href="index.php?file=Eulexis_1.1.dmg" class="btn btn-lg"><span class="fa fa-apple"></span>Télécharger (.dmg)</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>Pour Windows</h3>
                        <a href="index.php?file=Eulexis_1.1.exe" class="btn btn-lg"><span class="fa fa-windows"></span>Télécharger (.exe)</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>Sources</h3>
                        <a href="https://github.com/PhVerkerk/Eulexis_off_line/archive/master.zip" class="btn btn-sm"><span class="fa fa-download"></span>Télécharger (.zip)</a><br />
                        <small class="text-muted">Archive zip de la branche principale (master)</small><br />
                        <small>Les sources sont déposées et gérées sur <a href="https://github.com/PhVerkerk/Eulexis_off_line">Github</a>.</small>
                    </div>
                </div>

                <div class="news bg-info">
                    <p>Les données, en particulier le <a href="http://gerardgreco.free.fr/spip.php?article52">Bailly 2020 Hugo Chávez</a>, n'étant pas libres de droit, mais néanmoins utilisables sous conditions, nous avons préféré ne pas les rendre téléchargeables sur ce site. Toutefois, un utilisateur de Linux qui compilerait les <a href="https://github.com/PhVerkerk/Eulexis_off_line">sources d'Eulexis</a> aura besoin de ces données. Il lui suffira de <a href="mailto:eulexis@biblissima-condorcet.fr">nous écrire</a> et nous nous ferons un plaisir de les lui envoyer.</p>
                </div>

                <p><strong>Eulexis est aussi disponible en version en ligne</strong> : <a href="/fr/eulexis-web" class="">Tester Eulexis-web</a></p>

                <h3>Nouveautés de la version 1.1</h3>
                <ul>
                    <li>Les traductions ont été quelque peu améliorées, même si c'est encore perfectible.</li>
                    <li>Des boutons de navigation permettent maintenant de revenir à un article de dictionnaire déjà consulté.</li>
                    <li>Quelques milliers de corrections ont été reportés dans les différents dictionnaires qui existaient déjà dans Eulexis.</li>
                    <li>La consultation peut se faire avec des expressions rationnelles ou plus simplement en utilisant des caractères de substitution.</li>
                    <li>Le démarrage de l'application est plus rapide tant qu'on consulte les dictionnaires (le chargement des analyses reste long).</li>
                    <li>Un fichier peut être lemmatisé directement, produisant un fichier CSV avec toutes les lemmatisations connues des formes du texte (avec la traduction). Pour fournir la liste du vocabulaire associée à un texte, l'enseignant n'aura qu'à supprimer les lemmes qui ne conviennent pas (éventuellement, retoucher les traductions et supprimer les lemmatisations des mots très courants, donc déjà connus des étudiants).</li>
                    <li>Le TextiColor peut permettre de détecter des coquilles ou des fautes d'OCR : si un mot n'est pas reconnu, il passera en gras et en rouge. Attention, ce n'est pas parce que le mot est reconnu qu'il est juste et, inversement, un mot non-reconnu peut être parfaitement légitime.</li>
                </ul>

                <h2>Aide</h2>
                <p><a href="/fr/eulexis/aide/" target="_blank noopener">Consultez l'aide en ligne</a></p>

			    <div class="well">
			        <h2>Crédits</h2>
			        <p>Un grand merci à Philipp Roelli, André Charbonnet, Mark De Wilde, Gérard Gréco, Peter J. Heslin, Yves Ouvrard, Eduard Frunzeanu et Régis Robineau.</p>
                    <ul>
                        <li>Le <abbr title="Liddell–Scott–Jones Greek-English Lexicon"><em>LSJ</em></abbr> est de <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revu et corrigé par <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                       <li>Le <em>Pape</em> est de <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>. Il a été revu par <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a> et Jean-Paul Woitrain.</li>
                        <li>L'abrégé du <em>Bailly</em> est de <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                        <li>Le <em>Bailly 2020 Hugo Chávez</em> est de <a href="http://gerardgreco.free.fr/spip.php?article52">Gérard Gréco</a>, converti de TeX en HTML par Philippe Verkerk.</li>
                        <li>La lemmatisation et la flexion ont été possibles grâce aux fichiers de <a href="https://community.dur.ac.uk/p.j.heslin/Software/Diogenes/">Diogenes</a> et de <a href="http://www.perseus.tufts.edu/">Perseus</a>.</li>
                        <li>L'amélioration des traductions anglaises a été, en partie, possible grâce au travail d'Helma Dik (<a href="https://logeion.uchicago.edu">Logeion</a>).</li>
                    </ul>
			    </div>
			</div>
		</section>
	</div>
</div>
<section class="content-bottom">  
	<div class="container">
		<div class="row">
		    <div class="col-sm-9">
		        <p>Le logiciel Eulexis est mis à disposition par Philippe Verkerk sous licence <a rel="license" href="http://www.gnu.org/licenses/gpl.html">GNU GPL v3.</a></p>
		    </div>
		    <div class="col-sm-3">
                <p>Des remarques ou questions ? :<br/>
                <span class="glyphicon glyphicon-envelope"></span><a href="mailto:eulexis@biblissima-condorcet.fr">Nous contacter</a></p>
		    </div>
		</div>
	</div>
</section>
