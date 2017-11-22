<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Perfil do usuário</title>
	<?php include '../Template/Header.php';?>
	<?php 
	   require_once '../Classes/Curriculo.php';
	   $c = new Curriculo();
	   if($c->buscarPorCandidato($_SESSION['usuario']) == null) {
	       header('location: ../Curriculo/Cadastrar.php');
	   }
	   if (!isset($_SESSION['usuario'])) {
	       header('location: ../Index.php');
	   } 
	?>
</head>
<body>
    <form method="post" action="#">
    	<div class="container" style=" width: 100%">
    		<input style="margin-right: 45px; margin-top: 100px; float: right" class="btn btn-danger" type="submit" name="logout" value="Logout">
        </div><br><br>
        <div class="container" style=" width: 100%">
        	<div class="panel panel-primary"
				style="width: 70%; margin-left: 15%">
				<div class="panel-heading">
					<h3 class="panel-title">Currículo</h3>
				</div>
				<div class="panel-body">
					<div class="container" style="width: 80%">
						<?php 
							$c = new Curriculo();
							$c = $c->buscarPorCandidato($_SESSION['usuario']); 
						?>
						<p>
							<label>Endereço: </label>
							<?php echo nl2br($c->endereco)?>
						</p>
						<p>
							<label>Objetivo: </label>
							<?php echo nl2br($c->objetivo)?>
						</p>
						<p>
							<label>Formação: </label>
							<?php echo nl2br($c->formacao)?>
						</p>
						<p>
							<label>Habilidades: </label>
							<?php echo nl2br($c->habilidades)?>
						</p>
					</div>
					<button type="button" style="float: right" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir cadastro</button>
					<input style="float: right" class="btn btn-info" type="submit" name="alterar" value="Editar currículo">
				</div>
			</div>
		</div><br><br><br>
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
          $_SESSION['id_curriculo'] = $c->id;
          header('location: ../Curriculo/Alterar.php');
      }
      if(isset($_POST['excluir'])){
      	require_once '../Classes/Usuario.php';
      	$usuario = new Usuario();
      	$usuario->excluir($_SESSION['usuario']);
      	$c = new Curriculo();
      	$c->excluir($_SESSION['usuario']);
      	session_destroy();
      	exit(header('location: ../Index.php'));
      }
    ?>
</body>
</html>