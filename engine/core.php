<?php
if(!defined('BLOG')) die('ACCESS DENIED');

include(ENGINE . 'functions.php');
include(ENGINE . 'config.php');

$config = new config();
include(ENGINE . 'classes/db.class.php');

include(ENGINE . 'classes/publications.class.php');
$news = new News();

include(ENGINE . 'classes/authors.class.php');
$author = new Authors();

include(ENGINE . 'classes/category.class.php');
$category = new Category();

$db = new db(
		$config->db['host'],
		$config->db['user'],
		$config->db['pass'],
		$config->db['name']
);

$page_not_found = false;

if(@$_GET['action']){
	$part = explode('/', $_GET['action']);
	
	if(!file_exists(ENGINE . 'modules/' . $part[0] . '.php')){
		$page_not_found = true;
	}
} else {
	a_e('404 error');
}

if(@$page_not_found){
	a_e('Страница не найдена' . $page_not_found);
	
}else{
	include(ENGINE . 'modules/' . $part[0] . '.php');
}