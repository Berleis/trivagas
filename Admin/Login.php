<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Login do administrador</title>
	<?php include '../Template/Header.php';?>
</head>
<body>
	<div class="container" style="width: 30%; margin-top: 14%">
		<form method="post" action="#">
    		<label>Usuário</label><br>
    		<input required placeholder="Usuário" name="user" class="form-control"><br>
    		<label>Senha</label><br>
    		<input required placeholder="Senha" name="pass" class="form-control" type="password"></input><br><br>
    		<input class="btn btn-primary" type="reset" value="Cancelar">
    		<input class="btn btn-success" type="submit" value="Logar" name="logar">
    	</form>
    	<?php 
    		if (isset($_POST['logar'])) {
                if ($_POST['user'] == "admin" && $_POST['pass'] == "admin") {
                    session_start();
                    $_SESSION['admin'] = "admin";
                    header('location: Logado.php');
                }else{
                    echo '<br><h5>Usuário ou senha inválidos</h5>';
                }
            }
    	?>
	</div>
</body>
</html>