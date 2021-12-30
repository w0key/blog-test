<?php
// header("Access-Control-Allow-Origin: *");
// header("Content-Type: application/json; charset=UTF-8");

define('BLOG',							true);
define('ROOT',							dirname(__FILE__) . '/');
define('ENGINE', 						ROOT . 'engine/');

include(ENGINE . 						'core.php');