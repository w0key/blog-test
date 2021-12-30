<?php
if(!defined('BLOG')) die('ACCESS DENIED');

function fatalError($message, $type = 'Неизвестный тип ошибки'){
	return die('<center><b>' . $type . ': </b><br><i>' . $message . '</i></center>');
}

function clear($data, $db_clear = true){
	$data = htmlspecialchars(trim($data));
	if($db_clear){
		global $db;
		$data = $db->clear($data);
	}
	
	return $data;
}

function a_e($data = false){
	die(
		json_encode(
					[
					'status'		=> false,
					'result'		=> $data
					],
					JSON_UNESCAPED_UNICODE
		)
	);
}
function a_s($data = false){
	die(
		json_encode(
					[
					'status'		=> true,
					'result'		=> $data
					],
					JSON_UNESCAPED_UNICODE
		)
	);
}
function a_r($data){
	die(
		json_encode(
					[
					'status'		=> 'redirect',
					'result'		=> $data
					],
					JSON_UNESCAPED_UNICODE
		)
	);
}

function a_p($data){
	die(json_encode($data,
					JSON_UNESCAPED_UNICODE));
}