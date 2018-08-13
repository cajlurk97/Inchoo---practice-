<?php

/*
 * Routing
 */
require '../Core/Router.php';
$router = new Router();

/*
 * Add routes here
 */

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Post', 'action' => 'index']);


$url = $_SERVER['QUERY_STRING'];


/*
 * Test
 */
echo "Your url is: " . $url . "<br><br>";


echo "printing all routes:" .  "<br>";
echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>' . "<br>";



echo "printing result for current url:" . "<br>";
if ($router->match($url)){
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
}
else{
    echo "No route found for url '$url'";
}


