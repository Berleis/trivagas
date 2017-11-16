<?php
class Curriculo{
    
    private $id;
	private $id_candidato;
	private $endereco;
	private $objetivo;
	private $formacao;
	private $habilidades;
	
    //Getters
    public function getId() {
        return $this->id;
    }
    public function getId_candidato() {
        return $this->id_candidato;
    }
    public function getEndereco() {
        return $this->endereco;
    } 
	public function getObjetivo(){
		return $this->objetivo;
	}
	public function getFormacao() {
        return $this->formacao;
    }
	public function getHabilidades() {
        return $this->habilidades;
    }
    
	//Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setId_candidato($id_candidato) {
        $this->id_candidato = $id_candidato;
    }
	public function setEndereco ($endereco) {
        $this->endereco = $endereco;
    }
	public function setObjetivo($objetivo) {
        $this->objetivo = $objetivo;
    }
	public function setFormacao($formacao) {
        $this->formacao = $formacao;
    }
	public function setHabilidades($habilidades) {
        $this->habilidades = $habilidades;
    }
    
    //Métodos
    
    public function incluir(Curriculo $curriculo){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="INSERT INTO curriculos (`id`, `id_candidato`, `endereco`, `objetivo`, `formacao`, `habilidades`)
			VALUES (NULL, '$curriculo->id_candidato', '$curriculo->endereco', '$curriculo->objetivo', '$curriculo->formacao', '$curriculo->habilidades')";
            mysqli_query($link, $query);
        }catch(Exception $e){
            echo $e;
        }
    }
    
    public function buscar($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM curriculos WHERE id = '$id'";
            $result=mysqli_query($link, $query);
            $obj=mysqli_fetch_object($result);
            return $obj;
        } catch (Exception $e) {
            echo $e;
        }
    }
    
    public function buscarPorCandidato($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM curriculos WHERE id_candidato = '$id'";
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
            $query = $link->query("SELECT * FROM curriculos");
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
    
    public function alterar(Curriculo $curriculo){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="UPDATE curriculos SET endereco = '$curriculo->endereco', objetivo = '$curriculo->objetivo',
			formacao = '$curriculo->formacao', habilidades = '$curriculo->habilidades'
			WHERE id = '$curriculo->id'";
            mysqli_query($link, $query);
        }catch (Exception $e){
            echo $e;
        }
    }
    
    public function excluir($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="DELETE FROM curriculos WHERE id = '$id'";
            mysqli_query($link, $query);
        } catch (Exception $e) {
            echo $e;
        }
    }
 
}
 ?>  