 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 	<title>Login do usuário</title>
 	<?php include '../Template/Header.php';?>
 	<?php include '../Template/Footer.php';?>
 </head>
 <body>
 	<div class="container" style="width: 30%; margin-top: 14%">
 		<form method="post" action="#">
     		<label>Cpf</label><br>
     		<input required placeholder="Cpf" name="cpf" class="form-control"><br>
     		<label>Senha</label><br>
     		<input required placeholder="Senha" name="senha" class="form-control" type="password"></input><br><br>
     		<input class="btn btn-primary" type="reset" value="Cancelar">
     		<input class="btn btn-success" type="submit" value="Logar" name="logar">
     	</form>
     	<?php 
          require_once '../Classes/Usuario.php';    
     		if (isset($_POST['logar'])) {
     		    $u = new Usuario();
     		    $u = $u->buscarPorLogin($_POST['cpf'], $_POST['senha']);
     		    if ($u != null) {
                     $_SESSION['usuario'] = $_POST['cpf'];
                     header('location: ../Curriculo/Cadastrar.php');
                 }else{
                     echo '<br><h5>Usuário ou senha inválidos</h5>';
                 }
             }
     	?>
 	</div>
 </body>
 </html> 