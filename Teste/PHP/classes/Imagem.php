<?php
include_once("Connect.php");

class Imagem extends Connect {
    private $nome;
    
    
    function __construct(){
       
    }

    function inserirNomeCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO categorias_anime (id, nome) VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarCategorias(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id, nome  FROM categorias_anime ORDER BY nome ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarCategoria($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_anime WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarImagemByCategoria($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarImagem($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;                  
    }
    function  listarCategoriasByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome 
        FROM categorias_anime
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
        $stmt = $conn->prepare("SELECT imagens_anime.caminho, categorias_anime.nome, imagens_anime.id, imagens_anime.nome_imagem
        FROM imagens_anime INNER JOIN categorias_anime ON categorias_anime.nome = imagens_anime.nome
        WHERE categorias_anime.nome = '$categoria'");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarImagem($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCaminho($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];  
    }
    function  getTag1($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag1'];  
    }
    function  getTag2($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag2'];  
    }
    function  getTag3($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag3'];  
    }
    function  getTag4($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag4'];  
    }
    function  getTag5($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag5'];  
    }
    function atualizarTag($tag1, $tag2, $tag3, $tag4, $tag5, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_anime SET tag1 = :tag1,
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
        $stmt = $conn->prepare("INSERT INTO imagens_anime_favorita (id_favorito, caminho, id, nome_imagem)
        VALUES (null, :caminho, :id, :nome)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getNome($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
    function  verificarFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id = :id AND nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
    function  deletarImagemFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime_favorita WHERE id = :id AND nome_imagem = :nome");
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
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id_favorito = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
    function  getCaminhoByTag($tag){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime 
        WHERE tag1 = '$tag' OR tag2 = '$tag' OR tag3 = '$tag' OR tag4 = '$tag' OR tag5 = '$tag'");
        //$stmt ->bindValue(":tag",$tag);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function inserirCarroceuA($caminho, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO carroceu VALUES (null, :caminho, :id)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getIdCarroceuA($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM carroceu WHERE idCarroceu = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['id'];
    }
    function  getCaminhoCarroceuA($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM carroceu WHERE idCarroceu = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];
    }
    function  atualizarCarroceuA($caminho, $id, $idC){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE carroceu SET caminho = :caminho, id = :id WHERE idCarroceu = :idC ");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":idC",$idC);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function inserirDestaqueA($caminho, $nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO destaques VALUES (null, :caminho, :nome)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  atualizarDestaquesA($caminho, $nome, $idD){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE destaques SET caminho = :caminho, nome = :nome WHERE idDestaque = :idD ");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":idD",$idD);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function  getNomeDestaqueA($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaques WHERE idDestaque = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];
    }
    function  getCaminhoDestaqueA($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaques WHERE idDestaque = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];
    }
    function inserirNomeCategoriaJogo($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO categorias_jogo (id, nome) VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarCategoriasJogo(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id, nome  FROM categorias_jogo ORDER BY nome ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarCategoriaJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_jogo WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarImagemByCategoriaJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_jogo WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarImagemJogo($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;                  
    }
    function  listarCategoriasJogoByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome 
        FROM categorias_jogo
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
        $stmt = $conn->prepare("SELECT imagens_jogo.caminho, categorias_jogo.nome, imagens_jogo.id, imagens_jogo.nome_imagem
        FROM imagens_jogo INNER JOIN categorias_jogo ON categorias_jogo.nome = imagens_jogo.nome
        WHERE categorias_jogo.nome = '$categoria'");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarImagemJogo($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCaminhoJogo($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];  
    }
    function  getJogoTag1($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag1'];  
    }
    function  getJogoTag2($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag2'];  
    }
    function  getJogoTag3($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag3'];  
    }
    function  getJogoTag4($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag4'];  
    }
    function  getJogoTag5($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag5'];  
    }
    function atualizarTagJogo($tag1, $tag2, $tag3, $tag4, $tag5, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_jogo SET tag1 = :tag1,
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
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
   
    function  getCaminhoJogoByTag($tag){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_jogo 
        WHERE tag1 = '$tag' OR tag2 = '$tag' OR tag3 = '$tag' OR tag4 = '$tag' OR tag5 = '$tag'");
        //$stmt ->bindValue(":tag",$tag);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function inserirJogoFavorita($caminho, $nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO imagens_anime_favorita (id_favorito, caminho, id, nome_imagemJ)
        VALUES (null, :caminho, :id, :nome)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  verificarJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_anime_favorita WHERE id = :id AND nome_imagemJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagemJ'];  
    }
    function  deletarImagemJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime_favorita WHERE id = :id AND nome_imagemJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirCatFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO cat_favorita (id_favorito, nomeA, id_user)
        VALUES (null, :nome, :id)");
        $stmt ->bindValue(":nome",$nome);
         $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirCatJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO cat_favorita (id_favorito, nomeJ, id_user)
        VALUES (null, :nome, :id)");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  verificarCatFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM cat_favorita WHERE id_user = :id AND nomeA = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nomeA'];  
    }
    function  verificarCatJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM cat_favorita WHERE id_user = :id AND nomeJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nomeJ'];  
    }
    function  deletarCatFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM cat_favorita WHERE id_user = :id AND nomeA = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarCatJogoFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM cat_favorita WHERE id_user = :id AND nomeJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarCategoriasFavoritas($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nomeA  FROM cat_favorita 
        WHERE id_user = :id AND nomeA IS NOT NULL
        ORDER BY nomeA ASC");
         $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  listarCategoriasJogoFavoritas($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nomeJ  FROM cat_favorita 
        WHERE id_user = :id AND nomeJ IS NOT NULL
        ORDER BY nomeJ ASC");
         $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarCatFavoritaByCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM cat_favorita WHERE nomeA = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarCatJogoFavoritaByCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM cat_favorita WHERE  nomeJ = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCategoria($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE categorias_anime SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCatImagem($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_anime SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCatFavorita($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE cat_favorita SET nomeA = :nome
         WHERE nomeA = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCategoriaJogo($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE categorias_jogo SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCatImagemJogo($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_jogo SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCatFavoritaJogo($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE cat_favorita SET nomeJ = :nome
         WHERE nomeJ = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCategoriaByNome($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome FROM imagens_anime WHERE nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];  
    }
    function  getCategoriaJogoByNome($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome FROM imagens_jogo WHERE nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];  
    }
    function moverImagem($categoria, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_anime SET nome = :categoria WHERE id = :id");
        $stmt ->bindValue(":categoria",$categoria);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function moverImagemJogo($categoria, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_jogo SET nome = :categoria WHERE id = :id");
        $stmt ->bindValue(":categoria",$categoria);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
}



