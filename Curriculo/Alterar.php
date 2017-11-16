<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Alterar curriculo</title>
    <?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
    <div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
    		<?php 
			//aqui por ser sessão eu nao sei se altero ou não
    			session_start();
    			require_once '../Classes/Usuario.php';
    			$u = new Usuario();
    			$u = $u->buscarPorId($_SESSION['id_usuario'])
    		?>
    		<label>Endereco</label>
    		<input required placeholder="Digite o endereco" name="endereco" class="form-control" value="<?php echo $c->endereco;?>"></input><br>
    		<label>Objetivo</label><br>
    		<input required placeholder="Digite Objetivo" name="objetivo" class="form-control" value="<?php echo $c->objetivo;?>"></input><br>
    		<label>Formação</label><br>
    		<input required placeholder="Digite o nome da instituição e o nível da formação" name="formacao"
			class="form-control" value="<?php echo $c->formacao;?>"></input><br><br>
			<label>Habilidades</label><br/>
			<input required placeholder="Digite suas habilidades" name="habilidades" class="form-control" value="<?php echo $c->habilidades;?>"></input><br>
    		<input class="btn btn-success" type="submit" value="Salvar alterações" name="alterar">
    		<?php 
    			if(isset($_POST['alterar'])){
    				$c = new Curriculo();
    				$c->setId($_SESSION['idcandidato']);
    				$c->setEndereco($_POST['endereco']);
    				$c->setObjetivo($_POST['objetivo']);
    				$c->setFormacao($_POST['formacao']);
					$c->setHabilidades($_POST['habilidades']);
    				$c->alterar($c);
					//mesma situação da linha 13
    				unset($_SESSION['id_usuario']);
    				header('location: Listar.php');
    			}
    		?>
    	</form>
    </div>
</body>
</html>