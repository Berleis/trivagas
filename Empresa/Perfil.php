<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Administrador empresarial</title>
	<?php include '../Template/Header.php';?>
	<?php
        session_start();
        if (!isset($_SESSION['empresa'])) {
            header('location: ../Index.php');
        }
    ?>
</head>
<body>
	<form method="post" action="#">
		<input style="margin-right: 60px; margin-top: 50px; float: right" class="btn btn-danger" type="submit" name="logout" value="Logout">
        <br><br><br><br><br><br>
        <div class="container" style=" width: 70%">
        	<div class="panel panel-primary">
			  <div class="panel-heading">
			    <h3 class="panel-title">Dados da empresa</h3>
			  </div>
			  <div class="panel-body">
			  	<?php 
			  		require_once '../Classes/Empresa.php';
			  		$e = new Empresa();
			  		$e = $e->buscar($_SESSION['empresa']);
			  	?>
		  		<div class="container" style="width: 80%; margin-right: 10%;">
					<p>
						<label>Nome: </label>
						<?php echo $e->nome?>
					</p>
					<p>
						<label>CNPJ: </label>
						<?php echo $e->cnpj?>
					</p>
					<p>
						<label>Email: </label>
						<?php echo $e->email?>
					</p>
					<p>
						<label>Senha: </label>
						<?php echo $e->senha?>
					</p>
				</div>
				<button type="button" style="float: right" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir cadastro</button>
				<input style="float: right" class="btn btn-info" type="submit" name="alterar" value="Editar dados">
			  </div>
			</div>
        </div>
        <div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		      </div>
		      <div class="modal-body">
		        <h4>Deseja realmente excluir seu cadastro?</h4>
		      </div>
		      <div class="modal-footer">
		       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		       <input style="float: right" class="btn btn-danger" type="submit" name="excluir" value="Excluir">
		      </div>
		    </div>
		  </div>
		</div>
	</form>
	<?php 
	  if(isset($_POST['logout'])){
	      session_destroy();
	      header('location: ../Index.php');
	  }
	  if(isset($_POST['alterar'])){
	  	session_start();
	  	$_SESSION['id_empresa'] = $e->id;
	  	header('location: Alterar.php');
	  }
	  if(isset($_POST['excluir'])){
	  	$e = new Empresa();
	  	$e->excluir($_SESSION['empresa']);
	  	require_once '../Classes/Vaga.php';
	  	$v = new Vaga();
	  	$v->excluirPorEmpresa($_SESSION['empresa']);
	  	session_destroy();
	  	exit(header('location: ../Index.php'));
	  }
	?>
</body>
</html>