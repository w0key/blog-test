<?php
if(!defined('BLOG')) die('ACCESS DENIED');

$data = json_decode(file_get_contents("php://input"));

if(empty($part[1]))
	a_e('Укажите метод!');

switch(@$part[1]){
	default:	
		$author->getAuthorById($part[1]);
		break;
	
	case 'get':
		if($part[2] == 'all') {
			$author->getAuthors();
		} else {
			$author->getAuthorById($part[2], 0);
		}
		break;
		
	case 'add':
		if (
			empty($_POST['name'])
		) {
			a_e('Ошибка! Не указаны данные для создания автора!');
		} else {
			if(isset($_FILES['file']['name'])){

			   $filename = $_FILES['file']['name'];

			   $location = "upload/".$filename;
			   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
			   $imageFileType = strtolower($imageFileType);

			   $valid_extensions = array("jpg");

			   if(in_array(strtolower($imageFileType), $valid_extensions)) {
				  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
					 $author->addAuthor($_POST['name'], $filename);
				  }
			   }
			}
		}
		break;
}