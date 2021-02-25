<?php

define('ROOT', dirname(__FILE__));
define('MVC', 'MVC');
define('MVC_uri', '/MVC_proto');

require_once(ROOT . '/components/Router.php');
include_once(ROOT . '/components/Db.php');
include_once(ROOT . '/libs/Session.php');
Session::init();


$router = new Router();
$router->run();