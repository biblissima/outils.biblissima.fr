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

<?php 
date_default_timezone_set('Europe/Paris');
$formatter = new IntlDateFormatter('en_GB', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>
<section class="top-banner">
	<div class="container">
		<div class="banner-content row">
			<div class="page-identity col-sm-7 col-md-8">
				<h1 class="page-name">Collatinus-web <br/>
					<span class="page-slogan">Online lemmatiser and morphological analyser<br /> for Latin texts</span></h1>
			</div>
		  <div class="col-sm-5 col-md-4 text-sm-end">
		   	<div class="buttons-container">
		    	<a href="https://github.com/biblissima/collatinus/tree/Daemon" class="btn btn-lg"><i class="bi bi-github"></i> Source code on Github</a>
		    	<a href="/en/collatinus" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Mac, Windows, GNU/Linux">Try the desktop app</a>
		    </div>
		  </div>
		</div>
	</div>
</section>

<div class="main-container container" role="main">
	<div class="row">
		<section class="col-sm-12">
			<div class="my-4">
				<h2 class="lead">
					Online version of <a href="/en/collatinus" title="Download page of Collatinus">Collatinus</a>, a multi-OS application to <strong>lemmatise and analyse the morphology of Latin texts</strong>.
				</h2>
			</div>
			<hr/>
			<div class="forms mb-5">
				<!-- Recherche dicos -->
				<form method="post" role="form" id="recherche_dicos" class="row g-3">
          <div class="col-lg-4 col-md-5">
				    <label for="recherche_lemme" class="form-label">Find the word</label>
				    <input type="text" name="lemme" id="recherche_lemme" class="form-control" size="40" placeholder="Enter a Latin word..." required>
				  </div>
			    <div class="col-lg-4 col-md-4">
			    	<label for="dicos" class="form-label">in the dictionary</label>
				    <select name="dicos" id="dicos" class="form-select">
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
					</div>
					<div class="col-lg-4 col-md-3">
						<button type="submit" value="Search" class="btn btn-success" aria-controls="results">Submit</button>
					</div>		
			    <input type="hidden" name="opera" value="consult">
			    <input type="hidden" name="token" value="<?php echo $token ?>">
			  </form>

			  <!-- Flexion -->
				<form method="post" role="form" class="row g-3" id="flexion">
					<div class="col-lg-4 col-md-5">
						<label for="flexion_lemme" class="form-label">Conjugate/decline the word</label>
				    <input type="text" name="lemme" id="flexion_lemme" class="form-control" size="40" placeholder="Enter a Latin word..." required>
				  </div>
			    <div class="col-lg-4 col-md-7">
			    	<button type="submit" value="Inflect" class="btn btn-success" aria-controls="results">Submit</button>
			    </div>
			    <input type="hidden" name="opera" value="flexion">
			    <input type="hidden" name="token" value="<?php echo $token ?>">
			  </form>

			  <!-- Traitement -->
				<form method="post" role="form" class="row g-3" id="traitement">
					<div class="col-lg-8 col-md-11">
						<label for="traitement_texte" class="form-label">Process a Latin text</label>
				    <textarea name="texte" id="traitement_texte" class="form-control" rows="6" cols="80" placeholder="Enter a Latin text" required></textarea>
				  </div>
				  <div class="col-lg-8 col-md-11 d-sm-flex align-items-center">
				  	<div class="col-md-8 col-sm-8 d-flex align-items-center">
				  		<label for="langue" class="form-label">Target language</label>
				      <select name="langue" id="langue" class="form-select me-4">
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
			        <input class="form-check-input" type="checkbox" id="medieval" name="medieval" autocomplete="off">
				      <label for="medieval" class="form-check-label">Medieval spellings</label>
				      <a role="button" class="ms-1" tabindex="0" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="This option only takes into account the most common spelling variations between Classical and Medieval Latin. For more details about the transformation rules, see the file <a href='https://github.com/biblissima/collatinus/blob/Daemon/bin/data/medieval.txt' target='_blank'>medieval.txt</a>"><i class="bi bi-info-circle"></i></a>
				     </div>
				     <div class="col-md-4 col-sm-4 text-end">
				     	<button type="button" name="action" value="Erase" class="btn btn-sm btn-outline-danger btn-clear" aria-controls="results"><i class="bi bi-x-circle"></i> Clear input</button>
				     </div>
				   </div>
				   <div class="col-lg-8 col-md-11 d-sm-flex btn-group-traitement">
			     	<button type="submit" name="action" value="Lemmatiser" class="btn btn-success" aria-controls="results">Lemmatise</button>
				    <button type="submit" name="action" value="Analyser" class="btn btn-success" aria-controls="results">Analyse</button>
				    <button type="submit" name="action" value="Taguer" class="btn btn-success" aria-controls="results">Tag</button>
				    <button type="submit" name="action" value="Scander" class="btn btn-success" aria-controls="results">Scan</button>
				    <button type="submit" name="action" value="Accentuer" class="btn btn-success" aria-controls="results">Accentuate</button>
				  </div>
		      <input type="hidden" name="opera" value="traite_txt">
		      <input type="hidden" name="token" value="<?php echo $token ?>">
		    </form>
		  </div>

		  <!-- Résultats -->
			<div class="results-container" id="myAffix-wrapper" data-spy="affix">
				<div class="results-header sticky-top" id="myAffix">
					<a class="scrolltop" href="#recherche_dicos"><i class="bi bi-arrow-up"></i> Back to form</a>
				</div>
				<div id="results" aria-live="polite" aria-label="Collatinus response to your request"></div>
			</div>

			<ul class="nav nav-pills nav-justified flex-column flex-md-row" id="collatinusTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link active" href="#presentation" aria-controls="presentation" role="tab">Presentation</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" href="#news" aria-controls="news" role="tab">News</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" href="#credits" aria-controls="credits" role="tab">Credits</a>
        </li>
      </ul>

      <div class="tab-content">
        <section role="tabpanel" class="tab-pane fade show active" id="presentation">
          <h2>Presentation</h2>
          <p>This online version is based on <strong>version 11.2 of Collatinus</strong>.</p>
          <p>Its lexical database has been extended with the systematic treatment of the digital dictionaries (Gaffiot 2016, Jeanneau 2017, Lewis &amp; Short 1879 and Georges 1913).<br/>
          The lexical base now contains more than 80.000 lemmas.</p>
					<p>Due to lack of space on a web-page, the features of Collatinus 11 are not all available. For intensive use, we recommend the installation of the <a href="/en/collatinus" title="Download page of Collatinus">stand-alone version of Collatinus</a>, which is available for Windows, MacOS and Linux/Debian.</p>
					<div class="alert alert-warning">This application has been made available with no guarantee and may be subject to further corrections and improvements.</div>
        </section>

        <section role="tabpanel" class="tab-pane fade" id="news">
        	<h2>News</h2>
        	<p>&mdash; July 2023: Two languages reviewed, <strong>Castilian</strong> and <strong>Euskara</strong></p>
	      	<p>&mdash; June 2021: Two languages added to the Collatinus registry, <strong>Dutch</strong> and <strong>Euskara</strong>.</p>
	      	<p>&mdash; June 2021: Launch of a campaign to <strong>review translations of the languages of Spain</strong>:</p>
	      	<p>(EN) An extensive campaign to review translations has been launched by our Spanish colleagues. The goal is to review translations of Latin lemmas in the four official languages of Spain. The Castilian and Euskara are now corrected (July 2023). The Catalan and Galician are still being reviewed. If you would like to participate, <a href="mailto:collatinus@biblissima-condorcet.fr">contact us</a> to put you in touch with the relevant teams.</p>
	      	<p>(ES) Una amplia campaña de verificación de traducciones se ha iniciado por parte de nuestros amigos españoles. Se trata de verificar las traducciones de los términos latinos en las cuatro lenguas oficiales de España. El castellano y el euskara ya están corregidos (julio 2023). El catalán y gallego aún se están revisando. Si desean participar en esta revisión, <a href="mailto:collatinus@biblissima-condorcet.fr">pónganse en contacto con nosotros</a> para que podamos ponerles en contacto con los equipos correspondientes.</p>
        </section>

        <section role="tabpanel" class="tab-pane fade" id="credits">
        	<h2>Credits</h2>
        	<p>Collatinus web is developed by Yves Ouvrard, with the support of Philippe Verkerk and Régis Robineau.</p>
			    <p>Many of the Dutch translations were revised by Jan Bart.</p>
			    <p>The Castilian translations have been revised by a group of latin professors in Extremadura: Ángel Luis Gallego Real, Guadalupe Santos Martín, Juan José Morcillo Romero, Mario del Río González, Santiago Campo Moreno, Juan Carlos Oliva Muñoz and Carlos Cabanillas.</p>
	        <p>The Euskara translations have been revised by a group of teachers led by Carlos Cabanillas: Garbiñe Agirre Urteaga, Ana Botello Fernandez, Francisco Garayoa Huarte, Alvaro Hurtado Usoz, Maite Jurio Bidarte, Jesús Madinabeitia Ortiz de Lazcano, Begoña Martinez Lasheras, Amaia Zubillaga Mina.</p>
        </section>
      </div>

      <div class="alert alert-dark card-quote" role="alert">
        <div class="icon-quote">
          <i class="bi bi-quote"></i>
        </div>
        <div class="text-quote">
          <h2 class="fs-3">How to cite us?</h2>
          <p class="blockquote">OUVRARD, Yves, VERKERK, Philippe (<?php echo date("Y") ?>). <em>Collatinus-web</em>. Available at: <a href="https://outils.biblissima/en/collatinus-web">https://outils.biblissima/en/collatinus-web</a> (Accessed on <?php echo $formatter->format(time()); ?>)</p>
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
					<img alt="Creative Commons License" src="https://static.biblissima.fr/images/cc-by-nc-4.0-88x31.png" class="me-1">
					<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">Creative Commons Attribution-NonCommercial 4.0 International License</a>
				</p>
				<p><small>Yves Ouvrard and Philippe Verkerk, 2014 - Application made available with no guarantee, but in the hope that it will be useful to someone</small>
		    </p>
		  </div>
		  <div class="col-sm-3">
		  	<p>Any feedback or questions?<br/>
		  		<i class="bi bi-envelope-fill"></i><a href="mailto:collatinus@biblissima-condorcet.fr"> Contact us</a>
		  	</p>
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
