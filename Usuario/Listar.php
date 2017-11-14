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
    	
    		require_once '../Classes/Usuario.php';
    		$usuario = new Usuario();
    		$usuarios = $usuario->listar();
    		if($usuarios == null){
    			echo "<h2 style='margin-top: 16%; text-align: center' >Não há cadastros</h2>";
    		}else{?>
    		<table class="table table-bordered table-stripped table-hover">
    			<tr>
    				<th>Código</th>
    				<th>Nome</th>
    				<th>CPF</th>
    				<th>Senha</th>
    				<th>Alterar</th>
    				<th>Excluir</th>
    			</tr>
    			<?php 
    			
    				foreach ($usuarios as $u){
    					echo '<tr>';
    					echo	'<td>'.$u->id.'</td>';
    					echo	'<td>'.$u->nome.'</td>';
    					echo	'<td>'.$u->cpf.'</td>';
    					echo	'<td>'.$u->senha.'</td>';
    					echo	'<td><a href="Listar.php?alterar&id='.$u->id.'">Alterar</a></td>';
    					echo	'<td><a href="Listar.php?excluir&id='.$u->id.'">Excluir</a></td>';
    					echo '</tr>';
    				}
    				if(isset($_GET['alterar'])){
    					session_start();
    					$_SESSION['id_usuario'] = $_GET['id'];
    					header('location: Alterar.php');
    				}
    				if(isset($_GET['excluir'])){
    					$usuario->excluir($_GET['id']);
    					exit(header('location: Listar.php'));
    				}
    			?>
    		</table>
    	<?php }?>
	</div>
</body>
</html>
