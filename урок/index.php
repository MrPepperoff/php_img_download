<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

	<?php 


		

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
		
	?>

	<div class="container">
		<div class="row">
			<div class="col">
				<?php 
					if(isset($_FILES['file'])){
						$result = loadFile(314325, 'images/');
						?>
						<div class="alert alert-<?php echo $result['type_msg'];?> alert-dismissible fade show" role="alert">
							<?php 
							  echo (isset($result['status']))?
							  			"<strong>".$result['status']."</strong>"
							  		:
							  			'';
						  	?>

						   <?php echo $result['msg'];?>


						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						
						<?php
					}
				?>


				

				<form action="index.php" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Логин</label>
						<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
					</div>
					<div class="mb-3">
						<label for="formFile" class="form-label">Выберите аватар</label>
						<input class="form-control" type="file" id="formFile" name="file">
					</div>
					<button type="submit" class="btn btn-primary">Войти</button>
				</form>
			</div>
		</div>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>