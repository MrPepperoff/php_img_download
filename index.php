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

	<form action="index.php" method="POST" enctype="multipart/form-data">
	<div class="container text-center">
		<div class="row">
			<div class="col">
				<h1>Загрузка картинок</h1>
				
					<?php 
					if (isset($_FILES['file'])) {
						$files = [];

						foreach($_FILES['file'] as $key => $link) {
							foreach($link as $item => $value) {
								$files[$item][$key] = $value;
							}
						}		
						$_FILES['file'] = $files;	
					}
					?>

					<div class="mb-3">
						<?php
							(isset($_FILES['file']))?  $result1 = loadFile(30000, 'images/', 0) :'';
						?>
						<div class="alert alert-<?php echo (isset($_FILES['file']))? $result1['type_msg'] :''; ?> alert-dismissible fade show" role="alert">
							<input class="form-control" type="file" id="formFile" name="file[]">
							<p><?php echo (isset($_FILES['file']))? $result1['msg'] :''; ?></p>
						</div>
					</div>

					<div class="mb-3">
						<?php
						
							(isset($_FILES['file']))?  $result2 = loadFile(30000, 'images/', 1) :'';
							
						?>
						<div class="alert alert-<?php echo (isset($_FILES['file']))? $result2['type_msg'] :''; ?> alert-dismissible fade show" role="alert">
							<input class="form-control" type="file" id="formFile" name="file[]">
							<p><?php echo (isset($_FILES['file']))? $result2['msg'] :''; ?></p>
						</div>
					</div>
					<div class="mb-3">
						<?php
							(isset($_FILES['file']))?  $result3 = loadFile(30000, 'images/', 2) :'';
						?>
						<div class="alert alert-<?php echo (isset($_FILES['file']))? $result3['type_msg'] :''; ?> alert-dismissible fade show" role="alert">
							<input class="form-control" type="file" id="formFile" name="file[]">
							<p><?php echo (isset($_FILES['file']))? $result3['msg'] :''; ?></p>
						</div>
					</div>
					</div>
					<button type="submit" class="btn btn-primary">Сохранить</button>
				</form>
	
			</div>
			
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>