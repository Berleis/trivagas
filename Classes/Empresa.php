<?php

class Empresa{
    
    private $id;
    private $nome;
    private $cnpj;
    private $senha;
    private $email;
    
    //Getters
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getCnpj() {
        return $this->cnpj;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function getEmail() {
        return $this->email;
    }
    
    //Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    
    //Métodos
    
    public function incluir(Empresa $empresa){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="INSERT INTO empresas (`id`, `nome`, `cnpj`, `senha`, `email`)
			VALUES (NULL, '$empresa->nome', '$empresa->cnpj', '$empresa->senha', '$empresa->email')";
            mysqli_query($link, $query);
        }catch(Exception $e){
            echo $e;
        }
    }
    
    public function buscar($cnpj){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM empresas WHERE cnpj = '$cnpj'";
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
            $query="SELECT * FROM empresas WHERE id = '$id'";
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
            $query = $link->query("SELECT * FROM empresas");
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
    
    public function alterar(Empresa $empresa){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="UPDATE empresas SET nome = '$empresa->nome', cnpj = '$empresa->cnpj',
			senha = '$empresa->senha', email = '$empresa->email'
			WHERE id = '$empresa->id'";
            mysqli_query($link, $query);
        }catch (Exception $e){
            echo $e;
        }
    }
    
    public function excluir($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="DELETE FROM empresas WHERE id = '$id'";
            mysqli_query($link, $query);
        } catch (Exception $e) {
            echo $e;
        }
    }
    
}

?>