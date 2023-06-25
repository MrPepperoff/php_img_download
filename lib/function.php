<?php 

	function loadFile($maxFilesize, $uploaddir, $number){

				$arrayFile = $_FILES['file'][$number];
				$type = false;
				switch ($arrayFile['type']) {
					case 'image/jpeg': $type = "jpeg"; break;
					case 'image/png': $type = "png"; break;
				}
				if($type == false){
					return [
						"status"=>"Error",
						"type_msg"=>"danger", 
						"msg"=>"Файл не определен"
					];
				}

				if($arrayFile['size'] > $maxFilesize){
					return [
						"status"=>"Error",
						"type_msg"=>"danger", 
						"msg"=>"Превышен размер файла <br><b> Макс.: ".number_format($maxFilesize / 1024, 2, '.', ' ')." Mb | Ваша: ".number_format($arrayFile['size'] / 1024, 2, '.', ' ')." Mb </b>",
					];
				}

				$uploadfile = $uploaddir . md5($arrayFile['tmp_name']).".".$type;
				if (move_uploaded_file($arrayFile['tmp_name'], $uploadfile)) {

					return [
						"status"=>"Ok",
						"type_msg"=>"success", 
						"msg"=>"Файл был успешно загружен"
					];
		
				}
				else{
					return [
						"type_msg"=>"danger", 
						"msg"=>"Неопределенная Ошибка"
					];
				}	
			}
		