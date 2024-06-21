<?php


use App\Cinetech\Components\StdOut;

require_once(__DIR__ . DIRECTORY_SEPARATOR . "../vendor/autoload.php");

$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();

// Route MAP
$router->map('GET', '/', "HomeTemplate#index");

$router->map('GET', '/connection', 'UsersTemplate#SignIn', 'connection-form');
$router->map('POST', '/connection', 'UsersTemplate#SignIn', 'connection-connect');

$router->map('GET', '/inscription', 'UsersTemplate#SignUp', 'inscription-form');
$router->map('POST', '/inscription', 'UsersTemplate#Registration', 'inscription-register');

$router->map('GET', '/series', 'SeriesTemplate#index', 'series');
$router->map('GET', '/series/airing-today', 'SeriesTemplate#index', 'series-airing-today');
$router->map('GET', '/series/on-the-air', 'SeriesTemplate#index', 'series-on-the-air');
$router->map('GET', '/series/top-rated', 'SeriesTemplate#index', 'series-top-rated');

//$router->map('GET', '/series/[*:slug]-[i:id]', 'DetailsTemplate#Details', 'details-series');

$router->map('GET', '/films', 'VideoTemplate#index', 'film');
$router->map('GET', '/films/now', 'VideoTemplate#index', 'film-now');
$router->map('GET', '/films/upcoming', 'VideoTemplate#index', 'film-upcoming');
$router->map('GET', '/films/top-rated', 'VideoTemplate#index', 'film-top-rated');

$router->map('GET', '/details/[films|series:synergies]/[*:slug]/[i:id]', 'DetailsTemplate#Details', 'details');


$router->map('GET', '/contact', 'contact', 'contact');

// Route Match
$match = $router->match();

$content = 'error';


// $match est un array
if (is_array($match)) {
  $params = $match['params'];

  // Target contain [Controller à appeler]#[Méthod à éxecuter] 
  if (str_contains($match['target'], '#')) {
    // Explode Target et List params $controller, $action
    list($controller, $action) = explode('#', $match['target']);

    // Définir le namespace du contrôlleur de Templates
    $controller = 'App\\Cinetech\\Templates\\' . $controller;
    $controller = class_exists($controller) ? new $controller : false;
    if (isset($_POST)) {
      foreach ($_POST as $key => $value) {
        $match['params'][$key] = htmlspecialchars(trim($value));
      }

      //var_dump($match);
    }
    $match['params']['uri'] = $uri; // Ajoute l'uri dans les params à transmètre à la class Templates
    //var_dump($match['params']);
    if (is_callable(array($controller, $action))) {
      ob_start();
      $callable = call_user_func_array(array($controller, $action), $match['params']);
      ob_get_clean();
      $content = 'default';

      if ($callable === false) {
        $content = 'error';
      }
    } else {
      $content = 'error';
    }
  }

  // Else return templates
  else {
    $content = 'template';
  }
}

// Else return 404
else {
  $content = 'error';
}

// Require HEADER
require_once(__DIR__ . DIRECTORY_SEPARATOR . '../src/elements/header.php');

// CONTENT
switch ($content) {

  case 'error';
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "../src/Templates/404.php");
    break;

  case 'template';
    require_once(__DIR__ . DIRECTORY_SEPARATOR . "../src/Templates/{$match['target']}.php");
    break;

  default:
    is_string($callable) ? StdOut::echo($callable) : require_once(__DIR__ . DIRECTORY_SEPARATOR . "../src/Templates/404.php");
}
// Require FOOTER
require_once(__DIR__ . DIRECTORY_SEPARATOR . '../src/elements/footer.php');
