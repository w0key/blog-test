<?php
if(!defined('BLOG')) die('ACCESS DENIED');

$data = json_decode(file_get_contents("php://input"));

switch(@$part[1]){
	default:	
		a_e('Укажите метод!');
		break;

	
	case 'get':
		if($part[2] == 'all') {
			$news->getAllNews();
		} else {
			$news->getNewsById($part[2]);
		}
		break;
		
	case 'add':
		// if (
			// empty($_POST['title']) &&
			// empty($_POST['text']) &&
			// empty($_POST['author_id']) &&
			// empty($_POST['category_id'])
		// ) {
			// a_e('Ошибка! Не указаны данные для создания публикации!');
		// } else {
			if(isset($_FILES['file']['name'])){

			   $filename = $_FILES['file']['name'];

			   $location = "upload/".$filename;
			   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
			   $imageFileType = strtolower($imageFileType);

			   $valid_extensions = array("jpg");

			   if(in_array(strtolower($imageFileType), $valid_extensions)) {
				  if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
					 $news->addNews($_POST['title'], $_POST['text'], $_POST['author'], $_POST['category'], $filename);
				  }
			   }
			// }
			
		}
		break;
		
	case 'search':
		$rows = $news->searchNews($part[2]);
		break;
}


			
// print_r($part);