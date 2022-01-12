<?php
class ImagesModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=mayoristaropa;charset=utf8', 'root', '');
    }
    private function uploadImage($image){
        $target = "imgProduct/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target);
        return $target;
    }
    
    public function addImages($id,$image = null){
        $pathImg = null;
        $pathImg = $this->uploadImage($image);
            if ($image){
            $sentencia = $this->db->prepare("INSERT INTO images(id_product,direccion) VALUES(?,?)");
            $sentencia->execute(array($id,$pathImg));
        }
    }
    public function deleteImage($id_product){
        $sentencia = $this->db->prepare("DELETE FROM images WHERE id_image=?");
        $sentencia->execute(array($id_product));
    }
    
    public function GetImages($id){
        $sentencia = $this->db->prepare("SELECT * FROM images WHERE id_product=?");
        $sentencia->execute(array($id));
        $Images = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Images;
    }	
}
?>