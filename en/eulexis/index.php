---
title: Eulexis
id: eulexis
description: Lemmatiser for ancient Greek texts
description_meta: Eulexis is a lemmatiser for Ancient Greek texts. It is capable of lemmatising a text in ancient greek and finding the correct root word to search for in several languages in three dictionaries.
categories: [pages] 
layout: default-banner
id_stat: 7
lang: en
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
    			<h2>Lemmatiser for Ancient Greek texts</h2>
            </div>
            <div class="col-sm-5 col-md-4 text-right">
    		    <div class="buttons-container">
                    <?php if( !$detect->isMobile() ): ?>
                    <div class="btn-group">
                        <?php if ($os == 'mac'): ?>
                            <a href="<?php echo $link_base.$ext; ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Download for <?php echo $oslabel ?></a>
                        <?php elseif ($os == 'win'): ?>
                            <a href="<?php echo $link_base.$ext; ?>" class="btn btn-lg"><span class="fa fa-windows"></span>Download for <?php echo $oslabel ?></a>
                        <?php else: ?>
                            <button class="btn btn-lg btn-danger" type="button" disabled="disabled">No available version for your system</button>
                        <?php endif; ?>
                    </div>

                    <?php else: ?>
                        <button class="btn btn-lg btn-danger" type="button" disabled="disabled">No available version for your system</button>
                    <?php endif; ?>

    		    	<a class="btn btn-lg" href="https://github.com/PhVerkerk/Eulexis_off_line"><span class="fa fa-github"></span>Eulexis on Github</a>
                    <a href="/en/eulexis-web" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Eulexis online">Try the online app</a>
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
                    <p class="lead">Eulexis is a <strong>lemmatiser for Ancient Greek texts</strong>. It is a free and open source software available for Mac OS and Windows.</p>
                    <!-- <p>Eulexis is a free and open source software available for Mac OS and Windows.</p> -->
                    <div class="news bg-warning">
                        <p class="lead">The &laquo; Bailly 2020 Hugo Chávez &raquo; is available in Eulexis!</p>
                        <p>Thanks to the hard work of a team of volunteers led by Gérard Gréco, with special contribution of André Charbonnet, Mark De Wilde and Bernard Maréchal, the Bailly 2020 Hugo Chávez is <a href="http://gerardgreco.free.fr/spip.php?article52">available under conditions in PDF</a> since April 2020. You can now consult it in Eulexis. If you find this work useful, do not hesitate to encourage it and <a href="http://gerardgreco.free.fr/spip.php?article52">make a donation</a>.</p>
                    </div>
                    <p>This application has been made available with no guarantee and may be subject to further corrections and improvements. If you notice any errors or typos, please do not hesitate to <a href="mailto:eulexis@biblissima-condorcet.fr">report them</a>!</p>
                </div>

                <h2>Downloads</h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h3>For Mac OS</h3>
                        <a href="index.php?file=Eulexis_1.1.dmg" class="btn btn-lg"><span class="fa fa-apple"></span>Download (.dmg)</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>For Windows</h3>
                        <a href="index.php?file=Eulexis_1.1.exe" class="btn btn-lg"><span class="fa fa-windows"></span>Download (.exe)</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>Source code</h3>
                        <a href="https://github.com/PhVerkerk/Eulexis_off_line/archive/master.zip" class="btn btn-sm"><span class="fa fa-download"></span>Download (.zip)</a><br />
                        <small class="text-muted">Archive of the main code branch (master)</small><br />
                        <small>The source code is hosted and managed on <a href="https://github.com/PhVerkerk/Eulexis_off_line">Github</a>.</small>
                    </div>
                </div>

                <div class="news bg-info">
                    <p>The data, in particular the <a href="http://gerardgreco.free.fr/spip.php?article52">Bailly 2020 Hugo Chávez</a>, not being released under a free license, but nevertheless usable under conditions, we preferred not to make it downloadable here. However, a Linux user compiling Eulexis from its <a href="https://github.com/PhVerkerk/Eulexis_off_line">source code</a> will need this data. He will just have to <a href="mailto:eulexis@biblissima-condorcet.fr">email us</a> and we will be happy to send it along.</p>
                </div>

                <p><strong>Eulexis also exists as an online app</strong>: <a href="/en/eulexis-web" class="">Try Eulexis-web</a></p>

                <h3>New in version 1.1</h3>
                <ul>
                    <li>The translations have been somewhat improved, although there is still room for improvement.</li>
                    <li>Navigation buttons now allow you to go back to a previously consulted dictionary article.</li>
                    <li>A few thousand corrections have been reported in the different dictionaries that already existed in Eulexis.</li>
                    <li>The query can be made with regular expressions or more simply by using wildcards.</li>
                    <li>Starting the application is faster as long as the dictionaries are consulted (the loading of the analyses remains slow).</li>
                    <li>A file can be lemmatized directly, producing a CSV file with all known lemmatizations of text forms (with translation). To provide the list of vocabulary associated with a text, the teacher will only have to delete the lemmatizations that are not suitable (possibly, review the translations and delete the lemmatizations of very common words, thus already known by the students).</li>
                    <li>TextiColor can be used to detect typos or OCR errors: if a word is not recognized, it will appear in bold and red. Beware, just because a word is recognized does not mean that it is correct, and conversely, an unrecognized word can be perfectly legitimate.</li>
                </ul>

                <h2>Help</h2>
                <p><a href="/fr/eulexis/aide/" target="_blank noopener">Read the help pages</a> (in French)</p>

			    <div class="well">
			        <h2>Credits</h2>
			        <p>Many thanks to Philipp Roelli, André Charbonnet, Mark De Wilde, Gérard Gréco, Peter J. Heslin, Yves Ouvrard, Eduard Frunzeanu and Régis Robineau.</p>
                    <ul>
                        <li>The LSJ is from <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revised and corrected by
                            <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                        <li>The Pape is from <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>. It has been reviewed by <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a> and Jean-Paul Woitrain.</li>
                        <li>The abridged Bailly is from <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                        <li>The <em>Bailly 2020 Hugo Chávez</em> is from <a href="http://gerardgreco.free.fr/spip.php?article52">Gérard Gréco</a>, converted from TeX to HTML by Philippe Verkerk.</li>
                        <li>The lemmatisation and inflection functions are made possible with files from <a href="https://community.dur.ac.uk/p.j.heslin/Software/Diogenes/">Diogenes</a> and <a href="http://www.perseus.tufts.edu/">Perseus</a>.</li>
                        <li>The improvements of the English translations has been partly possible thanks to the work done by Helma Dik (<a href="https://logeion.uchicago.edu">Logeion</a>).</li>
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
		        <p>The Eulexis software is developed by Philippe Verkerk and is made available under the <a rel="license" href="http://www.gnu.org/licenses/gpl.html">GNU GPL v3</a> license.</p>
		    </div>
		    <div class="col-sm-3">
                <p>Any feedback or questions?<br/>
                <span class="glyphicon glyphicon-envelope"></span><a href="mailto:eulexis@biblissima-condorcet.fr">Contact us</a></p>
		    </div>
		</div>
	</div>
</section>
