<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Lista de empresas</title>
	<?php include '../Template/Header.php';?>
	<?php include '../Template/Footer.php';?>
</head>
<body>
	<div class="container" style="width: 80%; margin-top: 8%">
    	<?php
    	
    		require_once '../Classes/Empresa.php';
    		$empresa = new Empresa();
    		$empresas = $empresa->listar();
    		if($empresas == null){
    			echo "<h2 style='margin-top: 16%; text-align: center' >Não há cadastros</h2>";
    		}else{?>
    		<table class="table table-bordered table-stripped table-hover">
    			<tr>
    				<th>Código</th>
    				<th>Nome</th>
    				<th>CNPJ</th>
    				<th>Senha</th>
					<th>E-mail</th>
    				<th>Alterar</th>
    				<th>Excluir</th>
    			</tr>
    			<?php 
    			
    				foreach ($empresas as $e){
    					echo '<tr>';
    					echo	'<td>'.$e->id.'</td>';
    					echo	'<td>'.$e->nome.'</td>';
    					echo	'<td>'.$e->cnpj.'</td>';
    					echo	'<td>'.$e->senha.'</td>';
						echo	'<td>'.$e->email.'</td>';
    					echo	'<td><a href="Listar.php?alterar&id='.$e->id.'">Alterar</a></td>';
    					echo	'<td><a href="Listar.php?excluir&id='.$e->id.'">Excluir</a></td>';
    					echo '</tr>';
    				}
    				if(isset($_GET['alterar'])){
    					session_start();
    					$_SESSION['id_empresa'] = $_GET['id'];
    					header('location: Alterar.php');
    				}
    				if(isset($_GET['excluir'])){
    					$empresa->excluir($_GET['id']);
    					exit(header('location: Listar.php'));
    				}
    			?>
    		</table>
    	<?php }?>
	</div>
</body>
</html>