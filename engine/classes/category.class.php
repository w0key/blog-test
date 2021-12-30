<?php
if(!defined('BLOG')) die('ACCESS DENIED');

class Category {
	public function addCategory($name, $parent){
		global $db;
		
		if (
			!empty($name) &&
			!empty($parent)
		) {
			if($db->query("INSERT INTO `category` SET 
						`category_name`		= '".$name."',
						`category_parent`	= '".$parent."'")) {
							
				a_s(array("message" => "Категория успешно добавлена."));	
			} else {
				a_e(array("message" => "Ошибка! Категория не добавлена."));	
			}
		} else {
			a_e(array("message" => "Ошибка! Некорректные данные!."));
		}
	}
	
	public function getCategory(){
		global $db;
		
		$query = $db->query("SELECT * FROM `category`");

		$data = [];
		
		while($row = $db->getrow($query))
		{
			extract($row);
			
			$items = [
				'id' => $category_id,
				'name' => $category_name,
				'parent' => $category_parent
			];
			
			array_push($data, $items);
			
		}
		
		return a_p($data);
	}
	
	public function getCategoryById($id, $type = 0){
		global $db;
		
		$query = $db->query("SELECT * FROM `category` WHERE `category_id` = '".$id."' ");
		$row = $db->getrow($query);
		
		if($type < 1) {
			return a_p($row);
		} else {
			if($row['category_name'] == 'null'){
				return 'Без категории';
			} else {
				return $row;
			}
			
		}	
	}
	
}