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
    			$em = new Empresa();
    			$em = $em->buscarPorId($_SESSION['empresa'])
    		?>
    		<label>Nome</label>
    		<input required placeholder="Digite o nome da empresa" name="nome" class="form-control" value="<?php echo $em->nome;?>"></input><br>
    		<label>CNPJ</label><br>
    		<input required placeholder="Digite o CNPJ" name="cnpj" class="form-control" value="<?php echo $em->cnpj;?>"></input><br>
    		<label>Senha</label><br>
    		<input required placeholder="Digite a senha" name="senha" class="form-control" value="<?php echo $em->senha;?>"></input><br><br>
			<label>Email</label><br>
    		<input required placeholder="Digite o email" name="email" class="form-control" value="<?php echo $em->email;?>"></input><br><br>
    		<input class="btn btn-success" type="submit" value="Salvar alterações" name="alterar">
    		<?php 
    			if(isset($_POST['alterar'])){
    			    $e = new Empresa();
    			    if($e->buscar($_POST['cnpj']) == null || $_POST['cnpj'] == $em->cnpj){
	    			    $e->setId($_SESSION['empresa']);
	    				$e->setNome($_POST['nome']);
	    				$e->setCnpj($_POST['cnpj']);
	    				$e->setSenha($_POST['senha']);
						$e->setEmail($_POST['email']);
	    				$e->alterar($e);
	    				header('location: Perfil.php');
    				} else {
    					echo "<br><h5>CNPJ já existe no sistema!</h5><br><br><br><br><br>";
    				}
    			}
    		?>
    	</form>
    </div>
</body>
</html>