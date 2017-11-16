<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Alterar vaga</title>
    <?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
    <div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
			<!-- Substituir v por e -->
    		<?php 
    			session_start();
    			require_once '../Classes/Vaga.php';
    			$v = new Vaga();
    			$v = $v->buscarPorId($_SESSION['id_vaga'])
    		?>
    		<label>Descrição da vaga</label>
    		<input required placeholder="Digite a descrição da vaga" name="descricao" class="form-control" value="<?php echo $v->descricao;?>"></input><br>
    		<label>Horario</label><br>
    		<input required placeholder="Digite o horario" name="horario" class="form-control" value="<?php echo $v->horario;?>"></input><br>
    		<label>Salario</label><br>
    		<input required placeholder="Digite o salário" name="salario" class="form-control" value="<?php echo $v->salario;?>"></input><br><br>
			<label>Benefícios</label><br>
    		<input required placeholder="Digite os beneficios desta vaga" name="beneficios" class="form-control" value="<?php echo $v->beneficios;?>"></input><br><br>
			<label>Categoria</label><br>
    		<input required placeholder="Digite a categoria" name="categoria" class="form-control" value="<?php echo $v->categoria;?>"></input><br><br>
    		<input class="btn btn-success" type="submit" value="Salvar alterações" name="alterar">
    		<?php 
    			if(isset($_POST['alterar'])){
    			    $v = new Vaga();
    			    $v->setId($_SESSION['id_vaga']);
    				$v->setDescricao($_POST['descricao']);
    				$v->setHorario($_POST['horario']);
    				$v->setSalario($_POST['salario']);
    				$v->setBeneficios($_POST['beneficios']);
    				$v->setCategoria($_POST['categoria']);					
    				$v->alterar($v);
    				unset($_SESSION['id_vaga']);
    				header('location: Listar.php');
    			}
    		?>
    	</form>
    </div>
</body>
</html>