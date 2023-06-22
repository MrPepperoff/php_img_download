<?php

if(strlen(1 == 1)){
	echo $_FILES['file'];
	header("location: index.php?status=0&file=".$_POST['file']);
}
else{
	header("location: index.php?status=1");
}