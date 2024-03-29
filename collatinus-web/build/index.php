<?php 
session_start();

//---- function to build tokens
function generateFormToken($form) {
   // generate a token from an unique value
  $token = md5(uniqid(microtime(), true));  
  
  // Write the generated token to the session variable to check it against the hidden field when the form is sent
  $_SESSION[$form.'_token'] = $token;
  return $token;
}
$token = generateFormToken('form_lemme');
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Collatinus-web - Lemmatiseur et analyseur morphologique de textes latins | </title>
  <meta name="description" content="Collatinus-web est la version en ligne de Collatinus, un logiciel libre, gratuit et multi-plateforme pour la lemmatisation et l'analyse morphologique de textes latins.">
  <!-- CSS -->
  <link href="build/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="build/assets/css/simplelightbox.min.css" rel="stylesheet" type="text/css">
  <link href="build/assets/css/outils.css" rel="stylesheet" type="text/css">
  <style>
  	body {
      font-family: "Arial", "Helvetica", sans-serif;
    }
    .fonts-loaded body {
      font-family: "Source Sans Pro", "Arial", "Helvetica", sans-serif;
    }
  </style>
</head>

  <body class="not-front biblissima site-outils collatinus-web fr">
  <section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
			<div class="col-sm-7 col-md-8">
				<h1>Collatinus-web</h1>
				<h2>Version web du lemmatiseur et analyseur <br />morphologique de textes latins</h2>
			</div>
	    <div class="col-sm-5 col-md-4 text-right">
	    	<div class="buttons-container">
	    		<a href="https://github.com/biblissima/collatinus/tree/Daemon" class="btn btn-lg"><span class="fa fa-github"></span>Collatinus-web sur Github</a>
	    		<a href="/fr/collatinus" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="Mac, Windows, GNU/Linux">Tester la version bureau</a>
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
						Version web du logiciel multi-plateforme <a href="/fr/collatinus" title="Page de téléchargement de Collatinus">Collatinus</a>, un <strong>lemmatiseur</strong> et <strong>analyseur morphologique</strong> de textes latins.
					</p>
					<p>Elle est basée sur la <strong>version 11.2 de Collatinus</strong>. Son lexique a été élargi grâce au dépouillement systématique des dictionnaires numériques (Gaffiot 2016, Jeanneau 2017, Lewis &amp; Short 1879 et Georges 1913). Le lexique contient aujourd'hui plus de 80&nbsp;000 lemmes.</p>
					<p>Faute de place sur une page web, les options de Collatinus 11 ne sont pas toutes accessibles. Pour un usage ponctuel, cette page web convient. Pour une utilisation plus poussée, nous recommandons l'installation de la <a href="/fr/collatinus" title="Page de téléchargement de Collatinus">version résidente de Collatinus</a> qui est disponible pour Windows, Mac OS et Linux/Debian.</p>
					<p>
						Cette application est mise à disposition sans aucune garantie et reste soumise à corrections et améliorations.
					</p>
				</div>
				<div class="forms">
					<form method="post" role="form" class="form-lemme form-inline" id="form">
					    <div class="form-group">
					    	<label for="recherche_lemme" class="main-label">Rechercher le mot</label>
					        <input type="text" name="lemme" id="recherche_lemme" class="form-control" size="40" placeholder="Entrez un mot latin...">
				        </div>
				        <div class="form-group">
					        <label for="dicos">&nbsp;dans le dictionnaire&nbsp;</label>
					        <select name="dicos" id="dicos">
										<option value="dgaf " title="latin-français">Gaffiot</option>
										<option value="dlew " title="latin-anglais">Lewis &amp; Short</option>
										<option value="dgeo " title="latin-allemand">Georges</option>
										<option value="djea " title="latin-français">Jeanneau</option>
										<option value="dduc " title="glossaire du latin médiéval">du Cange</option>
										<option value="dram " title="néolatin-allemand">Ramminger</option>
										<option value="dkoe " title="latin médiéval-allemand">Köbler</option>
										<option value="dcal " title="latin-italien">Calonghi (mode image)</option>
										<option value="dfar " title="latin-portugais">Faria (mode image)</option>
										<option value="dfg "  title="latin-français">Gaffiot (mode image)</option>
										<option value="drai " title="latin-espagnol">De Miguel (mode image)</option>
										<option value="dval " title="latin-espagnol">Valbuena (mode image)</option>
					        </select>
					        <button type="submit" value="Rechercher" class="btn btn-success" aria-controls="results">Valider</button>
					    </div>		
				        <input type="hidden" name="opera" value="consult">
				        <input type="hidden" name="token" value="<?php echo $token ?>">
					</form>
					<form method="post" role="form" class="form-lemme form-inline">
					    <div class="form-group">
					    	<label for="flexion_lemme" class="main-label">Conjuguer/décliner le mot</label>
					        <input type="text" name="lemme" id="flexion_lemme" class="form-control" size="40" placeholder="Entrez un mot latin...">
				        </div>
				        <div class="form-group">
					        <button type="submit" value="Fléchir" class="btn btn-success" aria-controls="results">Valider</button>
					    	</div>
				        <input type="hidden" name="opera" value="flexion">
				        <input type="hidden" name="token" value="<?php echo $token ?>">
					</form>
					<form method="post" role="form" class="form-lemme">
					    <div class="form-group">
					    	<label for="traitement_texte" class="main-label">Traiter un texte latin</label>
					      <textarea name="texte" id="traitement_texte" class="form-control" rows="6" cols="80" placeholder="Entrez un texte latin..."></textarea>
					    </div>
					    <div class="form-group">
					        <label for="langue">Langue cible&nbsp;</label>
					        <select name="langue" id="langue">
					            <option value="fr ">français</option>
					            <option value="en ">anglais</option>
					            <option value="de ">allemand</option>
					            <option value="it ">italien</option>
					            <option value="ca ">catalan</option>
					            <option value="es ">espagnol</option>
					            <option value="gl ">galicien</option>
					        </select>
				      </div>
			        <div class="form-group">
			        	<button type="submit" name="action" value="Lemmatiser" class="btn btn-success" aria-controls="results"> Lemmatiser</button>
				        <button type="submit" name="action" value="Analyser" class="btn btn-success" aria-controls="results">Analyser</button>
				        <button type="submit" name="action" value="Taguer" class="btn btn-success" aria-controls="results">Taguer</button>
				        <button type="submit" name="action" value="Scander" class="btn btn-success" aria-controls="results">Scander</button>
				        <button type="submit" name="action" value="Accentuer" class="btn btn-success" aria-controls="results">Accentuer</button>
				        <button type="reset" name="action" value="Effacer" class="btn btn-default btn-sm" aria-controls="results"><span class="glyphicon glyphicon-remove-circle"></span> Effacer la saisie</button>
					    </div>
				        <input type="hidden" name="opera" value="traite_txt">
				        <input type="hidden" name="token" value="<?php echo $token ?>">
					</form>
				</div>

				<div class="results-container" id="myAffix-wrapper">
					<div class="results-header" id="myAffix"></div>
					<div id="results" aria-live="polite" aria-label="Réponse de Collatinus à votre requête">
					</div>
				</div>

		    <div class="well">
		    	<h3>Crédits</h3>
		    	<p>Collatinus web est développé par Yves Ouvrard, avec l'aide de Philippe Verkerk et Régis Robineau.</p>
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
		            <small>Yves Ouvrard et Philippe Verkerk, 2019 – Programme mis à votre disposition sans aucune garantie, mais avec l'espoir qu'il vous sera utile.</small>
		        </p>
		    </div>
		    <div class="col-sm-3">
		        <p>Des remarques ou questions ? :<br/>
		        <span class="glyphicon glyphicon-envelope"></span><a href="mailto:collatinus@biblissima-condorcet.fr">Nous contacter</a></p>
		    </div>
		</div>
	</div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-error">
	<div class="modal-dialog modal-sm">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span><span class="sr-only">Fermer</span></button>
	            <h4>Erreur</h4>
	        </div>
	        <div class="modal-body">
	            <div class="alert alert-warning">
	                Veuillez saisir un texte dans un des champs.
	            </div>
	        </div>
	    </div>
	    <!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

      
  <div class="site-cache" id="site-cache"></div>
  <script type="text/javascript" src="/collatinus-web/build/assets/js/vendor/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="/collatinus-web/build/assets/js/vendor/bootstrap.min.js"></script>
  <script type="text/javascript" src="/collatinus-web/build/assets/js/vendor/simplelightbox.min.js"></script>
  <script type="text/javascript" src="/collatinus-web/build/assets/js/outils.js"></script>
  <script type="text/javascript" src="/collatinus-web/collatinus-web.js"></script>
  </body>
</html>
