<?php
if(!defined('BLOG')) die('ACCESS DENIED');

class db{
	public $database_id = false;
	public $query_id	= false;
	
	public function __construct($h, $u, $p, $n){
		if(
			!$h ||
			!$u ||
			!$n
		)
		{
			fatalError('Не указаны данные для подключения к базе данных', 'Ошибка библиотеки баз данных');
		}
		
		if(!$this->database_id = @mysqli_connect($h, $u, $p, $n)){
			fatalError('Невозможно установить соединение с '.$n, 'Ошибка библиотеки баз данных');
		}
		$this->query('SET NAMES utf8');          
		$this->query('SET CHARACTER SET utf8');  
		$this->query('SET COLLATION_CONNECTION="utf8_general_ci"');
		return true;
	}
	
	public function query($query, $database_id = false){
		global $config;
		if(!$database_id){
			if(!$this->database_id){
				fatalError('Соединений не установлено', 'Ошибка библиотеки баз данных');
			}
			
			$database_id = $this->database_id;
		}
		
		if(!$this->query_id = @mysqli_query($database_id, $query)){
			$error;
			
			if($config->debug){
				$error = '<br>' . $query;
			}
			
			fatalError('Ошибка выполнения SQL запроса ' . $error, 'Ошибка библиотеки баз данных');
		}
		
		return $this->query_id;
	}
	
	public function getrow($query = false){
		if(!$query){
			$query = $this->query_id;
		}
		
		return @mysqli_fetch_assoc($query);
	}
	public function num_rows($query = false){
		if(!$query){
			$query = $this->query_id;
		}
		
		return @mysqli_num_rows($query);
	}
	
	public function clear($data, $database_id = false){
		if(!$database_id){
			if(!$this->database_id){
				fatalError('Соединений неустановлено', 'Ошибка библиотеки баз данных');
			}
			
			$database_id = $this->database_id;
		}
		
		return @mysqli_real_escape_string($database_id, $data);
	}
	
	public function insert_id($database_id = false){
		if(!$database_id){
			if(!$this->database_id){
				fatalError('Соединений неустановлено', 'Ошибка библиотеки баз данных');
			}
			
			$database_id = $this->database_id;
		}
		
		return @mysqli_insert_id($database_id);
	}
	
	public function close($database_id = false){
		if(!$database_id){
			if(!$this->database_id){
				fatalError('Соединений неустановлено', 'Ошибка библиотеки баз данных');
			}
			
			$database_id = $this->database_id;
		}
		
		return @mysqli_close($database_id);
	}
}