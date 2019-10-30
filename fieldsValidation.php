<?php 

$fieldsErrors = [];
$notificationMessage = "";

$ONLY_ALPHA = "([a-zA-ZÀ-ù0-9- ]+)";
$ONLY_STR = "([a-zA-ZÀ-ù-]+)";
$ONLY_NUM = "([\d]+)";
$ONLY_FLOAT = "((\d*\.)?\d+)";
$ONLY_TIME = "(\d{1,2}:\d{2})";

function secureData() {
  $_POST = array_map("trim", $_POST);
  $_POST = array_map("strip_tags", $_POST);
  $_POST = array_map("htmlspecialchars", $_POST);
}

function fieldVerify($fields) {
  $err = [];

  foreach ($fields as $key => $value) {
    if(!isset($_POST[$key]) && empty($_POST[$key])) {
      $err[$key] = ucfirst(str_replace("_", " ", $key))." is required";
    } else {
      if(!empty($value)) {
        foreach ($value as $v) {
          preg_match('/^'.$v.'$/u', $_POST[$key], $matches, PREG_OFFSET_CAPTURE);
          if(empty($matches)) 
            $err[$key] = ucfirst(str_replace("_", " ", $key))." is invalid";
        }
      }
    }
  }

  return $err;
}

function showNotificationMessage() {
  global $notificationMessage;
  if(!empty($notificationMessage))
    return '<div class="notification is-success">
            <button class="delete"></button>
            '.$notificationMessage.'
          </div>';
}

function showErrorMsg($name) {
  global $fieldsErrors;
  if(isset($fieldsErrors[$name])) {
    return '<p class="help is-danger">'.$fieldsErrors[$name].'</p>';
  }
}

function addErrorClasse($name) {
  global $fieldsErrors;
  if(isset($fieldsErrors[$name])) echo 'is-danger';
}

function getPostValue($name) {
  global $fieldsErrors;
  if(isset($_POST[$name]) && !empty($_POST[$name])) {
    if(!isset($fieldsErrors[$name])) echo $_POST[$name];
  }
}

?>
