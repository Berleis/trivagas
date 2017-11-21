<?php
class Usuario{
	
	private $id;
	private $nome;
	private $cpf;
	private $senha;
	
	//Getters
	public function getId() {
		return $this->id;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getCpf() {
		return $this->cpf;
	}
	public function getSenha() {
		return $this->senha;
	}
	
	//Setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function setCpf($cpf) {
		$this->cpf = $cpf;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	
	//Métodos
	
	public function incluir(Usuario $usuario){
		try{
			$link=mysqli_connect("localhost", "root", "", "trivagas");
			$query="INSERT INTO usuarios (`id`, `nome`, `cpf`, `senha`)
			VALUES (NULL, '$usuario->nome', '$usuario->cpf', '$usuario->senha')";
			mysqli_query($link, $query);
		}catch(Exception $u){
			echo $u;
		}
	}
	
	public function buscar($cpf){
		try {
			$link=mysqli_connect("localhost", "root", "", "trivagas");
			$query="SELECT * FROM usuarios WHERE cpf = '$cpf'";
			$result=mysqli_query($link, $query);
			$obj=mysqli_fetch_object($result);
			return $obj;
		} catch (Exception $e) {
			echo $e;
		}
	}
	
	public function buscarPorId($id){
		try {
			$link=mysqli_connect("localhost", "root", "", "trivagas");
			$query="SELECT * FROM usuarios WHERE id = '$id'";
			$result=mysqli_query($link, $query);
			$obj=mysqli_fetch_object($result);
			return $obj;
		} catch (Exception $e) {
			echo $e;
		}
	}
	
	public function listar(){
		try{
			$link=mysqli_connect("localhost", "root", "", "trivagas");
			$query = $link->query("SELECT * FROM usuarios");
			while($result = $query->fetch_object()){
				$obj[] = $result;
			}
			if(empty($obj)){
				return null;
			}
			return $obj;
		} catch (Exception $e) {
			echo $e;
		}
	}
	
	public function alterar(Usuario $usuario){
		try{
			$link=mysqli_connect("localhost", "root", "", "trivagas");
			$query="UPDATE usuarios SET nome = '$usuario->nome', cpf = '$usuario->cpf',
			senha = '$usuario->senha'
			WHERE id = '$usuario->id'";
			mysqli_query($link, $query);
		}catch (Exception $e){
			echo $e;
		}
	}
	
	public function excluir($id){
		try {
			$link=mysqli_connect("localhost", "root", "", "trivagas");
			$query="DELETE FROM usuarios WHERE id = '$id'";
			mysqli_query($link, $query);
		} catch (Exception $e) {
			echo $e;
		}
	}
	
	public function buscarPorLogin($cpf, $senha){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
            $result=mysqli_query($link, $query);
            $obj=mysqli_fetch_object($result);
            return $obj;
        } catch (Exception $e) {
            echo $e;
        }
	
}
}
?>