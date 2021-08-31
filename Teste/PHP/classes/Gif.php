<?php
include_once("Connect.php");

class Gif extends Connect {
    private $nome;
    
    
    function __construct(){
       
    }

    function inserirNomeCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO categorias_gif (id, nome) VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarCategorias(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id, nome  FROM categorias_gif ORDER BY nome ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarCategoria($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_gif WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarGifByCategoria($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM gif_animes WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarGif($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;                  
    }
    function  listarCategoriasByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome 
        FROM categorias_gif
        WHERE nome LIKE  '$inicial%' 
        ORDER BY nome ASC");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    // to com a impressão que isso faz exatemente a mesma coisa que a listarImagem......
    //pqp isso realmente faz a mesma coisa q o listarImagem..... eu so n apago pq deu trabalho lembrar como usa join
    function  getTema($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT gif_animes.caminho, categorias_gif.nome, gif_animes.id, gif_animes.nome_gif
        FROM gif_animes INNER JOIN categorias_gif ON categorias_gif.nome = gif_animes.nome
        WHERE categorias_anime.nome = '$categoria'");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarGif($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCaminho($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];  
    }
    function  getTag1($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag1'];  
    }
    function  getTag2($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag2'];  
    }
    function  getTag3($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag3'];  
    }
    function  getTag4($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag4'];  
    }
    function  getTag5($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag5'];  
    }
    function atualizarTag($tag1, $tag2, $tag3, $tag4, $tag5, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE gif_animes SET tag1 = :tag1,
        tag2 = :tag2, tag3 = :tag3, tag4 = :tag4, tag5 = :tag5 WHERE id = :id");
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirFavorita($caminho, $nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO imagens_anime_favorita (id_favorito, caminho, id, nome_gif) 
        VALUES (null, :caminho, :id, :nome)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);       
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getNome($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_gif'];  
    }
    function  verificarFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id = :id AND nome_gif = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_gif'];  
    }
    function  deletarGifFavorito($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime_favorita WHERE id = :id AND nome_gif = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getFavorita($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function  getNomeFavorita($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_gif'];  
    }
    function  getCaminhoByTag($tag){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_animes 
        WHERE tag1 = '$tag' OR tag2 = '$tag' OR tag3 = '$tag' OR tag4 = '$tag' OR tag5 = '$tag'");
        //$stmt ->bindValue(":tag",$tag);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function inserirNomeCategoriaJogo($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO categorias_jogo_gif (id, nome) VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarCategoriasJogo(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id, nome  FROM categorias_jogo_gif ORDER BY nome ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarCategoriaJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_jogo_gif WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarGifByCategoriaJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_jogo_gif WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarGifJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;                  
    }
    function  listarCategoriasJogoByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome 
        FROM categorias_jogo_gif
        WHERE nome LIKE  '$inicial%' 
        ORDER BY nome ASC");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    // to com a impressão que isso faz exatemente a mesma coisa que a listarImagem......
    //pqp isso realmente faz a mesma coisa q o listarImagem..... eu so n apago pq deu trabalho lembrar como usa join
    function  getTemaJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT gif_jogo.caminho, categorias_jogo_gif.nome, gif_jogo.id, gif_jogo.nome_imagem
        FROM gif_jogo INNER JOIN categorias_jogo_gif ON categorias_jogo_gif.nome = gif_jogo.nome
        WHERE categorias_jogo_gif.nome = '$categoria'");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarGifJogo($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCaminhoJogo($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];  
    }
    function  getJogoTag1($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag1'];  
    }
    function  getJogoTag2($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag2'];  
    }
    function  getJogoTag3($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag3'];  
    }
    function  getJogoTag4($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag4'];  
    }
    function  getJogoTag5($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag5'];  
    }
    function atualizarTagJogo($tag1, $tag2, $tag3, $tag4, $tag5, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE gif_jogo SET tag1 = :tag1,
        tag2 = :tag2, tag3 = :tag3, tag4 = :tag4, tag5 = :tag5 WHERE id = :id");
        $stmt ->bindValue(":tag1",$tag1);
        $stmt ->bindValue(":tag2",$tag2);
        $stmt ->bindValue(":tag3",$tag3);
        $stmt ->bindValue(":tag4",$tag4);
        $stmt ->bindValue(":tag5",$tag5);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getNomeJogo($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
   
    function  getCaminhoJogoByTag($tag){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM gif_jogo 
        WHERE tag1 = '$tag' OR tag2 = '$tag' OR tag3 = '$tag' OR tag4 = '$tag' OR tag5 = '$tag'");
        //$stmt ->bindValue(":tag",$tag);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function inserirJogoFavorita($caminho, $nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO imagens_anime_favorita (id_favorito, caminho, id, nome_gifJ)
        VALUES (null, :caminho, :id, :nome)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  verificarJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id = :id AND nome_gifJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_gifJ'];  
    }
    function  deletarImagemJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime_favorita WHERE id = :id AND nome_gifJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 
}



