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
 
//---- Verifie les valeurs des tokens
function verifyFormToken($form) {
    
  // check if a session is started and a token is transmitted, if not return an error
  if(!isset($_SESSION[$form.'_token'])) {
    return false;
  }
  
  // check if the form is sent with token in it
  if(!isset($_POST['token'])) {
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
      $dicos = strip_tags($_POST['dicos']);
      // convertit l'ancienne syntaxe des requêtes 
      if (strpos($dicos, ":") !== false) {
        $dicos = str_replace(":", " ", $dicos);
      }
      $lemme = strip_tags($_POST['lemme']);
      $requete = "-" . $dicos . $lemme;
      break;
    case 'flexion' :
      $lemme = strip_tags($_POST['lemme']);
      $requete = "-F " . $lemme;
      break;
    case 'traite_txt' :
      $langue = $_POST['langue'];
      $texte = strip_tags($_POST['texte']);
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
} elseif (isset($_POST["r"])) {
  $requete = $_POST["r"];
} else {
  // La première fois
  $lemme = "";
  $dico = "dga ";
  $langue = "fr ";
  $texte = "";
}


/*********************************************
 **               Traitement                 **
 *********************************************/

if ($requete != '') {
//    $sol = interroge($requete);
    
  // Controle du token
  if (verifyFormToken('form_lemme')) {
    $requete = trim($requete);
    $sol = interroge($requete);
  
  // sauf pour les requetes de type "page prec/suiv"
  } elseif (isset($_POST["r"])) {
    $sol = interroge($requete);
    
  } else {
    echo "<p class='text-danger'>Une erreur s'est produite ?" . $requete . "</p> <button type='button' class='btn btn-default' onclick='javascript:window.location.reload()'><span class='glyphicon glyphicon-refresh'></span> Recharger la page</button>";
  }

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
