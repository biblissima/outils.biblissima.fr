---
title: Collatinus-web
id: collatinus-web
description: Online lemmatiser and morphological analyser for Latin texts
description_meta: Collatinus-web is the online version of Collatinus, a free and multi-OS application to lemmatise and analyse the morphology of Latin texts.
categories: [pages] 
layout: default-banner
id_stat: 6
lang: en
---

<section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
			<div class="col-sm-7 col-md-8">
				<h1>Collatinus web</h1>
				<h2>Online lemmatiser and morphological analyser<br /> for Latin texts</h2>
			</div>
		    <div class="col-sm-5 col-md-4 text-right">
		    	<div class="buttons-container">
		    		<a href="https://github.com/biblissima/collatinus/tree/Daemon" class="btn btn-lg"><span class="fa fa-github"></span>Collatinus web on Github</a>
		    		<a href="/en/collatinus" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Mac, Windows, GNU/Linux">Try the desktop app</a>
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
					<p class="lead">
						Online version of <a href="/en/collatinus" title="Download page of Collatinus">Collatinus</a>, a multi-OS application to <strong>lemmatise</strong> and <strong>analyse the morphology</strong> of Latin texts.
					</p>
					<div class="news bg-warning">
          	<p>June 2021</p>
          	<p class="lead">&mdash; Two languages added to the Collatinus registry: <strong>Dutch</strong> and <strong>Euskara</strong>.</p>
          	<p class="lead">&mdash; Launch of a campaign to review translations of the languages of Spain:</p>
          	<p>(EN) An extensive campaign to review translations has been launched by our Spanish colleagues. The goal is to review translations of Latin lemmas in the four official languages of Spain: <strong>Castilian</strong>, <strong>Catalan</strong>, <strong>Euskara</strong> and <strong>Galician</strong>. If you would like to participate, <a href="mailto:collatinus@biblissima-condorcet.fr">contact us</a> to put you in touch with the relevant teams.</p>
          	<p>(ES) Una amplia campaña de verificación de traducciones se ha iniciado por parte de nuestros amigos españoles. Se trata de verificar las traducciones de los términos latinos en las cuatro lenguas oficiales de España: <strong>castellano</strong>, <strong>catalán</strong>, <strong>euskara</strong> y <strong>gallego</strong>. Si desean participar en esta revisión, <a href="mailto:collatinus@biblissima-condorcet.fr">pónganse en contacto con nosotros</a> para que podamos ponerles en contacto con los equipos correspondientes.</p>
          </div>
					<p>This online version is based on <strong>version 11.2 of Collatinus</strong>. Its lexical database has been extended with the systematic treatment of the digital dictionaries (Gaffiot 2016, Jeanneau 2017, Lewis &amp; Short 1879 and Georges 1913). The lexical base now contains more than 80.000 lemmas.</p>
					<p>Due to lack of space on a web-page, the features of Collatinus 11 are not all available. For intensive use, we recommend the installation of the <a href="/en/collatinus" title="Download page of Collatinus">stand-alone version of Collatinus</a>, which is available for Windows, MacOS and Linux/Debian.</p>
					<p>This application has been made available with no guarantee and may be subject to further corrections and improvements.
					</p>
				</div>
				<form method="post" role="form" class="form-lemme form-inline" id="form">
				    <div class="form-group">
				    	<label for="recherche_lemme" class="main-label">Find the word</label>
				        <input type="search" name="lemme" id="recherche_lemme" class="form-control" size="40" placeholder="Enter a Latin word...">
			        </div>
			        <div class="form-group">
				        <label for="dicos">&nbsp;in the dictionary&nbsp;</label>
				        <select name="dicos" id="dicos">
									<option value="dgaf " title="latin-french">Gaffiot</option>
									<option value="dlew " title="latin-english" selected="selected">Lewis &amp; Short</option>
									<option value="dgeo " title="latin-german">Georges</option>
									<option value="djea " title="latin-french">Jeanneau</option>
									<option value="dduc " title="glossary of medieval latin">du Cange</option>
									<option value="dram " title="neolatin-german">Ramminger</option>
									<option value="dkoe " title="medieval latin-german">Köbler</option>
									<option value="dcal " title="latin-italian">Calonghi (image mode)</option>
									<option value="dfar " title="latin-portuguese">Faria (image mode)</option>
									<option value="dfg "  title="latin-french">Gaffiot (image mode)</option>
									<option value="drai " title="latin-spanish">De Miguel (image mode)</option>
									<option value="dval " title="latin-spanish">Valbuena (image mode)</option>
				        </select>
				        <button type="submit" value="Search" class="btn btn-success" aria-controls="results">Submit</button>
				    </div>		
			        <input type="hidden" name="opera" value="consult">
			        <input type="hidden" name="token" value="<?php echo $token ?>">
				</form>
				<form method="post" role="form" class="form-lemme form-inline">
				    <div class="form-group">
				    	<label for="flexion_lemme" class="main-label">Conjugate/decline the word</label>
				        <input type="search" name="lemme" id="flexion_lemme" class="form-control" size="40" placeholder="Enter a Latin word...">
			        </div>
			        <div class="form-group">
				        <button type="submit" value="Inflect" class="btn btn-success" aria-controls="results">Submit</button>
				    	</div>
			        <input type="hidden" name="opera" value="flexion">
			        <input type="hidden" name="token" value="<?php echo $token ?>">
				</form>
				<form method="post" role="form" class="form-lemme">
				    <div class="form-group">
				    	<label for="traitement_texte" class="main-label">Process a Latin text</label>
				      <textarea name="texte" id="traitement_texte" class="form-control" rows="6" cols="80" placeholder="Enter a Latin text"></textarea>
				    </div>
				    <div class="form-group">
			        <label for="langue">Target language&nbsp;</label>
			        <select name="langue" id="langue">
			        	<option value="es ">Castellano</option>
                <option value="ca ">Catalán</option>
                <option value="de ">Deutsch</option>
                <option value="en " selected="selected">English</option>
                <option value="eu ">Euskara</option>
                <option value="fr ">Français</option>
                <option value="gl ">Galego</option>
                <option value="it ">Italiano</option>
                <option value="nl ">Nederlands</option>
			        </select>
		        </div>
			      <div class="form-group">
			        	<button type="submit" name="action" value="Lemmatiser" class="btn btn-success" aria-controls="results">Lemmatise</button>
				        <button type="submit" name="action" value="Analyser" class="btn btn-success" aria-controls="results">Analyse</button>
				        <button type="submit" name="action" value="Taguer" class="btn btn-success" aria-controls="results">Tag</button>
				        <button type="submit" name="action" value="Scander" class="btn btn-success" aria-controls="results">Scan</button>
				        <button type="submit" name="action" value="Accentuer" class="btn btn-success" aria-controls="results">Accentuate</button>
				        <button type="reset" name="action" value="Erase" class="btn btn-default btn-sm" aria-controls="results"><span class="glyphicon glyphicon-remove-circle"></span> Clear input</button>
				    </div>
		        <input type="hidden" name="opera" value="traite_txt">
		        <input type="hidden" name="token" value="<?php echo $token ?>">
				</form>

				<div class="results-container" id="myAffix-wrapper">
					<div class="results-header" id="myAffix"></div>
					<div id="results" aria-live="polite" aria-label="Collatinus response to your request">
					</div>
				</div>

		    <div class="well">
		    	<h3>Credits</h3>
		    	<p>Collatinus web is developed by Yves Ouvrard, with the support of Philippe Verkerk and Régis Robineau</p>
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
		            <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" class="license"><img alt="Creative Commons License" style="border-width:0" src="https://static.biblissima.fr/images/cc-by-nc-4.0-88x31.png">Creative Commons Attribution-NonCommercial 4.0 International License</a>
				</p>
				<p>
		            <small>Yves Ouvrard and Philippe Verkerk, 2014 - Application made available with no guarantee, but in the hope that it will be useful to someone</small>
		        </p>
		    </div>
		    <div class="col-sm-3">
		        <p>Any feedback or questions?<br/>
		        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:collatinus@biblissima-condorcet.fr">Contact us</a></p>
		    </div>
		</div>
	</div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-error">
	<div class="modal-dialog modal-sm">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span><span class="sr-only">Close</span></button>
	            <h4>Error</h4>
	        </div>
	        <div class="modal-body">
	            <div class="alert alert-warning">
	                Please enter a word or text in one of the fields.
	            </div>
	        </div>
	    </div>
	    <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
