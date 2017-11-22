<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Minhas vagas</title>
	<?php include '../Template/Header.php';?>
	<?php 
	    if(!isset($_SESSION['empresa']) && !isset($_SESSION['usuario'])){
	    	header('location: ../Index.php');   
	    }else if (!isset($_SESSION['empresa']) && isset($_SESSION['usuario'])){
	    	header('location: '.$_SERVER['DOCUMENT_ROOT'].'/trivagas/Vaga/Listar.php'); 
	    }
	?>
</head>
<body>
	<div class="container" style="width: 80%; margin-top: 8%">
    	<?php
    		require_once '../Classes/Vaga.php';
    		$vaga = new Vaga();
    		$vagas = $vaga->listarPorEmpresa($_SESSION['empresa']);
    		if($vagas == null){
    			echo "<h2 style='margin-top: 16%; text-align: center' >Não há vagas cadastradas</h2>";
    		}else{?>
    		<table class="table table-bordered table-stripped table-hover">
    			<tr>
    				<th>Id</th>
    				<th>Descrição</th>
    				<th>Horário</th>
    				<th>Salário</th>
					<th>Beneficios</th>
    				<th>Categoria</th>
    				<th>Alterar</th>
    				<th>Excluir</th>
    			</tr>
    			<?php 
    			
    				foreach ($vagas as $v){
    					echo '<tr>';
    					echo	'<td>'.$v->id.'</td>';
    					echo	'<td>'.$v->descricao.'</td>';
    					echo	'<td>'.$v->horario.'</td>';
    					echo	'<td>'.$v->salario.'</td>';
						echo	'<td>'.$v->beneficios.'</td>';
    					echo	'<td>'.$v->categoria.'</td>';
    					echo	'<td><a href="Listar.php?alterar&id='.$v->id.'">Alterar</a></td>';
    					echo	'<td><a href="Listar.php?excluir&id='.$v->id.'">Excluir</a></td>';
    					echo '</tr>';
    				}
    				if(isset($_GET['alterar'])){
    					session_start();
    					$_SESSION['id_vaga'] = $_GET['id'];
    					header('location: Alterar.php');
    				}
    				if(isset($_GET['excluir'])){
    					$vaga->excluir($_GET['id']);
    					exit(header('location: Listar.php'));
    				}
    			?>
    		</table>
    	<?php }?>
	</div>
</body>
</html>