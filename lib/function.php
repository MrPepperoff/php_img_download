<?php
function status_request($str_code){
		if($str_code == 100 || $str_code == 101){
			
			return "error";
		}
		if($str_code == 201){
			
			return"success";
		}
		return '';
	}
// function loadFile($maxSize, $upload){
// 	if(!isset($upload)){
// 		header("location: index.php?status=error");
// 	}
// 	$type = false;
// 	return $_FILES['file'];
// }

// 

	function loadFile($maxFilesize, $uploaddir){
			$type = false;
			switch ($_FILES['file']['type']) {
				case 'image/jpeg': $type = "jpeg"; break;
				case 'image/png': $type = "png"; break;
			}

			if($type == false){
				return [
					"status"=>"Error",
					"type_msg"=>"danger", 
					"msg"=>"Файл не поддерживается"
				];
			}

			if($_FILES['file']['size'] > $maxFilesize){
				return [
					"status"=>"Error",
					"type_msg"=>"danger", 
					"msg"=>"Превышен размер файла"
				];
			}

			$uploadfile = $uploaddir . md5($_FILES['file']['tmp_name']).".".$type;
			if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {

				return [
					"status"=>"Ok",
					"type_msg"=>"success", 
					"msg"=>"Файл был успешно загружен"
				];
	
			}
			else{
				return [
					"type_msg"=>"danger", 
					"msg"=>"Ошибка"
				];
			}
		}