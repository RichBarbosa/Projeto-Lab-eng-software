<?php
include_once("Connect.php");

class Usuario extends Connect  {
    private $nome;
    private $senha;
    private $email;
    private $user;
    private $id;


    function __construct(){
           
    }
    //função de verificar a existencia de usuarios
    function validarUsuario($email){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt->bindValue(":email",$this->email = $email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rs){
            return true;
        }else{
            return false;
        } 
       
    }
        //função inserção de novos usuarios
    function inserirUsuario( $nome,  $email,  $senha,  $termo,  $user){
            $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
            $stmt = $conn->prepare("INSERT INTO usuario (id, nome, email, senha, termo, user) VALUES (null, :nome, :email, :senha, :termo, :user)");
            $stmt ->bindValue(":nome",$this->nome = $nome);
            $stmt ->bindValue(":email",$this->email = $email);
            $stmt ->bindValue(":senha",sha1($this->senha = $senha));
            $stmt ->bindValue(":termo",$termo);
            $stmt ->bindValue(":user",$this->user = $user);
            $run = $stmt->execute();
            $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rs;          
    }
        //função que valida o login do usuário
    function logarUsuario($email, $senha){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
        $stmt ->bindValue(":email",$this->email = $email);
        $stmt ->bindValue(":senha",sha1($this->senha = $senha));
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    //pega o id de usuário
    function getId($email){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt ->bindValue(":email",$this->email=$email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['id'];                  
    }
    //pega o nome do usuário
    function getNome($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id=$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];                  
    }
    //pega o email do usuário
    function getEmail($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id=$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['email'];                  
    }
    //pega o nome de usuário do usuário
    function getUser($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id=$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['user'];                  
    }
    //cria uma chave de acesso utilizando o hash do email e da senha    
    function gerarChave($email){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt ->bindValue(":email",$this->email=$email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rs){
            $chave = sha1($rs["email"].$rs["senha"]);
            return $chave;

        }else{
            return $chave = false;
        }
    }
    //confirma se a chave informada bate com a chave real
    function confirmarChave($email, $chave){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = :email");
        $stmt ->bindValue(":email",$this->email= $email);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);

        if($rs){
            $chaveCorreta = sha1($rs["email"].$rs["senha"]);
            if($chave == $chaveCorreta){
            return $rs['email'];
            }

        }
    }
    //altera a senha do usuário
    function alterarSenha($email, $senha){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET senha = :senha WHERE email = :email");
         $stmt ->bindValue(":email",$this->email = $email);
        $stmt ->bindValue(":senha",sha1($this->senha = $senha));      
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    //atualiza o nome do usuario
    function atualizarNome($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET nome = :nome WHERE id = :id");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //atualiza o email do usuário.... eu realmente preciso explicar isso? poh, o nomes são auto explicativos
    function atualizarEmail($email, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET email = :email WHERE id = :id");
        $stmt ->bindValue(":email",$email);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /* vc deve ta pensando, pq tem 2 atualizar senha? Bom, se a explicação q um atualiza
    com email e o outro com id não for suficiente, bem, eu fiz o primeiro pra trocar
    a senha se o usuário esqueceu, massss, quando eu fui fazer o de trocar normalmente eu percebi
    que seria mais prático com o id e bateu preguiça de mudar um monte de coisa pra isso */
    function atualizarSenhaById($senha, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET senha = :senha WHERE id = :id");
        $stmt ->bindValue(":senha",sha1($this->senha = $senha));      
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // eu já falei q é auto explicativo...
    function atualizarUser($user, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET user = :user WHERE id = :id");
        $stmt ->bindValue(":user",$user);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAdmin($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id=$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['administrador'];                  
    }
   
    function  listarEmail(){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id, nome, email, user, administrador  FROM usuario ORDER BY email ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function atualizarAdm($administrador, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET administrador = :administrador WHERE id = :id");
        $stmt ->bindValue(":administrador",$administrador);
        $stmt ->bindValue(":id",$this->id = $id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function deletarUsuario($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id = $id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarIdade($idade, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET idade = :idade WHERE id = :id");
        $stmt ->bindValue(":idade",$idade);
        $stmt ->bindValue(":id",$this->id = $id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function atualizarGenero($genero, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE usuario SET genero = :genero WHERE id = :id");
        $stmt ->bindValue(":genero",$genero);
        $stmt ->bindValue(":id",$this->id = $id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getGenero($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id=$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['genero'];                  
    }
    function getIdade($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt ->bindValue(":id",$this->id=$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['idade'];                  
    }
    function inserirComentario( $comentario,  $idUser,  $nomeI, $data){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO comentarios (id_com, comentario, idUser, nome_imagem, data_atual) VALUES (null, :comentario, :idUser, :nome_gif, :data_atual)");
        $stmt ->bindValue(":comentario",$comentario);
        $stmt ->bindValue(":idUser",$idUser);
        $stmt ->bindValue(":nome_gif",$nomeI);
        $stmt ->bindValue(":data_atual",$data);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function  getComentario($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT comentarios.comentario,comentarios.id_com, comentarios.data_atual, 
        comentarios.editado, usuario.user, usuario.id
        FROM comentarios INNER JOIN usuario ON comentarios.idUser = usuario.id
        WHERE nome_imagem = '$nome' OR nome_gif = '$nome'");               
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarComentario($id, $idUser){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM comentarios WHERE id_com = :id_com AND idUser = :idUser");
        $stmt ->bindValue(":id_com",$id);
        $stmt ->bindValue(":idUser",$idUser);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function editarComentario($comentario, $idUser, $id, $edit){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE comentarios SET comentario = :comentario, editado = :edit WHERE idUser = :idUser AND id_com = :id_com");
        $stmt ->bindValue(":comentario",$comentario);
        $stmt ->bindValue(":idUser",$idUser);
        $stmt ->bindValue(":id_com",$id);
        $stmt ->bindValue(":edit",$edit);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  buscarUsuario($inicial){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT id 
        FROM usuario
        WHERE email LIKE  '$inicial%' OR user LIKE  '$inicial%'
        ORDER BY email ASC");
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function deletarTodosComentario($idUser){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM comentarios WHERE idUser = :idUser");
        $stmt ->bindValue(":idUser",$idUser);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarTodasFavoritas($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime_favorita WHERE id = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarTodasCatFavoritas($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM cat_favorita WHERE id_user = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarFavoritaById($id, $id_user){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM imagens_anime_favorita WHERE id_favorito = :id AND id = :id_user");
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":id_user",$id_user);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function inserirCurtido( $nome,  $idUser){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO curtidos VALUES (null, :nome, :idUser)");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":idUser",$idUser);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;          
    }
    function getCurtido($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM curtidos WHERE nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);        
        return $rs;                  
    }
    function  verificarCurtido($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT * FROM curtidos WHERE idUser = :id AND nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nome'];  
    }
    function  removerCurtido($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM curtidos WHERE idUser = :id AND nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function  deletarTodasCurtidas($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM curtidos WHERE idUser = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getNota($id, $nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT nota FROM avaliacao 
        WHERE idUser = :id AND nome = :nome ");
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['nota'];                  
    }
    function inserirNota($id, $nome, $nota){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("INSERT INTO avaliacao 
        VALUES (null, :nome, :nota, :id)");
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":nota",$nota);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
    }
    function  removerNota($nome, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM avaliacao WHERE idUser = :id AND nome = :nome");
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function trocarNota($nome, $nota, $id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("UPDATE avaliacao SET nota = :nota WHERE nome = :nome AND idUser = :id");
        $stmt ->bindValue(":id",$id);
        $stmt ->bindValue(":nome",$nome);
        $stmt ->bindValue(":nota",$nota);      
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rs;
    }
    function getMediaNota($nome){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("SELECT AVG(nota) FROM avaliacao 
        WHERE nome = :nome ");
        $stmt ->bindValue(":nome",$nome);
        $run = $stmt->execute();
        $rs = $stmt->fetch(PDO::FETCH_ASSOC);        
        return $rs['AVG(nota)'];                  
    }
    //obs, vc n fez um pra deletar a o conteudo pq provavelmente em uma situação real poderia buga.
    function  deletarTodasAvaliacoes($id){
        $conn = new PDO('mysql:host='.$this->servidor.';dbname='.$this->banco, $this->usuario, $this->password);
        $stmt = $conn->prepare("DELETE FROM avaliacao WHERE idUser = :id");
        $stmt ->bindValue(":id",$id);
        $run = $stmt->execute();
        $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }        
}