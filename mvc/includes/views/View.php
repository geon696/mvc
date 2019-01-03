<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Home Page</title>
		<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo BASEDIR.'static/css/index.css'; ?>">
        <script src="https://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			crossorigin="anonymous">
	    </script>
		<script src="<?php echo BASEDIR.'static/js/custom.js'; ?>"></script>
	</head>
	<body>
		<header id="mainheader">
			<h1 class="headTitle"><?php echo PAGE; ?> - A random story</h1>
			<nav id="first-nav">
				<ul>
					<li><a href="/mvc/">Home</a></li>
                    <li><a href="/mvc/upload">Upload</a></li>
					<li><a href="/mvc/about-us">About</a></li>
					<li><a href="/mvc/more">More</a></li>
					<li><a href="/mvc/user">User</a></li>
				</ul>
			</nav>
		</header>
		<?php 
			require_once("$filetoload.php");
		?>
        <footer>
			<p style="margin:0;">Copyright &copy; 7/18/2014</p>
        </footer>
	</body>
</html>

