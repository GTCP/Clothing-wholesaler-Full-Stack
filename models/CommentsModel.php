<?php
class CommentsModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=mayoristaropa;charset=utf8', 'root', '');
    }
	public function GetComments(){
        $sentencia = $this->db->prepare( "SELECT C.*, P.name as nameProd from comentario C join producto P on C.id_product = P.id_product");
        $sentencia->execute();
        $Comments = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $Comments;
    }	
    public function GetCommentsProduct($id_product){
        $sentencia = $this->db->prepare( "SELECT * FROM comentario WHERE id_product = ?");
        $sentencia->execute(array($id_product));
        $Comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Comments;
    }		
    public function GetComment($id){
        $sentencia = $this->db->prepare( "SELECT C.*, P.name as nameProd from comentario C join producto P on C.id_product = P.id_product WHERE id_comment=?");
        $sentencia->execute(array($id));
        $Comment = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Comment;
    }
    public function InsertComment($comment,$score,$date,$id_product){
        $sentencia = $this->db->prepare("INSERT INTO comentario(comment,score,date,id_product) VALUES(?,?,?,?)");
        $sentencia->execute(array($comment,$score,$date,$id_product));
    }
    public function DeleteComment($id_comment){
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comment=?");
        $sentencia->execute(array($id_comment));
    }


    public function UpdateComment($comment,$score,$date,$id_product,$id_comment){
        $sentencia = $this->db->prepare( "UPDATE comentario SET comment = ?, score = ?, date = ? WHERE id_comment = ? ");
        $sentencia->execute(array($comment,$score,$date,$id_product,$id_comment));
    }
   

}
?>