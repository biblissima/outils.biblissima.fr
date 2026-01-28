<?php
$page = 0;
if (isset($_POST['nom']) && isset($_POST['dico'])) {
  $nom = trim(strip_tags($_POST['nom']));
  $nom = strtolower($nom);
  $dico = trim(strip_tags($_POST['dico']));
  $f_path = "data/". $dico . ".idx";
  $f_index = fopen($f_path, 'r');
  $line = trim(fgets($f_index));
  switch ($dico) {
    case 'perin':
      $page = $first_page = 2;
      $last_page = 1599;
      break;
    case 'de_vit':
      $page = $first_page = 5;
      $last_page = 3208;
      break;
    case 'benseler':
      $nom = latin2greek($nom);
      $page = $first_page = 61;
      $last_page = 1770;
      break;
  }

  // https://stackoverflow.com/questions/12888674/how-does-php-compare-strings-with-comparison-operators
  // pb dans le benseler : abaris arrive avant abareis
  // autre ex dans le perin : vitalio après vitalis

  if (isset($_POST['page'])) {
    $page = $_POST['page'];
  } else {
    while ($nom >= $line && $page < $last_page && !feof($f_index)) {
      $page = $page + 1;
      $line = trim(fgets($f_index));
    }
    fclose($f_index);
  }
}

$img = substr(10000 + $page, 1, 4);

$nav = "<nav role='navigation' aria-label='Navigation dans le dictionnaire'>";
$nav .= "<ul class='pager'>";
$nav .= "<li class='previous' rel='prev'>";
if ($page > $first_page) {
  $nav .= "<a href='#results' class='scrolltop' data-value='".($page - 1)."'>&larr;</a>";
}
$nav .= "</li>";
$nav .= "<li class='next' rel='next'>";
if ($page < $last_page) {
  $nav .= "<a href='#results' class='scrolltop' data-value='".($page + 1)."'>&rarr;</a>";
}
$nav .= "</li>";
$nav .= "</ul></nav>";

echo $nav;
echo "<img src='/onomasticon/data/".$dico."/".$img.".jpg' alt='".$dico." image #".$img."' />";
echo $nav;

function latin2greek($mot) {
  if (mb_strrpos($mot, 's') == (mb_strlen($mot) - 1) && mb_strlen($mot) > 1) {
    $mot = mb_substr($mot, 0, mb_strlen($mot) - 1) . 'ς';
  }
  $lat = array('a', 'b', 'g', 'd', 'e', 'z', 'h', 'q', 'i', 'k', 'l', 'm', 'n', 'c', 'o', 'p', 'r', 's', 't', 'u', 'f', 'x', 'y', 'w', 'v');
  $grec = array('α', 'β', 'γ', 'δ', 'ε', 'ζ', 'η', 'θ', 'ι', 'κ', 'λ', 'μ', 'ν', 'ξ', 'ο', 'π', 'ρ', 'σ', 'τ', 'υ', 'φ', 'χ', 'ψ', 'ω', 'ϝ');
  return str_ireplace($lat, $grec, $mot);
}
?>
