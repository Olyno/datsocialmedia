<?php
session_start();

require_once("config/secret.php");

/**************
 * ROUTER 
 *************/

// on récupère l'url
$url = $_SERVER["REQUEST_URI"];

// on récupère le path
$path = parse_url($url, PHP_URL_PATH);

@list($null, $controller, $action) = explode($secret["root"]["baseUrl"], $path);

echo var_dump($controller);
echo var_dump($action);

$controller = !empty($controller) ? $controller : "main";
$action = $action ?? "index";

// on récupère les paramètres
$parameters = $_GET;

$pdo = new PDO('mysql:dbname='.$secret["db"]["dbname"].';host='.$secret["db"]["host"], $secret["db"]["username"], $secret["db"]['password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// on va décider du controller qui va gérer

if($controller == "main"){
  require_once("controllers/mainController.php");
}else if($controller == "signup"){
  require_once("controllers/signupController.php");
}else if($controller == "signin"){
  require_once("controllers/signinController.php");
}else{
  require_once("controllers/404Controller.php");
}