<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Lista de usuários</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
	<div class="container" style="width: 80%; margin-top: 8%">
    	<?php
    		require_once '../Classes/Curriculo.php';
    		$curriculo = new Curriculo();
    		$curriculos = $curriculo->listar();
    		if($curriculos == null){
    			echo "<h2 style='margin-top: 16%; text-align: center' >Não há cadastros</h2>";
    		}else{?>
    		<table class="table table-bordered table-stripped table-hover">
    			<tr>
    				<th>Endereço</th>
    				<th>Objetivo</th>
    				<th>Formação</th>
    				<th>Habilidades</th>
    				<th>Alterar</th>
    				<th>Excluir</th>
    			</tr>
    			<?php 
    			
    				foreach ($curriculos as $c){
    					echo '<tr>';
    					echo	'<td>'.$c->endereco.'</td>';
    					echo	'<td>'.$c->objetivo.'</td>';
    					echo	'<td>'.$c->formacao.'</td>';
    					echo	'<td>'.$c->habilidades.'</td>';
    					echo	'<td><a href="Listar.php?alterar&id='.$c->id.'">Alterar</a></td>';
    					echo	'<td><a href="Listar.php?excluir&id='.$c->id.'">Excluir</a></td>';
    					echo '</tr>';
    				}
    				if(isset($_GET['alterar'])){
    					session_start();
    					$_SESSION['id_curriculo'] = $_GET['id'];
    					header('location: Alterar.php');
    				}
    				if(isset($_GET['excluir'])){
    					$curriculo->excluir($_GET['id']);
    					exit(header('location: Listar.php'));
    				}
    			?>
    		</table>
    	<?php }?>
	</div>
</body>
</html>