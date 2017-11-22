<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Alterar curriculo</title>
    <?php include '../Template/Header.php';?>
</head>
<body>
    <div class="container" style="width: 100%; margin-top: 10%">
    	<form method="post" action="#">
    		<?php 
    			require_once '../Classes/Curriculo.php';
    			$c = new Curriculo();
    			$c = $c->buscar($_SESSION['id_curriculo'])
    		?>
    		<div style="width: 40%; float: left; margin-left: 8%">
	    		<label>Endereço</label><br>
	    		<textarea required placeholder="Digite seu endereço" name="endereco" class="form-control" maxlength="200"><?php echo $c->endereco;?></textarea><br><br>
	    		<label>Objetivo</label><br>
	    		<textarea required placeholder="Digite seu objetivo" name="objetivo" class="form-control" maxlength="200"><?php echo $c->objetivo;?></textarea><br>
    		</div>
    		<div style="width: 40%; float: right; margin-right: 8%">
	    		<label>Formação</label><br>
	    		<textarea required placeholder="Digite o nome da instituição e o nível do curso" 
				name="formacao" class="form-control" maxlength="200"><?php echo $c->formacao;?></textarea><br><br>
				<label>Habilidades</label><br>
				<textarea required placeholder="Digite suas habilidades" name="habilidades" class="form-control" maxlength="1000"><?php echo $c->habilidades;?></textarea><br><br>
    			<input class="btn btn-success" type="submit" value="Salvar alterações" name="alterar" style="float: right">
    		</div>
    		<?php 
    			if(isset($_POST['alterar'])){
    			    $c = new Curriculo();
    			    $c->setId($_SESSION['id_curriculo']);
    				$c->setEndereco($_POST['endereco']);
    				$c->setObjetivo($_POST['objetivo']);
    				$c->setFormacao($_POST['formacao']);
					$c->setHabilidades($_POST['habilidades']);
    				$c->alterar($c);
    				unset($_SESSION['id_curriculo']);
    				header('location: ../Usuario/Perfil.php');
    			}
    		?>
    	</form>
    </div>
</body>
</html>