<?php

require "./vendor/autoload.php";

$route = \Zend\Mvc\Router\Http\Segment::factory(
	array(
	    'route' => '/:controller',
	    'constraints' => array(
	        'controller' => '[a-zA-Z]+'
    )
));

$req = new \Zend\Http\Request();
$req->setUri($argv[1]);
$match = $route->match($req);
if ($match !== null) {
	echo "ok";
}else{
	echo "non";
}