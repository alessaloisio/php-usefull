<?php
  function createConnection($db_name) {
    
    // BDD CONNEXION
    $options = [
      PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];

    try {
      return new PDO('mysql:host=localhost;dbname='.$db_name.';charset=utf8', 'xampp', 'becode', $options);
    } catch(Exception $e) {
      die('Erreur : '.$e->getMessage());
    }
  }
?>