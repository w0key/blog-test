<?php
if(!defined('BLOG')) die('ACCESS DENIED');

class config{
	public $db = [
				'host'		=> '',
				'user'		=> '',
				'pass'		=> '',
				'name'		=> 'blog',
				'pref'		=> ''
	];
	
	public $debug			= true;

	public function __construct(){
		if($this->debug){
			ini_set('error_reporting', E_ALL);
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);	
			ini_set('upload_max_filesize', '20M');
		}
		
		if(
			!$this->db['host'] OR
			!$this->db['user'] OR
			!$this->db['name']
		)
		{
			fatalError('Введите данные от базы данных', 'Ошибка настройки конфига');
		}
		
		return true;
	}
}