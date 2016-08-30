<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		header {
			background: #e3e3e3;
			padding: 2em;
			text-align: center;
		}
	</style>
</head>
<body>
	<header>
		<h1>
			<?php 
				$name = $_GET['name'];

				echo "Hello, {$name}"; 

			?>
		</h1>
	</header>
</body>
</html>