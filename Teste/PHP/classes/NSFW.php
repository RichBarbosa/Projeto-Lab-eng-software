<?php
include_once("Connect.php");

class NSFW extends Connect {
    private $nome;
    
    
    function __construct(){
       
    }

    function inserirNomeCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO categorias_nsfw (id, nome) VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  listarCategorias(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id, nome  FROM categorias_nsfw ORDER BY nome ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarCategoria($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM categorias_nsfw WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarImagemByCategoria($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_nsfw WHERE nome = :nome");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function listarImagem($categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw
        WHERE nome = :nome
        ORDER BY curtidas DESC");
        $stmt ->bindValue(":nome",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;                  
    }
    function  listarCategoriasByInicial($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome 
        FROM categorias_nsfw
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
        $stmt = $conn->prepare("SELECT imagens_nsfw.caminho, categorias_nsfw.nome, imagens_nsfw.id, imagens_nsfw.nome_imagem
        FROM imagens_nsfw INNER JOIN categorias_nsfw ON categorias_nsfw.nome = imagens_nsfw.nome
        WHERE categorias_nsfw.nome = '$categoria'");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarImagem($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCaminho($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['caminho'];  
    }
    function  getTag1($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag1'];  
    }
    function  getTag2($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag2'];  
    }
    function  getTag3($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag3'];  
    }
    function  getTag4($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag4'];  
    }
    function  getTag5($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['tag5'];  
    }
    function atualizarTag($tag1, $tag2, $tag3, $tag4, $tag5, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_nsfw SET tag1 = :tag1,
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
        $stmt = $conn->prepare("INSERT INTO favoritas_nsfw (id_favorito, caminho, id, nome_imagem)
        VALUES (null, :caminho, :id, :nome)");
        $stmt ->bindValue(":caminho",$caminho);
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getNome($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
    function  verificarFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM favoritas_nsfw WHERE id = :id AND nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
    function  deletarImagemFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM favoritas_nsfw WHERE id = :id AND nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getFavorita($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM favoritas_nsfw WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    function  getNomeFavorita($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM favoritas_nsfw WHERE id_favorito = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome_imagem'];  
    }
    function  getCaminhoByTag($tag){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw 
        WHERE tag1 = '$tag' OR tag2 = '$tag' OR tag3 = '$tag' OR tag4 = '$tag' OR tag5 = '$tag'");
        //$stmt ->bindValue(":tag",$tag);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;  
    }
    
    function inserirDestaque($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO destaquesnsfw VALUES (null, :nome)");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  atualizarDestaques($nome, $idD){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE destaquesnsfw SET nome = :nome WHERE idDestaque = :idD ");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":idD",$idD);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function  getNomeDestaque($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM destaquesnsfw WHERE idDestaque = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];
    }    
    function inserirCatFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO catnsfw_favorita (id_favorito, nome, id_user)
        VALUES (null, :nome, :id)");
        $stmt ->bindValue(":nome",$nome);
         $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function  verificarCatFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM catnsfw_favorita WHERE id_user = :id AND nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];  
    }
    
    function  deletarCatFavorita($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM catnsfw_favorita WHERE id_user = :id AND nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    function  listarCategoriasFavoritas($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome  FROM catnsfw_favorita 
        WHERE id_user = :id AND nome IS NOT NULL
        ORDER BY nome ASC");
         $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function  deletarCatFavoritaByCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM catnsfw_favorita WHERE nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCategoria($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE categorias_nsfw SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCatImagem($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_nsfw SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarCatFavorita($nome, $categoria){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE catnsfw_favorita SET nome = :nome
         WHERE nome = :categoria");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":categoria",$categoria);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  getCategoriaByNome($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nome FROM imagens_nsfw WHERE nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];  
    }
    function moverImagem($categoria, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_nsfw SET nome = :categoria WHERE id = :id");
        $stmt ->bindValue(":categoria",$categoria);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarTodasImagemFavorita($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM favoritas_nsfw WHERE nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function inserirCurtido($curtir, $nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_nsfw SET curtidas = :curtir
        WHERE nome_imagem = :nome");
        $stmt->bindValue("curtir",$curtir);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function removerCurtido($curtir, $nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_nsfw SET curtidas = :curtir
        WHERE nome_imagem = :nome");
        $stmt->bindValue("curtir",$curtir);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function getCurtido($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT curtidas FROM imagens_nsfw WHERE nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['curtidas'];                  
    }
    function inserirVisualizacao($nome, $view){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE imagens_nsfw SET visualizacao = :view
        WHERE nome_imagem = :nome");
        $stmt->bindValue("view",$view);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function getViews($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT visualizacao FROM imagens_nsfw WHERE nome_imagem = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['visualizacao'];                  
    }
    function  getId($caminho){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM imagens_nsfw WHERE caminho = :nome");
        $stmt ->bindValue(":nome",$caminho);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['id'];  
    }
    
    function validarCategoria($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM categorias_nsfw WHERE nome = :nome");
        $stmt->bindValue(":nome",$this->nome = $nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rs){
            return true;
        }else{
            return false;
        } 
       
    }
}



