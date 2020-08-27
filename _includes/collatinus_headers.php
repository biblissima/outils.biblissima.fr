<?php
// Download script
if (isset ($_GET['file']))
{
  // $file = $_SERVER['DOCUMENT_ROOT']."/resources/collatinus/telechargements/".$_GET['file'];
  $file = "{{site.collatinus_path}}".$_GET['file'];
  if (file_exists ($file))
  {
      /**
       *
       * Attention au module XSendFile : Il faudra peut être préciser le XSendFilePath dans le vhost en prod, sinon il ne trouve pas le dossier contenant les fichiers. Voir exemple en local : /etc/apache2/sites-available/outils.biblissima.local.conf
       *
       */
      
      header('X-Sendfile: ' . $file);
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($file).'"');
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: '.filesize($file));
      ob_clean();
      flush();
      readfile($file);
      exit;
  }
  else {
    die;
  }
}
?>
