<?php 

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  function d($var) {
    echo "<br>";
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
  }
?>