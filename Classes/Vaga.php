<?php
class Vaga{
    
    private $id;
    private $id_empresa;
    private $descricao;
    private $horario;
    private $salario;
    private $beneficios;
    private $categoria;
    
    //Getters
    public function getId() {
        return $this->id;
    }
    public function getId_empresa() {
        return $this->id_empresa;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function getHorario() {
        return $this->horario;
    }
    public function getSalario() {
        return $this->salario;
    }
    public function getBeneficios() {
        return $this->beneficios;
    }
    public function getCategoria() {
        return $this->categoria;
    }
    
    //Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setId_empresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setHorario($horario) {
        $this->horario = $horario;
    }
    public function setSalario($salario) {
        $this->salario = $salario;
    }
    public function setBeneficios($beneficios) {
        $this->beneficios = $beneficios;
    }
    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    //Metodos
    
    public function incluir(Vaga $vaga){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="INSERT INTO vagas (`id`, `id_empresa`, `descricao`, `horario`, `salario`, `beneficios`, `categoria`)
			VALUES (NULL, '$vaga->id_empresa', '$vaga->descricao', '$vaga->horario', '$vaga->salario', '$vaga->beneficios', '$vaga->categoria')";
            mysqli_query($link, $query);
        }catch(Exception $e){
            echo $e;
        }
    }
    
    public function buscarPorId($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM vagas WHERE id = '$id'";
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
            $query = $link->query("SELECT * FROM vagas");
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
    
    public function alterar(Vaga $vaga){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="UPDATE vagas SET descricao = '$vaga->descricao', horario = '$vaga->horario',
			salario = '$vaga->salario', beneficios = '$vaga->beneficios', categoria = '$vaga->categoria'
			WHERE id = '$vaga->id'";
            mysqli_query($link, $query);
        }catch (Exception $e){
            echo $e;
        }
    }
    
    public function excluir($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="DELETE FROM vagas WHERE id = '$id'";
            mysqli_query($link, $query);
        } catch (Exception $e) {
            echo $e;
        }
    }
    
}
?>