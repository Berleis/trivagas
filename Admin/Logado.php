<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Administrador logado</title>
	<?php include '../Template/Header.php';?>
</head>
<body>
	<?php
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('location: ../Index.php');
        } else {
    ?>
    	<form method="post" action="#">
    		<h2 style='margin-top: 16%; text-align: center'>Logado com sucesso<br><br>
    			<input class="btn btn-danger" type="submit" name="logout" value="Logout">
    		</h2>
    	</form>
		<?php 
		  if(isset($_POST['logout'])){
		      session_destroy();
		      header('location: ../Index.php');
		  }
		?>
	<?php }?>
</body>
</html>