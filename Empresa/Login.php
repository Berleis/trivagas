<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Login da Empresa</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
	<div class="container" style="width: 30%; margin-top: 14%">
		<form method="post" action="#">
    		<label>Cnpj</label><br>
    		<input required placeholder="Cnpj" name="cnpj" class="form-control"><br>
    		<label>Senha</label><br>
    		<input required placeholder="Senha" name="senha" class="form-control" type="password"></input><br><br>
    		<input class="btn btn-primary" type="reset" value="Cancelar">
    		<input class="btn btn-success" type="submit" value="Logar" name="logar">
    	</form>
    	<?php 
    	 session_start();
         require_once '../Classes/Empresa.php';    
    		if (isset($_POST['logar'])) {
    		    $e = new Empresa();
    		    $e = $e->buscarPorLogin($_POST['cnpj'], $_POST['senha']);
    		    if ($e != null) {
                    session_start();
                    $_SESSION['empresa'] = $_POST['cnpj'];
                    header('location: Logado.php');
                }else{
                    echo '<br><h5>Usuário ou senha inválidos</h5>';
                }
            }
    	?>
	</div>
</body>
</html>