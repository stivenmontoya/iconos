<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iconos</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body {
			max-width: 1200px;
			margin: 20px auto;
		}
		.icons {
			display: grid;
			grid-template-columns: repeat(8, 1fr);
			grid-gap: 20px;
		}
		div.icon {
			border:  1px solid #eaeaea;
			text-align: center;
			font-family: sans-serif;
			font-size: 15px;
		}
		h2 {
			display: block;
			width: 100%;
			padding: 20px;
			color: #111;
			font-family: sans-serif;
			background-color: #eaeaea;
			margin-top: 20px;
			margin-bottom: 10px;
		}
		img {
			display: block;
			width: 50px;
			margin: 10px auto;
		}
		a {
			color: #fff;
			background-color: #111;
			display: inline-block;
			padding: 7px 15px;
			border-radius: 7px;
			text-decoration: none;
			font-family: sans-serif;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_GET['thefolder'])) {
			$thefolder = $_GET['thefolder'];
			echo '<a href="index.php">❮ Volver</a>';
			echo "<h2>".$thefolder."</h2>";
			echo "<div class='icons'>";
			if ($handler = opendir($thefolder)) {
			    while (false !== ($file = readdir($handler))) {
			    	if($file != '.' && $file != '..') {
				    	echo "<div class='icon'>";
				            echo '<img src="'.$thefolder.'/'.$file.'" />';
				            echo "<span>".$file."</span>";
				    	echo "</div>";
			    	}
			    }
			    closedir($handler);
			}
			echo "</div>";
		}else {
			$thefolder = "iconos/";
			$dirs = scandir($thefolder);
			foreach($dirs as $dir) {
				if($dir != '.' && $dir != '..') {
					echo "<h2>".$thefolder.' '.$dir."</h2>";
					echo '<a href="index.php?thefolder='.$thefolder.$dir.'">Abrir carpeta</a>';
				}	
			}
		}
	?>
</body>
</html>