<?php
if(!defined('BLOG')) die('ACCESS DENIED');

class News {
	public function addNews($title, $text, $author, $category, $file){
		global $db;
		
		if (
			!empty($title) &&
			!empty($text) &&
			!empty($author) &&
			!empty($category)
		) {
			if($db->query("INSERT INTO `publications` SET 
						`title`			= '".$title."',
						`text`			= '".$text."',
						`image`			= '".$file."',
						`a_id`			= '".$author."',
						`cat_id`		= '".$category."'")){
							
				a_s(array("message" => "Новость успешно добавлена."));	
			} else {
				a_e(array("message" => "Ошибка! Новость не добавлена."));	
			}
		} else {
			a_e(array("message" => "Ошибка! Некорректные данные!."));
		}
	}

	public function getNewsById($id){
		global $db, $author, $category;
		
		if (
			!empty($id)
		) {
			$query = $db->query("SELECT * FROM `publications` WHERE `id` = '".$id."'");
			
			if(!$row = $db->getrow($query)){
				a_e(array("message" => "Ошибка! Публикация не найдена!."));
			}
			
			extract($row);
			
			$data = [
				'id' => $id,
				'title' => $title,
				'text' => $text,
				'created' => $created,
				'image' => $image,
				'author_id' => $a_id,
				'author_name' => $author->getAuthorById($a_id, 1)['author_name'],
				'author_image' => $author->getAuthorById($a_id, 1)['author_image'],
				'category_id' => $cat_id,
				'category_name' => $category->getCategoryById($cat_id, 1)['category_name'],
				'category_parent' => $category->getCategoryById($cat_id, 1)['category_parent'],
			];
			
			return a_p($data);
		} else {
			a_e(array("message" => "Ошибка! Некорректные данные!."));
		}
	}

	public function getAllNews(){
		global $db, $author, $category;
		
		$query = $db->query("SELECT * FROM `publications`");
									
		$data = [];
		
		while($row = $db->getrow($query))
		{
			extract($row);
			
			$items = [
				'id' => $id,
				'title' => $title,
				'text' => $text,
				'created' => $created,
				'image' => $image,
				'author_id' => $a_id,
				'author_name' => $author->getAuthorById($a_id, 1)['author_name'],
				'author_image' => $author->getAuthorById($a_id, 1)['author_image'],
				'category_id' => $cat_id,
				'category_name' => $category->getCategoryById($cat_id, 1)['category_name'],
				'category_parent' => $category->getCategoryById($cat_id, 1)['category_parent'],
			];

			array_push($data, $items);
		}
		
		return a_p($data);
	}
	
	public function searchNews($data){
		global $db, $author, $category;
		
		$query = $db->query("SELECT * FROM `publications` 
									JOIN `authors` ON `publications`.`a_id` = `authors`.`author_id` 
									WHERE `publications`.`title` LIKE '".$data."%' 
									OR `authors`.`author_name` LIKE '".$data."%'");
									
		$data = [];
		
		while($row = $db->getrow($query))
		{
			extract($row);
			
			$items = [
				'id' => $id,
				'title' => $title,
				'text' => $text,
				'created' => $created,
				'image' => $image,
				'author_id' => $a_id,
				'author_name' => $author->getAuthorById($a_id, 1)['author_name'],
				'author_image' => $author->getAuthorById($a_id, 1)['author_image'],
				'category_id' => $cat_id,
				'category_name' => $category->getCategoryById($cat_id, 1)['category_name'],
				'category_parent' => $category->getCategoryById($cat_id, 1)['category_parent'],
			];
			
			array_push($data, $items);
			
		}
		
		return a_p($data);
	}
}
