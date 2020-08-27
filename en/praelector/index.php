---
title: Praelector
id: praelector
description: Latin reading assistant
description_meta: Praelector is a Latin reading assistant, whose purpose is to help the Latinist read a Latin sentence as naturally as possible, starting with the first word and ending with the last one
categories: [pages]
lang: en
layout: default-banner
id_stat: 13
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
$version = 'beta';
$version_txt = '(beta)';
//$prev_version = '10.2.2';
$link_prefix = './index.php?file=Praelector_';
$link_base =  $link_prefix.$version;
?>

<section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
            <div class="col-sm-7 col-md-8">
    			<h1>Praelector <small><?php echo $version_txt; ?></small></h1>
    			<h2>Latin reading assistant</h2>
            </div>
            <div class="col-sm-5 col-md-4 text-right">
    		    <div class="buttons-container">

                    <?php if( !$detect->isMobile() ): ?>
                    <div class="btn-group">
                        <?php if ($os == 'mac'): ?>
                            <a href="<?php echo $link_base.$ext; ?>" class="btn btn-lg"><span class="fa fa-apple"></span>Download for <?php echo $oslabel ?></a>
                        <?php elseif ($os == 'win'): ?>
                            <a href="<?php echo $link_base."_win".$ext; ?>" class="btn btn-lg"><span class="fa fa-windows"></span>Download for <?php echo $oslabel ?></a>
                        <?php else: ?>
                            <button class="btn btn-lg btn-danger" type="button" disabled="disabled">No version available for your system</button>
                        <?php endif; ?>
                    </div>

                    <?php else: ?>
                        <button class="btn btn-lg btn-danger" type="button" disabled="disabled">No version available for your system</button>
                    <?php endif; ?>

    		    	<a class="btn btn-lg" href="https://salsa.debian.org/georgesk/praelector">Praelector on Github</a>
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
                    <p class="lead">Praelector is a <strong>Latin reading assistant</strong> for Mac OS and Windows.</p>
                    <p class="text-danger">Praelector is still in development, this is a test version of the software. You are welcome to give feedback to the author.</p>
                </div>

                <p><a href="https://salsa.debian.org/georgesk/praelector#praelector">More information about Praelector</a></p>

                <h2>Downloads</h2>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h3>For Mac OS</h3>
                        <a href="index.php?file=Praelector_beta.dmg" class="btn btn-lg"><span class="fa fa-apple"></span>Download (.dmg)</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>For Windows</h3>
                        <a href="index.php?file=Praelector_beta_win.exe" class="btn btn-lg"><span class="fa fa-windows"></span>Download (.exe)</a>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>Sources</h3>
                        <a href="https://salsa.debian.org/georgesk/praelector" class="btn btn-sm">Available on Debian Gitlab</a>
                    </div>
                </div>

                <p>&nbsp;</p>

			    <div class="well">
			        <h2>Credits</h2>
			        <p>The Praelector software is developed by Yves Ouvrard.</p>
			    </div>
			</div>
		</section>
	</div>
</div>
<section class="content-bottom">  
	<div class="container">
		<div class="row">
		    <div class="col-sm-9">
		        <!-- <p>Le logiciel Eulexis est mis à disposition par Philippe Verkerk sous licence <a rel="license" href="http://www.gnu.org/licenses/gpl.html">GNU GPL v3.</a></p> -->
		    </div>
		    <div class="col-sm-3">
                <p>Any feedback or questions?<br/>
                <span class="glyphicon glyphicon-envelope"></span><a href="mailto:collatinus@biblissima-condorcet.fr">Contact us</a></p>
		    </div>
		</div>
	</div>
</section>
