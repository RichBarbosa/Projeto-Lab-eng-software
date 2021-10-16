<?php
//lembrar que quando subir pro servidor vai ter que aumentar o maximo permitido para upload
include_once("Connect.php");

class Upload extends Connect {
    private $nome;
    private $extensao;
    private $tipo;
    private $tmp;
    private $erro;
    private $tamanho;

    function __construct($file){
        $this->tipo = $file['type'];
        $this->tmp = $file['tmp_name'];
        $this->tamanho = $file['size'];
        $this->erro = $file['error'];
        $info = pathinfo($file['name']);
        $this->nome = $info['filename'];
        $this->extensao = $info['extension'];
    }

    function uploadImagem($pasta, $categoria, $tag1, $tag2, $tag3, $tag4, $tag5){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $nomeoriginal = $this->nome;
        $novonome = md5($nomeoriginal . date("dmYHis"));
        $nomecompleto = $novonome . ".". $this->extensao;
        move_uploaded_file($this->tmp,$pasta .$nomecompleto);
        $caminho = $pasta . $nomecompleto;
        $stmt = $conn->prepare("INSERT INTO imagens_anime (id, nome_imagem, nome, caminho, 
        tag1, tag2, tag3, tag4, tag5) 
        VALUES (null, :nome_imagem, :nome, :caminho, 
        :tag1, :tag2, :tag3, :tag4, :tag5)");
        $stmt ->bindValue(":nome_imagem",$nomecompleto);
        $stmt ->bindValue(":nome",$categoria);
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function uploadGif($pasta, $categoria, $tag1, $tag2, $tag3, $tag4, $tag5){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $nomeoriginal = $this->nome;
        $novonome = md5($nomeoriginal . date("dmYHis"));
        $nomecompleto = $novonome . ".". $this->extensao;
        move_uploaded_file($this->tmp,$pasta .$nomecompleto);
        $caminho = $pasta . $nomecompleto;
        $stmt = $conn->prepare("INSERT INTO gif_animes (id, nome_gif, nome, caminho, 
        tag1, tag2, tag3, tag4, tag5) 
        VALUES (null, :nome_imagem, :nome, :caminho, 
        :tag1, :tag2, :tag3, :tag4, :tag5)");
        $stmt ->bindValue(":nome_imagem",$nomecompleto);
        $stmt ->bindValue(":nome",$categoria);
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function uploadImagemJogo($pasta, $categoria, $tag1, $tag2, $tag3, $tag4, $tag5){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $nomeoriginal = $this->nome;
        $novonome = md5($nomeoriginal . date("dmYHis"));
        $nomecompleto = $novonome . ".". $this->extensao;
        move_uploaded_file($this->tmp,$pasta .$nomecompleto);
        $caminho = $pasta . $nomecompleto;
        $stmt = $conn->prepare("INSERT INTO imagens_jogo (id, nome_imagem, nome, caminho, 
        tag1, tag2, tag3, tag4, tag5)
        VALUES (null, :nome_imagem, :nome, :caminho, 
        :tag1, :tag2, :tag3, :tag4, :tag5)");
        $stmt ->bindValue(":nome_imagem",$nomecompleto);
        $stmt ->bindValue(":nome",$categoria);
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function uploadGifJogo($pasta, $categoria, $tag1, $tag2, $tag3, $tag4, $tag5){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $nomeoriginal = $this->nome;
        $novonome = md5($nomeoriginal . date("dmYHis"));
        $nomecompleto = $novonome . ".". $this->extensao;
        move_uploaded_file($this->tmp,$pasta .$nomecompleto);
        $caminho = $pasta . $nomecompleto;
        $stmt = $conn->prepare("INSERT INTO gif_jogo (id, nome_imagem, nome, caminho, 
        tag1, tag2, tag3, tag4, tag5) 
        VALUES (null, :nome_imagem, :nome, :caminho, 
        :tag1, :tag2, :tag3, :tag4, :tag5)");
        $stmt ->bindValue(":nome_imagem",$nomecompleto);
        $stmt ->bindValue(":nome",$categoria);
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function uploadNSFW($pasta, $categoria, $tag1, $tag2, $tag3, $tag4, $tag5){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $nomeoriginal = $this->nome;
        $novonome = md5($nomeoriginal . date("dmYHis"));
        $nomecompleto = $novonome . ".". $this->extensao;
        move_uploaded_file($this->tmp,$pasta .$nomecompleto);
        $caminho = $pasta . $nomecompleto;
        $stmt = $conn->prepare("INSERT INTO imagens_nsfw (id, nome_imagem, nome, caminho, 
        tag1, tag2, tag3, tag4, tag5) 
        VALUES (null, :nome_imagem, :nome, :caminho, 
        :tag1, :tag2, :tag3, :tag4, :tag5)");
        $stmt ->bindValue(":nome_imagem",$nomecompleto);
        $stmt ->bindValue(":nome",$categoria);
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}    