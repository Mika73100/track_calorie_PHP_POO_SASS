<?php 
/*

Cette classe représente une session PHP. Elle permet de démarrer une session, 
d'enregistrer des valeurs dans la session, de récupérer des valeurs de la session et de détruire la session.

*/


class Session {
    public function __construct() {
      session_start();
    }
  
    public function set($key, $value) {
      $_SESSION[$key] = $value;
    }
  
    public function get($key)
  {
  if (isset($_SESSION[$key])) {
  return $_SESSION[$key];
  }
  return false;
  }
  
  public function destroy() {
  session_destroy();
  }
  }


  
?>