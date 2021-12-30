<?php
if(!defined('BLOG')) die('ACCESS DENIED');

class Authors {
	public function getAuthorById($id, $type = 0){
		global $db;
		
		$query = $db->query("SELECT * FROM `authors` WHERE `author_id` = '".$id."' ");
		$row = $db->getrow($query);
		
		if($type < 1) {
			return a_p($row);
		} else {
			return $row;
		}
		
	}
	
	public function getAuthors(){
		global $db;
		
		$query = $db->query("SELECT * FROM `authors`");

		$data = [];
		
		while($row = $db->getrow($query))
		{
			extract($row);
			
			$items = [
				'author_id' => $author_id,
				'author_name' => $author_name,
				'image' => $author_image
			];
			
			array_push($data, $items);
			
		}
		
		return a_p($data);
	}
	
	public function addAuthor($name, $image){
		global $db;
		
		if (
			!empty($name) &&
			!empty($image)
		) {
			if($db->query("INSERT INTO `authors` SET 
						`author_name`	= '".$name."',
						`author_image`		= '".$image."'")) {
							
				a_s(array("message" => "Автор успешно добавлен."));	
			} else {
				a_e(array("message" => "Ошибка! Автор не добавлен."));	
			}
		} else {
			a_e(array("message" => "Ошибка! Некорректные данные!."));
		}
	}
}