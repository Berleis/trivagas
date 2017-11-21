<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Administrador empresarial</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
	<?php
        session_start();
        if (!isset($_SESSION['empresa'])) {
            header('location: ../Index.php');
        }
    ?>
</head>
<body>
	<form method="post" action="#">
		<input style="margin-right: 60px;margin-top: 20px; float: right" class="btn btn-danger" type="submit" name="logout" value="Logout">
        <div class="container" style=" width: 80%">
        	
        </div>
	</form>
	<?php 
	  if(isset($_POST['logout'])){
	      session_destroy();
	      header('location: ../Index.php');
	  }
	?>
</body>
</html>