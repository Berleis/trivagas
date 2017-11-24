<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Lista de usuários</title>
	<?php include '../Template/Header.php';?>
	<?php 
        if(!isset($_SESSION['empresa'])){
	       header('location: ../Index.php');
	    }
	    if(!isset($_SESSION['id_vaga'])){
	       header('location: ../Vaga/ListarPorEmpresa.php');
	    }
	?>
</head>
<body>
	<div class="container" style="width: 80%; margin-top: 8%">
    	<?php
    	    require_once '../Classes/Vaga.php';
    	    $v = new Vaga();
    	    $v = $v->buscarPorId($_SESSION['id_vaga']);
    	    echo "<h5 style='margin-top: 2%; text-align: center' >Vaga: ".$v->descricao."</h5>";
    		require_once '../Classes/Usuario.php';
    		$usuario = new Usuario();
    		$usuarios = $usuario->listarPorVaga($_SESSION['id_vaga']);
    		if($usuarios == null){
    			echo "<h2 style='margin-top: 12%; text-align: center' >Não há usuários interessados nessa vaga</h2>";
    		}else{?>
    		<table class="table table-bordered table-stripped table-hover">
    			<tr>
    				<th>Código</th>
    				<th>Nome</th>
    				<th>Currículo</th>
    			</tr>
    			<?php 
    			
    				foreach ($usuarios as $u){
    					echo '<tr>';
    					echo	'<td>'.$u->id.'</td>';
    					echo	'<td>'.$u->nome.'</td>';
    					echo	'<td><a data-toggle="modal" href="#modalCurriculo">Ver currículo</a></td>';
    					echo	'<td><a href="ListarPorVaga.php?ec&id='.$u->id.'" class="btn btn-success">OK!</a></td>';
    					echo '</tr>';
    				}
    				if(isset($_GET['ec'])){
    				    $usuario->excluirCandidatura($_GET['id'], $_SESSION['id_vaga']);
    				    header('location: ListarPorVaga.php');
    				}
    			?>
    		</table>
    	<?php }?>
	</div>
	<div id="modalCurriculo" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Currículo</h4>
				</div>
				<div class="modal-body">
					<?php
					   require_once '../Classes/Curriculo.php';
					   $curriculo = new Curriculo();
					   $curriculo = $curriculo->buscarPorCandidato($u->id);
					   echo '<br>Endereço: '.$curriculo->endereco;
					   echo '<br>Objetivo: '.$curriculo->objetivo;
					   echo '<br>Formação: '.$curriculo->formacao;
					   echo '<br>Habilidades: '.$curriculo->habilidades;
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
