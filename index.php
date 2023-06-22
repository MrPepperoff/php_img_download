<?php
	require 'lib/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
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
	<div class="container text-center">
		<div class="row">
			<div class="col">
				<h1>Загрузка картинок</h1>
				<form class="wrap_file" action="obr.php" method="POST">
					<div class="mb-3">
						<input class="form-control" type="file" id="formFile" name="file">
					</div>
					<?php 
					if(isset($_FILES['file'])){
						$result = loadFile(314325, 'images/');
					?>
						<div class="alert alert-<?php echo $result['type_msg'];?> alert-dismissible fade show" role="alert">
								
						<?php echo (isset($result['status']))? "<strong>".$result['status']."</strong>":''; ?>

						<?php echo $result['msg'];?>


							  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							
							<?php
						}
					?>
					<button type="submit" class="btn btn-primary">Войти</button>
				</form>

						


				

				<form action="obr.php" method="POST" enctype="multipart/form-data">
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