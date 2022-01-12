<?php

class UserModel {

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=mayoristaropa;charset=utf8', 'root', '');
    }
    public function GetPassword($user){
        $sentencia = $this->db->prepare( "SELECT * FROM usuario WHERE usuario = ?");
        $sentencia->execute(array($user));
        $password = $sentencia->fetch(PDO::FETCH_OBJ);   
        return $password;
    }
    public function InsertarUsuario($usuario,$pass,$email,$name,$lastname){
        $sentencia = $this->db->prepare("INSERT INTO usuario(usuario,pass,email,name,lastname) VALUES(?,?,?,?,?)");
        $sentencia->execute(array($usuario,$pass,$email,$name,$lastname));
    }
    public function GetUsers(){
        $sentencia = $this->db->prepare("SELECT * FROM usuario");
        $sentencia->execute();
        $users = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
    public function GetUser($id_user){
        $sentencia = $this->db->prepare("SELECT * FROM usuario where id_usuario = ?");
        $sentencia->execute(array($id_user));
        $user = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
    public function DeleteUser($id_user){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $sentencia->execute(array($id_user));
    }
    public function SaveEditUser($is_admin, $id_user){
        $sentencia = $this->db->prepare( "UPDATE usuario SET is_admin = ? where id_usuario=?");
        $sentencia->execute(array($is_admin,$id_user));
    }
 }

?>