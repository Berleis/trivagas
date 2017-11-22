<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Alterar usuário</title>
    <?php include '../Template/Header.php';?>
</head>
<body>
    <div class="container" style="width: 30%; margin-top: 10%">
    	<form method="post" action="#">
    		<?php 
    			session_start();
    			require_once '../Classes/Usuario.php';
    			$u = new Usuario();
    			$u = $u->buscarPorId($_SESSION['id_usuario'])
    		?>
    		<label>Nome</label>
    		<input required placeholder="Digite o nome" name="nome" class="form-control" value="<?php echo $u->nome;?>"></input><br>
    		<label>CPF</label><br>
    		<input required placeholder="Digite o CPF" name="cpf" class="form-control" value="<?php echo $u->cpf;?>"></input><br>
    		<label>Senha</label><br>
    		<input required placeholder="Digite a senha" name="senha" class="form-control" value="<?php echo $u->senha;?>"></input><br><br>
    		<input class="btn btn-success" type="submit" value="Salvar alterações" name="alterar">
    		<?php 
    			if(isset($_POST['alterar'])){
    				$u = new Usuario();
    				$u->setId($_SESSION['id_usuario']);
    				$u->setNome($_POST['nome']);
    				$u->setCpf($_POST['cpf']);
    				$u->setSenha($_POST['senha']);
    				$u->alterar($u);
    				unset($_SESSION['id_usuario']);
    				header('location: Listar.php');
    			}
    		?>
    	</form>
    </div>
</body>
</html>