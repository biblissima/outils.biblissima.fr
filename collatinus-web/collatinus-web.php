<?php
error_reporting(0);
session_start();

/****************************************************************
 **                 fonctions                                  **
 ****************************************************************/

//---- Transmet la requete au demon sur le serveur
function interroge($requete) {
  $sk = fsockopen("localhost", 5555, $errnum, $errstr, 30);
  if (!$sk) {
    return "erreur $errnum $errstr";
  }
  $avant = array('æ','Æ','œ','Œ','̀','́','à','á','è','é','ì','í','ò','ó','ù','ú','À','Á','È','É','Ì','Í','Ò','Ó','Ù','Ú');
  $apres = array('ae','Ae','oe','Oe','','','a','a','e','e','i','i','o','o','u','u','A','A','E','E','I','I','O','O','U','U');
  $requete = str_replace($avant, $apres, $requete);
  $avant = array('̄','̆','ā','ă','ē','ĕ','ī','ĭ','ō','ŏ','ū','ŭ','Ā','Ă','Ē','Ĕ','Ī','Ĭ','Ō','Ŏ','Ū','Ŭ');
  $apres = array('','','a','a','e','e','i','i','o','o','u','u','A','A','E','E','I','I','O','O','U','U');
  $requete = str_replace($avant, $apres, $requete);
  // Remplacement de caractères exotiques par leur équivalent ASCII
  fwrite($sk, $requete);
  $dati = "";
  while (!feof($sk)) {
    $dati .= fgets($sk, 1024);
  }
  fclose($sk);
  return $dati;
}

function sanitize($req, $opera) {
  $req = trim(strip_tags($req));

  $punctuation = array('.',';',':',',','!','-','–','—','_','?','…','/','(',')','[',']','{','}','«','»');
  $unwanted  = array('&','@','"','§','¨','^','*','$','€','=','+','%','°', '£','#','،', '~', '∞','÷','≠','ß','◊','©','≈','‹','≤','‡','ƒ','ﬁ','¬','µ','π','º','†','®','ø','Ç','¡','¶','‘','“','','•','>','<','\'','-');
  $pattern = '/([^\p{Latin}\p{P}\p{Z}\p{S}\p{No}\r\n\t])|([-\d]$)/ui';
  $patterns = array();
  $patterns[0] = '/([^\p{Latin}\p{P}\p{Z}\r\n\t])/ui';
  $patterns[1] = '/([^[:ascii:]])/ui';
  $patterns[2] = '/([-\d]$)/ui';
  $patterns[3] = '/(\[)|(\])/ui';
  $patterns[4] = '/[a-z]+(\')$/ui';
  //$patterns[5] = '/[a-z](\.) /ui';

  if ($opera !== 'traite_txt') {
    $exclude = array_merge($punctuation, $unwanted);
    $req = str_replace($exclude, '', $req);
    $req = str_replace(' ', '', $req);
    $req = preg_replace($patterns, '', $req);
    return !empty($req) ? $req : 'nullus';
  }

  if ($opera == 'traite_txt') {    
    $req = str_replace($unwanted, '', $req);
    $req = preg_replace($patterns, '', $req);
    return !empty($req) ? $req : 'nullus';
  }
}
 
//---- Verifie les valeurs des tokens
function verifyFormToken($form) {
  
  // bypass token for lexilogos
  if (isset($_POST['referer']) && $_POST['referer'] == 'lexilogos') {
    return true;
  }

  // check if a session is started and a token is transmitted, if not return an error
  if (!isset($_SESSION[$form.'_token'])) {
    return false;
  }
  
  // check if the form is sent with token in it
  if (!isset($_POST['token'])) {
    return false;
  }
  
  // compare the tokens against each other if they are still the same
  if ($_SESSION[$form.'_token'] !== $_POST['token']) {
    return false;
  }

  return true;
}

/**********************************************************
 **                       Initialisation                 **
 * 
 * Prefixes des operations du demon :
 * - d = dictionnaires (dva, dge, dle, dga, dca, ddu)
 * - h2 = lemmatisation (avec les formes du texte)
 * - h6 = analyse (avec morpho et formes)
 * - p1 = appel du tagueur probabiliste
 * - a0 = scansion
 * - a10 = accentuation (ecclésiastique)
 * - i2 = lemmatisation (avec les formes du texte, option médiévale)
 * - i6 = analyse (avec morpho et formes, option médiévale)
 * - q1 = appel du tagueur probabiliste, option médiévale
 * - b0 = scansion, option médiévale
 * - b10 = accentuation (ecclésiastique, option médiévale)
 * - F = flexion (attention à la majuscule !)
 *
 * Quand les traductions sont importantes dans la réponse,
 * le préfixe est complété par la langue cible en deux caractères.
 * par exemple, h2fr ou p1en.
 * Le démon est prêt pour changer la langue cible pour la flexion,
 * mais il n'y a pas de sélection de la langue dans
 * le formulaire de flexion...
 *
 * Le préfixe complet est maintenant précédé d'un -
 * et suivi d'une espace (au lieu du :).
 * 
 * Voir server.cpp -> Serveur::exec
 * dans la branche Daemon de Collatinus 11.
 * 
 **********************************************************/

if (isset($_POST['opera'])) {
  $opera = $_POST['opera'];
  switch ($opera) {
    case 'consult' :
      $mapKeysToNames = array(
        'dgaf' => 'Gaffiot',
        'dlew' => 'Lewis',
        'dgeo' => 'Georges',
        'djea' => 'Jeanneau',
        'dduc' => 'DuCange',
        'dram' => 'Ramminger',
        'dkoe' => 'Kobler',
        'dcal' => 'Calonghi',
        'dfar' => 'Faria',
        'drai' => 'DeMiguel',
        'dval' => 'Valbuena'
      );
      $dico = trim(strip_tags($_POST['dicos']));
      // convertit l'ancienne syntaxe des requêtes 
      if (strpos($dico, ":") !== false) {
        $dico = str_replace(":", "", $dico);
      }
      $lemme = $_POST['lemme'];
      foreach ($mapKeysToNames as $key => $value) {
        if (strtolower($dico) == strtolower($value)) {
          $dico = $key;
          break;
        }
      }
      $requete = "-" . $dico ." ". sanitize($lemme, $opera);
      break;
    case 'flexion' :
      $lemme = $_POST['lemme'];
      $requete = "-F " . sanitize($lemme, $opera);
      break;
    case 'traite_txt' :
      $langue = $_POST['langue'];
      $medieval = $_POST['medieval'];
      $texte = sanitize($_POST['texte'], $opera);
      $requete = "";
      if (!empty($texte)) {
        switch ($medieval) {
          case "true" :
            switch($_POST['action']) {
              case 'Lemmatiser' :
                $requete = "-i2" . $langue . $texte;
                break;
              case 'Analyser' :
                $requete = "-i6" . $langue . $texte;
                break;
              case 'Taguer' :
                $requete = "-q1" . $langue . $texte;
                break;
              case 'Scander' :
                $requete = "-b0 " . $texte;
                break;
              case 'Accentuer' :
                $requete = "-b10 " . $texte;
                break;
            }
            break;
          case "false" :
            switch($_POST['action']) {
              case 'Lemmatiser' :
                $requete = "-h2" . $langue . $texte;
                break;
              case 'Analyser' :
                $requete = "-h6" . $langue . $texte;
                break;
              case 'Taguer' :
                $requete = "-p1" . $langue . $texte;
                break;
              case 'Scander' :
                $requete = "-a0 " . $texte;
                break;
              case 'Accentuer' :
                $requete = "-a10 " . $texte;
                break;
            }
            break;
        }
      }
      break;
  }
} elseif (isset($_POST["r"])) {
  $requete = $_POST["r"];
} else {
  // La première fois
  $lemme = "";
  $dico = "dgaf ";
  $langue = "fr ";
  $texte = "";
}


/*********************************************
 **               Traitement                 **
 *********************************************/

if ($requete != '') { 
  $requete = trim($requete);
  $sol = interroge($requete);   
  echo $sol;
}

/*******
 * J'ai renoncé à renvoyer, comme le faisait le démon précédent,
 * de quoi recomposer le texte en ajoutant les bulles d'aides.
 * Cela simplifie grandement le problème, puisque j'utilise
 * les mêmes fonctions que la version résidente de Collatinus 11.
 *
 * Philippe, Janvier 2019.
 ***********/
