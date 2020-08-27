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
