<?php
if(!defined('BLOG')) die('ACCESS DENIED');

$data = json_decode(file_get_contents("php://input"));

switch(@$part[1]){
	default:	
		a_e('Укажите метод!');
		break;
	
	case 'get':
		if($part[2] == 'all') {
			$category->getCategory();
		} else {
			$category->getCategoryById($part[2]);
		}
		break;
		
	case 'add':
		if (
			empty($data->name)
		) {
			a_e('Ошибка! Не указаны данные для создания категории!');
		} else {
			$category->addCategory($data->name, $data->parennt);
		}
		break;
}
