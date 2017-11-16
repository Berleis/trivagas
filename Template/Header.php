<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="https://bootswatch.com/3/paper/bootstrap.css" />
	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
  		$(function(){
  			$(".dropdown-toggle").dropdown();
  		});
	</script>
</head>
<body>
	<nav class="navbar navbar-nav navbar-inverse" style="width: 100%; position: absolute; top: 0">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?php $_SERVER['DOCUMENT_ROOT']?>/trivagas/Index.php">Trivagas</a>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuários
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/trivagas/Usuario/Cadastrar.php">Cadastrar</a></li>
							<li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/trivagas/Usuario/Listar.php">Listar</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Empresas
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/trivagas/Empresa/Cadastrar.php">Cadastrar</a></li>
							<li><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/trivagas/Empresa/Listar.php">Listar</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="https://www.google.com.br" target="_blank" style="margin-right: 20px">Precisa de ajuda?</a></li>
				</ul>
			</div>
		</div>
	</nav>
</body>
</html>