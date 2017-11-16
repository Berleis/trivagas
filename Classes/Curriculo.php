<?php
class Curriculo{
    
    private $id;
	private $idcandidato;
	private $endereco;
	private $objetivo;
	private $formacao;
	private $habilidades;
	
    //--------------------
    public function getId() {
        return $this->id;
    }
    public function getIdcandidato() {
        return $this->idcandidato;
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
	//----------------------
    public function setId($id) {
        $this->id = $id;
    }
    public function setIdcandidato($idcandidato) {
        $this->idcandidato = $idcandidato;
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
	public function setHabilidades($extra) {
        $this->habilidades = $habilidades;
    }
    
    
    public function incluir(Curriculo $curriculo){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="INSERT INTO curriculo (` id `, ` idcandidato ` , ` endereco `, ` objetivo ` , ` formacao` , ` habilidades ` )
			VALUES (NULL, '$curriculo->idcandidato' , '$curriculo->endereco', '$curriculo->objetivo','$curriculo->formacao','$curriculo->habilidades')";
            mysqli_query($link, $query);
        }catch(Exception $c){
            echo $c;
        }
    }
    
    public function buscar($idcandidato){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM curriculos WHERE idcandidato = '$idcandidato'";
            $result=mysqli_query($link, $query);
            $obj=mysqli_fetch_object($result);
            return $obj;
        } catch (Exception $c) {
            echo $c;
        }
    }
    
    public function buscarPorId($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="SELECT * FROM curriculos WHERE id = '$id'";
            $result=mysqli_query($link, $query);
            $obj=mysqli_fetch_object($result);
            return $obj;
        } catch (Exception $c) {
            echo $c;
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
        } catch (Exception $c) {
            echo $c;
        }
    }
    
    public function alterar(Curriculo $curriculo){
        try{
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="UPDATE curriculos SET endereco = '$curriculo->endereco', objetivo = '$curriculo->objetivo',
			formacao = '$curriculo->formacao', habilidades = '$curriculo->habilidades'
			WHERE idcandidato = '$curriculo->idcandidato'";
            mysqli_query($link, $query);
        }catch (Exception $c){
            echo $c;
        }
    }
    
    public function excluir($id){
        try {
            $link=mysqli_connect("localhost", "root", "", "trivagas");
            $query="DELETE FROM curriculos WHERE id = '$id'";
            mysqli_query($link, $query);
        } catch (Exception $c) {
            echo $c;
        }
    }
 
}
 ?>  