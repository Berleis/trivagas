<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Lista de vagas</title>
	<?php include '../Template/Header.php';?>
	<?php
	    if(isset($_SESSION['empresa'])) {
	       header('location: ../Vaga/ListarPorEmpresa.php');
	    }
        if(isset($_SESSION['usuario'])){
           require_once '../Classes/Curriculo.php';
           $c = new Curriculo();
           if($c->buscarPorCandidato($_SESSION['usuario']) == null) {
               header('location: ../Curriculo/Cadastrar.php');
           }
        }
	?>
</head>
<body>
	<form action="#" method="post">
		<div class="container" style="width: 80%; margin-top: 8%">
	    	<?php
	    		require_once '../Classes/Vaga.php';
	    		$vaga = new Vaga();
	    		$vagas = $vaga->listarPorUsuario($_SESSION['usuario']);
	    		if($vagas == null){
	    			echo "<h2 style='margin-top: 16%; text-align: center' >Não há vagas de seu interesse</h2>";
	    		}else{?>
	    		<table class="table table-bordered table-stripped table-hover">
	    			<tr>
	    				<th>Código</th>
	    				<th>Descrição</th>
	    				<th>Salário</th>
	    				<th>Empresa</th>
	    				<th>Detalhes</th>
	    			</tr>
	    			<?php 
	    			
	    				foreach ($vagas as $v){
	    					require_once '../Classes/Empresa.php';
	    					$e = new Empresa();
	    					$e = $e->buscarPorId($v->id_empresa);
	    					echo '<tr>';
	    					echo	'<td>'.$v->id.'</td>';
	    					echo	'<td>'.$v->descricao.'</td>';
	    					echo	'<td>'.$v->salario.'</td>';
	    					echo	'<td>'.$e->nome.'</td>';
	    					echo 	'<td><a data-toggle="modal" href="#modalVaga'.$v->id.'">Detalhes</a></td>';
	    					echo '</tr>';
	    				}
	    			?>
	    		</table>
	    	<?php }?>
	    	<?php if($vagas != null){ foreach($vagas as $v){?>
				<div id="modalVaga<?php echo $v->id?>" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Detalhes</h4>
							</div>
							<div class="modal-body">
								<?php
									echo '<br>Código: '.$v->id;
									echo '<br>Descrição: '.$v->descricao;
									echo '<br>Horário: '.$v->horario;
									echo '<br>Benefícios: '.$v->beneficios;
									echo '<br>Categoria: '.$v->categoria;
									echo '<br>Salário: '.$v->salario;
								?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
							</div>
						</div>
					</div>
				</div>
			<?php }}?>
		</div>
	</form>
</body>
</html>