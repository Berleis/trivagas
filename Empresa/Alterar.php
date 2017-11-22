<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Alterar empresa</title>
    <?php include '../Template/Header.php';?>
</head>
<body>
    <div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
    		<?php 
    			require_once '../Classes/Empresa.php';
    			$e = new Empresa();
    			$e = $e->buscarPorId($_SESSION['id_empresa'])
    		?>
    		<label>Nome</label>
    		<input required placeholder="Digite o nome da empresa" name="nome" class="form-control" value="<?php echo $e->nome;?>"></input><br>
    		<label>CNPJ</label><br>
    		<input required placeholder="Digite o CNPJ" name="cnpj" class="form-control" value="<?php echo $e->cnpj;?>"></input><br>
    		<label>Senha</label><br>
    		<input required placeholder="Digite a senha" name="senha" class="form-control" value="<?php echo $e->senha;?>"></input><br><br>
			<label>Email</label><br>
    		<input required placeholder="Digite o email" name="email" class="form-control" value="<?php echo $e->email;?>"></input><br><br>
    		<input class="btn btn-success" type="submit" value="Salvar alterações" name="alterar">
    		<?php 
    			if(isset($_POST['alterar'])){
    			    $e = new Empresa();
    			    $e->setId($_SESSION['id_empresa']);
    				$e->setNome($_POST['nome']);
    				$e->setCnpj($_POST['cnpj']);
    				$e->setSenha($_POST['senha']);
					$e->setEmail($_POST['email']);
    				$e->alterar($e);
    				unset($_SESSION['id_empresa']);
    				header('location: Perfil.php');
    			}
    		?>
    	</form>
    </div>
</body>
</html>