<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php");


$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

// Route MAP
$router->map('GET', '/', "HomeTemplate#index");
$router->map('GET', '/serie', 'serie', 'serie');
$router->map('GET', '/film', 'film', 'film');
$router->map('GET', '/contact', 'contact', 'contact');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');

// Route MAtch
$match = $router->match();

// Require HEADER
require_once(__DIR__ . DIRECTORY_SEPARATOR . '../src/elements/header.php');


// $match is array
if (is_array($match)) {
  $params = $match['params'];

  // Target contain Controller#Action
  if (str_contains($match['target'], '#')) {
    // Explode Target and List params $controller, $action
    list($controller, $action) = explode('#', $match['target']);

    // Assign controller in Variable and new Instance of class
    $controller = 'App\\Cinetech\\Templates\\' . $controller;
    $controller = class_exists($controller) ? new $controller : false;

    if (is_callable(array($controller, $action))) {
      call_user_func_array(array($controller, $action), array($match['params']));
    } else {
      echo "error";
    }
  }

  // Else return templates
  else {
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "../src/Templates/{$match['target']}.php");
  }
}

// Else return 404
else {
  require_once(__DIR__ . DIRECTORY_SEPARATOR . "../src/Templates/404.php");
}

// Require Footer
require_once(__DIR__ . DIRECTORY_SEPARATOR . '../src/elements/footer.php');
