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

<section class="top-banner">
	<div class="container">
		<div class="banner-content row sm-flex">
            <div class="col-sm-7 col-md-8">
    			<h1>Eulexis-web</h1>
    			<h2>Lemmatiser for ancient Greek texts (online app)</h2>
            </div>
            <div class="col-sm-5 col-md-4 text-right">
    		    <div class="buttons-container">
    		    	<a class="btn btn-lg" href="https://github.com/biblissima/outils.biblissima.fr/tree/master/eulexis-web"><span class="fa fa-github"></span>Eulexis-web on Github</a>
                    <a href="/en/eulexis" class="btn btn-lg" data-toggle="tooltip" data-placement="bottom" data-original-title="For Mac OS and Windows">Try the desktop app</a>
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
                    <p class="lead">Eulexis is a <strong>lemmatiser for Ancient Greek texts</strong>.</p>
                    <div class="news bg-warning">
                        <p class="lead">The &laquo; Bailly 2020 Hugo Chávez &raquo; is available on Eulexis!</p>
                        <p>Thanks to the hard work of a team of volunteers led by Gérard Gréco, with special contribution of André Charbonnet, Mark De Wilde and Bernard Maréchal, the Bailly 2020 Hugo Chávez is <a href="http://gerardgreco.free.fr/spip.php?article52">available under conditions in PDF</a> since April 2020. You can now consult it online. If you find this work useful, do not hesitate to encourage it and <a href="http://gerardgreco.free.fr/spip.php?article52">make a donation</a>.</p>
                    </div>
                    <p>This application has been made available with no guarantee and may be subject to further corrections and improvements. If you notice any errors or typos, please do not hesitate to <a href="mailto:eulexis@biblissima-condorcet.fr">report them</a>!</p>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-info">More information</button>
                </div>
			    <!-- Recherche -->
                <form method="post" role="form" class="form-lemme form-inline">
                    <div class="form-group">
                        <label for="recherche_lemme">Search for a lemma</label>
                        <input type="text" name="lemme" id="recherche_lemme" value="" class="form-control" size="40" placeholder="Enter a Greek word...">
                        <input type="submit" value="Search" class="btn btn-success">
                        <input type="hidden" name="consultation" value="true">
                    </div>
                    <div class="indent">
                        <input type="checkbox" name="dicos[]" value="LSJ" id="lsj"> <label for="lsj" title="Liddell–Scott–Jones Greek-English Lexicon">LSJ</label>
                        <input type="checkbox" name="dicos[]" value="Pape" id="pape"> <label for="pape" title="Handwörterbuch der griechischen Sprache (Pape 1880)">Pape</label>
                        <input type="checkbox" name="dicos[]" value="Bailly" id="bailly" title> <label for="bailly" title="Dictionnaire Grec-français Bailly (1895; 11e éd. 1935)">Bailly</label>
                        <input type="checkbox" name="dicos[]" value="B_Abr" id="bailly_abr"> <label for="bailly_abr" title="Abrégé du Dictionnaire Grec-français Bailly (1901, 6e éd. 1919)">Abrégé du Bailly</label>
                    </div>
                </form>
                <!-- Flexion -->
                <form method="post" role="form" class="form-lemme form-inline">
                    <div class="form-group">
                        <label for="flexion_lemme" class="main-label">Inflect a lemma</label>
                        <input type="text" name="lemme" id="flexion_lemme" value="" class="form-control" size="40" placeholder="Enter a Greek word...">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Inflect" class="btn btn-success">
                        <input type="hidden" name="flexion" value="true">
                    </div>
                </form>
                <!-- Traitement texte -->
                <form method="post" role="form" class="form-lemme form-inline">
                    <div class="form-group">
                        <label for="lemmatiser_texte" class="main-label">Lemmatise a Greek text</label>
                        <textarea name="grec" id="lemmatiser_texte" value="" class="form-control" rows="6" cols="80" placeholder="Enter a Greek text..."></textarea>
                    </div>
                    <br>
                    <div class="form-group indent">
                        <input type="submit" name="action" value="Lemmatise" class="btn btn-success">
                        <input type="checkbox" name="exacte"> Exact forms only
                        <input type="hidden" name="lemmatisation" value="true">
                        <input type="hidden" name="lemme" value="">
                    </div>
                    <div class="form-group">
                        <button type="reset" name="action" value="Erase" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> Erase</button>
                    </div>
                </form>
                <div id="results"></div>
                <div class="well">
                    <h3>Credits</h3>
                    <p>Many thanks to Philipp Roelli, André Charbonnet, Mark De Wilde, Gérard Gréco, Peter J. Heslin, Yves Ouvrard, Eduard Frunzeanu and Régis Robineau.</p>
                    <ul>
                        <li>The LSJ is from <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revised and corrected by <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                        <li>The Pape is from <a href="http://www.mlat.uzh.ch/MLS/">Philipp Roelli</a>, revised and corrected by <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                        <li>The abridged Bailly is from <a href="http://chaerephon.e-monsite.com/pages/litterature/grec-ancien/bailly.html">Chaeréphon (André Charbonnet)</a></li>
                        <li>The <em>Bailly 2020 Hugo Chávez</em> is from <a href="http://gerardgreco.free.fr/spip.php?article52">Gérard Gréco</a>, converted from TeX to HTML by Philippe Verkerk.</li>
                        <li>The lemmatisation and inflection functions are made possible with files from <a href="https://community.dur.ac.uk/p.j.heslin/Software/Diogenes/">Diogenes</a> and <a href="http://www.perseus.tufts.edu/">Perseus</a>.</li>
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
                <p>
                    <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" class="license"><img alt="Creative Commons License" style="border-width:0" src="https://static.biblissima.fr/images/cc-by-nc-4.0-88x31.png">Creative Commons Attribution-NonCommercial 4.0 International License</a>
                </p>
                <p>
                    <small>Philippe Verkerk, 2014 – Application made available with no guarantee, but in the hope that it will be useful to someone</small>
                </p>
            </div>
            <div class="col-sm-3">
                <p>Any feedback or questions?<br/>
                <span class="glyphicon glyphicon-envelope"></span><a href="mailto:eulexis@biblissima-condorcet.fr">Contact us</a></p>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" id="modal-info">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="glyphicon glyphicon-remove-sign"></span><span class="sr-only">Close</span></button>
                <h2>More information</h2>
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
