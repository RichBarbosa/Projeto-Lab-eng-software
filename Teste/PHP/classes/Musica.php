<?php
include_once("Connect.php");

class Musica extends Connect{
    private $nome;
    private $autoria;
    private $genero;
    private $letraO;
    private $letraT;
    private $linkY;
    private $linkS;

    function __construct(){

    }
    
    function criarGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO generos_musica (id, nome) VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function criarAutoria($autoria, $genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO autoria_musica VALUES (null, :nomeA, :nomeG)");
        $stmt ->bindValue(":nomeA",$this->autoria = $autoria);
        $stmt ->bindValue(":nomeG",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirMusica($nome, $letraO, $letraT, $autoria, $genero, $linkY, $linkS, $idUser){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO musica (id, nome_musica, letra_original, letra_traduzida, nome_autoria, 
        nome_genero, link_youtube, link_spotify, idUser) 
        VALUES (null, :nome, :letraO, :letraT, :autoria, :genero, :linkY, :linkS, :idUser)");
        $stmt ->bindValue(":nome",$this->nome = $nome);       
        $stmt ->bindValue(":letraO",$this->letraO = $letraO);
        $stmt ->bindValue(":letraT",$this->letraT = $letraT);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $stmt ->bindValue(":linkY",$this->linkY = $linkY);
        $stmt ->bindValue(":linkS",$this->linkS = $linkS);
        $stmt ->bindValue(":idUser",$idUser);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function AtualizarMusica($nome, $letraO, $letraT, $linkY, $linkS, $idUser, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET nome_musica = :nome, letra_original = :letraO, letra_traduzida = :letraT, link_youtube = :linkY, link_spotify = :linkS,
        idEditor = :idUser
        WHERE id = :id");
        $stmt ->bindValue(":nome",$this->nome = $nome);       
        $stmt ->bindValue(":letraO",$this->letraO = $letraO);
        $stmt ->bindValue(":letraT",$this->letraT = $letraT);
        $stmt ->bindValue(":linkY",$this->linkY = $linkY);
        $stmt ->bindValue(":linkS",$this->linkS = $linkS);
        $stmt ->bindValue(":idUser",$idUser);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirTradução($letraT, $nome, $autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET letra_traduzida = :letraT 
        WHERE :nome_musica = :nome AND  nome_autoria = :autoria");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":letraT",$this->letraT = $letraT);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirLinkY($linkY, $nome, $autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET linkY = :linkY 
        WHERE :nome_musica = :nome AND  nome_autoria = :autoria");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":linkY",$this->linkY = $linkY);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirLinkS($linkS, $nome, $autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET linkS = :linkS 
        WHERE :nome_musica = :nome AND  nome_autoria = :autoria");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":linkS",$this->linkS = $linkS);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM generos_musica WHERE nome = :nome");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarAutoria($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM autoria_musica WHERE nome_autoria = :nome");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarMusicaByAutoria($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica WHERE nome_autoria = :nome");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarFavoritaByAutoria($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica_favorita WHERE autoria = :nome");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarAutFavoritaByAutoria($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM autoria_favorita WHERE nome = :nome");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarAutFavoritaByGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM autoria_favorita WHERE genero = :nome");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarAutoriaByGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM autoria_musica WHERE nome_genero = :nome");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarMusicaByGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica WHERE nome_genero = :nome");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarFavoritaByGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica_favorita WHERE genero = :nome");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /*function deletaraMusicaFavoritaByGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica WHERE nome_genero = :nome");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/
    function renomearGenero($genero, $Ngenero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE generos_musica SET nome = :nome
         WHERE nome = :genero");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $stmt ->bindValue(":genero",$Ngenero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearGenAutoria($genero, $Ngenero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE autoria_musica SET nome_genero = :nome
         WHERE nome_genero = :genero");
         $stmt ->bindValue(":nome",$this->genero = $genero);
         $stmt ->bindValue(":genero",$Ngenero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearGenMusica($genero, $Ngenero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET nome_genero = :nome
         WHERE nome_genero = :genero");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $stmt ->bindValue(":genero",$Ngenero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearGenFavorita($genero, $Ngenero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica_favorita SET genero = :nome
         WHERE genero = :genero");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $stmt ->bindValue(":genero",$Ngenero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearAutoria($autoria, $Nautoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE autoria_musica SET nome_autoria = :nome
         WHERE nome_autoria = :autoria");
         $stmt ->bindValue(":nome",$this->autoria = $autoria);
         $stmt ->bindValue(":autoria",$Nautoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearAutMusica($autoria, $Nautoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET nome_autoria = :nome
         WHERE nome_autoria = :autoria");
         $stmt ->bindValue(":nome",$this->autoria = $autoria);
         $stmt ->bindValue(":autoria",$Nautoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearAutFavorita($autoria, $Nautoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica_favorita SET autoria = :nome
         WHERE autoria = :autoria");
         $stmt ->bindValue(":nome",$this->autoria = $autoria);
         $stmt ->bindValue(":autoria",$Nautoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarAutoriasByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_autoria 
        FROM autoria_musica
        WHERE nome_autoria LIKE  '$inicial%' 
        ORDER BY nome_autoria ASC");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  getGeneroByAutoria($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_genero 
        FROM autoria_musica
        WHERE nome_autoria =  :autoria");
        $stmt ->bindValue(":autoria",$autoria);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['nome_genero'];
    }
    function  getAutoriaByAutoria($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_autoria
        FROM autoria_musica
        WHERE nome_autoria =  :autoria");
        $stmt ->bindValue(":autoria",$autoria);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['nome_autoria'];
    }
    function  getAutoriaByGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_autoria
        FROM autoria_musica
        WHERE nome_genero =  :genero");
        $stmt ->bindValue(":genero",$genero);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['nome_autoria'];
    }
    function  listarGeneroByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome
        FROM generos_musica
        WHERE nome LIKE  '$inicial%' 
        ORDER BY nome ASC");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  listarGenero(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome, id
        FROM generos_musica
        ORDER BY nome ASC");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  getGeneroByIdGenero($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome
        FROM generos_musica
        WHERE id = :id");
        $stmt ->bindValue(":id",$id);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['nome'];
    }
    function  listarAutorias($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_autoria
        FROM autoria_musica
        WHERE nome_genero = :genero
        ORDER BY nome_autoria ASC");
        $stmt ->bindValue(":genero",$this->genero = $genero);               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  listarTodasAutorias(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT *
        FROM autoria_musica
        ORDER BY nome_autoria ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  getMusica($autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_musica, id
        FROM musica
        WHERE nome_autoria = :autoria
        ORDER BY curtidas DESC");
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  getId($autoria, $genero, $nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id
        FROM musica
        WHERE nome_autoria = :autoria AND nome_genero = :genero AND nome_musica = :nome
        ORDER BY nome_autoria ASC");
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $stmt ->bindValue(":genero",$this->nome = $nome);                              
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['id'];
    }
    function  getLetra($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT letra_original
        FROM musica
        WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['letra_original'];
    }
    function  getTraducao($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT letra_traduzida
        FROM musica
        WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['letra_traduzida'];
    }
    function  getLinkS($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT link_spotify
        FROM musica
        WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['link_spotify'];
    }
    function  getLinkY($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT link_youtube
        FROM musica
        WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['link_youtube'];
    }
    function  verificarMusicaFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM musica_favorita WHERE idUser = :id AND nome_musica = :nome");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_musica'];  
    }
    function  verificarAutFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM autoria_favorita WHERE idUser = :id AND nome = :nome");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];  
    }
    function  getAutoriaById($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_autoria
        FROM musica
        WHERE id =  :id");
        $stmt ->bindValue(":id",$id);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['nome_autoria'];
    }
    function inserirFavorita($nome, $autoria, $genero, $id, $idMusica){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO musica_favorita
        VALUES (null, :nome, :autoria, :genero, :id, :idMusica)");
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $stmt ->bindValue(":idMusica",$idMusica);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarMusicaFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica_favorita WHERE idUser = :id AND nome_musica = :nome");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirAutoriaFavorita($autoria, $id, $genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO autoria_favorita
        VALUES (null, :autoria, :id, :genero)");
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarAutoriaFavorita($autoria, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM autoria_favorita WHERE idUser = :id AND nome= :nome");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarMusica($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarTodasMusicaFavorita($nome, $autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM musica_favorita WHERE autoria = :autoria AND nome_musica = :nome");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getNome($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome_musica
        FROM musica
        WHERE id = :id
        ORDER BY nome_autoria ASC");
        $stmt ->bindValue(":id",$id = $id);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['nome_musica'];
    }
    function  getUser($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT idUser
        FROM musica
        WHERE id = :id");
        $stmt ->bindValue(":id",$id);               
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rs['idUser'];
    }
    function MoverMusica($autoria, $genero, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET nome_autoria = :autoria, nome_genero = :genero
        WHERE id = :id");
         $stmt ->bindValue(":autoria",$this->autoria = $autoria);
         $stmt ->bindValue(":genero",$this->genero = $genero);
         $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function MoverMusicaFavorita($autoria, $genero, $nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica_favorita SET autoria = :autoria, genero = :genero
        WHERE nome_musica = :nome");
         $stmt ->bindValue(":autoria",$this->autoria = $autoria);
         $stmt ->bindValue(":genero",$this->genero = $genero);
         $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function MoverAutoria($autoria, $genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE autoria_musica SET nome_genero = :genero
        WHERE nome_autoria = :autoria");
         $stmt ->bindValue(":autoria",$this->autoria = $autoria);
         $stmt ->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function MoverAutoriaMusica($autoria, $genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET nome_genero = :genero
        WHERE nome_autoria = :autoria");
         $stmt ->bindValue(":autoria",$this->autoria = $autoria);
         $stmt ->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function MoverAutoriaMusicaFavorita($autoria, $genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica_favorita SET genero = :genero
        WHERE autoria = :autoria");
         $stmt ->bindValue(":autoria",$this->autoria = $autoria);
         $stmt ->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getMusicaFavorita($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM musica_favorita WHERE idUser = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function  getArtistaFavorito($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM autoria_favorita WHERE idUser = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function  listarMusicasByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * 
        FROM musica
        WHERE nome_musica LIKE  '$inicial%' 
        ORDER BY nome_musica ASC");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function inserirDestaqueAutoria($autoria, $genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO destaquesa VALUES (null, :nome, :genero)");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  atualizarDestaquesAutoria($autoria, $genero, $idD){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE destaquesa SET genero = :genero, nome = :nome WHERE id = :idD ");
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $stmt ->bindValue(":idD",$idD);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function inserirDestaqueM($nome, $autoria, $idM){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO destaquesm VALUES (null, :nome, :autoria, :idM)");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":idM",$idM);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  atualizarDestaquesM($nome, $autoria, $idM, $idD){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE destaquesm SET nome = :nome, autoria = :autoria,  idMusica = :idM WHERE id = :idD ");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $stmt ->bindValue(":autoria",$this->autoria = $autoria);
        $stmt ->bindValue(":idM",$idM);
        $stmt ->bindValue(":idD",$idD);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function  getnomeDestaqueAutoaria($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaquesa WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];
    }
    function  getnomeDestaqueM($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaquesm WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];
    }
    function  getnomeDestaqueG($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaquesg WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['genero'];
    }
    function  getIdDestaqueM($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaquesm WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['idMusica'];
    }
    function inserirDestaqueG($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO destaquesg VALUES (null, :genero)");
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  atualizarDestaquesG($genero, $idD){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE destaquesg SET genero = :genero WHERE id = :idD ");
        $stmt ->bindValue(":genero",$this->genero = $genero);
        $stmt ->bindValue(":idD",$idD);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function renomearMusicaFavorita($nome, $autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica_favorita SET nome_musica = :nome
        WHERE autoria = :autoria");
         $stmt ->bindValue(":autoria",$this->autoria = $autoria);
         $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearGenAutoriaFavorita($genero, $Ngenero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE autoria_favorita SET genero = :nome
         WHERE genero = :genero");
        $stmt ->bindValue(":nome",$this->genero = $genero);
        $stmt ->bindValue(":genero",$Ngenero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function renomearAutAutoriaFavorita($autoria, $Ngenero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE autoria_favorita SET nome = :nome
         WHERE nome = :autoria");
        $stmt ->bindValue(":nome",$this->autoria = $autoria);
        $stmt ->bindValue(":autoria",$Ngenero);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirCurtido($curtir, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET curtidas = :curtir
        WHERE id = :nome");
        $stmt->bindValue("curtir",$curtir);
        $stmt ->bindValue(":nome",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function removerCurtido($curtir, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET curtidas = :curtir
        WHERE id = :nome");
        $stmt->bindValue("curtir",$curtir);
        $stmt ->bindValue(":nome",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function getCurtido($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT curtidas FROM musica WHERE id = :nome");
        $stmt ->bindValue(":nome",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['curtidas'];                  
    }
    function inserirVisualizacao($id, $view){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE musica SET visualizacao = :view
        WHERE id = :nome");
        $stmt->bindValue("view",$view);
        $stmt ->bindValue(":nome",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function getViews($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT visualizacao FROM musica WHERE id = :nome");
        $stmt ->bindValue(":nome",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['visualizacao'];                  
    }
    function validarGenero($genero){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM generos_musica WHERE nome = :genero");
        $stmt->bindValue(":genero",$this->genero = $genero);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rs){
            return true;
        }else{
            return false;
        }        
    }
    function validarAutoria($genero, $autoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM autoria_musica WHERE nome_genero = :genero AND nome_autoria = :autoria");
        $stmt->bindValue(":genero",$this->genero = $genero);
        $stmt->bindValue(":autoria",$this->autoria = $autoria);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rs){
            return true;
        }else{
            return false;
        }        
    }
}
