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
			//situação de sessão, não sei se modifico, e acredito que caso necessite de modificação, seja para ser acessivel para as empresas
    		require_once '../Classes/Usuario.php';
    		$usuario = new Usuario();
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
    					echo	'<td>'.$u->endereco.'</td>';
    					echo	'<td>'.$u->objetivo.'</td>';
    					echo	'<td>'.$u->formacao.'</td>';
    					echo	'<td>'.$u->habilidades.'</td>';
    					echo	'<td><a href="Listar.php?alterar&id='.$u->id.'">Alterar</a></td>';//listar.php ou listarcurriculos.php?
    					echo	'<td><a href="Listar.php?excluir&id='.$u->id.'">Excluir</a></td>';//listar.php ou listarcurriculos.php?
    					echo '</tr>';
    				}
    				if(isset($_GET['alterar'])){
    					session_start();
    					$_SESSION['idcandidato'] = $_GET['id']; //modifiquei o id_usuario para idcandidato
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