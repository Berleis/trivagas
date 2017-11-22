<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Cadastro de curriculo</title>
	<?php include '../Template/Header.php';?>
	<?php 
        if(!isset($_SESSION['usuario'])) {
            header('location: ../Index.php');
        }
	?>
	<?php 
	    require_once '../Classes/Curriculo.php';
	    $c = new Curriculo();
	    if($c->buscarPorCandidato($_SESSION['usuario']) != null) {
	        header('location: ../Usuario/Perfil.php');
	    }
	?>
</head>
<body>
	<div class="container" style="width: 100%; margin-top: 10%">
    	<form method="post" action="#">
    		<div style="width: 40%; float: left; margin-left: 8%">
	    		<label>Endereço</label><br>
	    		<textarea required placeholder="Digite seu endereço" name="endereco" class="form-control" maxlength="200"></textarea><br><br>
	    		<label>Objetivo</label><br>
	    		<textarea required placeholder="Digite seu objetivo" name="objetivo" class="form-control" maxlength="200"></textarea><br>
    		</div>
    		<div style="width: 40%; float: right; margin-right: 8%">
	    		<label>Formação</label><br>
	    		<textarea required placeholder="Digite o nome da instituição e o nível do curso" 
				name="formacao" class="form-control" maxlength="200"></textarea><br><br>
				<label>Habilidades</label><br>
				<textarea required placeholder="Digite suas habilidades" name="habilidades" class="form-control" maxlength="1000"></textarea><br><br>
	    		<input class="btn btn-success" type="submit" value="Cadastrar" name="cadastrar" style="float: right">
	    		<input class="btn btn-primary" type="reset" value="Cancelar" style="float: right">
    		</div>
    	</form>
    	<?php 
    		if(isset($_POST['cadastrar'])){
    			require_once '../Classes/Curriculo.php';
    			$curriculo = new Curriculo();
    			$curriculo->setId_candidato($_SESSION['usuario']);
    			$curriculo->setEndereco($_POST['endereco']);
    			$curriculo->setObjetivo($_POST['objetivo']);
    			$curriculo->setFormacao($_POST['formacao']);
				$curriculo->setHabilidades($_POST['habilidades']);
				$curriculo->incluir($curriculo);
				header("location: ../Usuario/Perfil.php");
    		}
    	?>
	</div>
</body>
</html>