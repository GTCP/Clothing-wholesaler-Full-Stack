<?php
class ProductsModel {
    private $db;
    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=mayoristaropa;charset=utf8', 'root', '');
    }
	public function GetProducts(){
        $sentencia = $this->db->prepare( "SELECT P.*, C.name as nameCat from producto P join categoria C on P.id_category = C.id_category");
        $sentencia->execute();
        $Products = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Products;
    }		
    public function GetProductId($id){
        $sentencia = $this->db->prepare( "SELECT P.*, C.name as nameCat from producto P join categoria C on P.id_category = C.id_category WHERE id_product=?");
        $sentencia->execute(array($id));
        $Product = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Product;
    }
    public function InsertProduct($name,$description,$price,$stock,$id_category){
        $sentencia = $this->db->prepare("INSERT INTO producto(name,description,price,stock,id_category) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($name,$description,$price,$stock,$id_category));
    }
    public function SaveEditProduct($name,$description,$price,$stock,$id_category,$id_product){
        $sentencia = $this->db->prepare( "UPDATE producto SET name = ?, description = ?, price = ?, stock = ?, id_category = ? WHERE id_product = ? ");
        $sentencia->execute(array($name,$description,$price,$stock,$id_category,$id_product));
    }
    public function BorrarOneProduct($id_product){
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id_product=?");
        $sentencia->execute(array($id_product));
    }
    
    public function GetProductsByOrderCategory(){
        $sentencia = $this->db->prepare( "SELECT P.*, C.name as nameCat from producto P join categoria C on P.id_category = C.id_category ORDER BY P.id_category ASC");
        $sentencia->execute();
        $Products = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $Products;
    }	
    private function uploadImage($image){
        $target = "imgProduct/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target);
        return $target;
    }

}
?>