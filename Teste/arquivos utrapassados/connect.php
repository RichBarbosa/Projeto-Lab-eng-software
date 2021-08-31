<<?php
include_once("bd.php");

class connect extends bd{
    var $bd;
    
   function connect() {
        $this->bd = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->senha);
    }

    function login($email, $senha){
        $stmt = $this->bd->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $stmt ->bindValue(":email",$email);
        $stmt ->bindValue(":senha",sha1($senha));
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;

    }
    function inserir($nome, $email, $senha, $termo,  $user){
        $stmt = $this->bd->prepare("INSERT INTO usuario (nome, email, senha, termo, user) VALUES (:nome, :email, :senha, :termo, :user)");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":email",$email);
        $stmt ->bindValue(":senha",sha1($senha));
        $stmt ->bindValue(":termo",$termo);
        $stmt ->bindValue(":user",$user);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;

    }
}