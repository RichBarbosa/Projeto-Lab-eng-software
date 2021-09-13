<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
$con = new Usuario();
$cat = new Imagem();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 

        if(!empty($_POST['comentario'])){
            $idImagem = $_POST['idimagem'];
            $nImagem = $cat->getNome($idImagem);
            $nome = $cat->getNome($idImagem);
            $comentario = $_POST['comentario'];
            $_SESSION['imagem'] = $idImagem;
          try{
            $con -> inserirComentario($comentario, $id, $nome);
            header('Location: imagemEscolhida copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['idCom'])){
            $idImagem = $_POST['idImagem'];
            $nImagem = $cat->getNome($idImagem);
            $idComentario = $_POST['idCom'];
            $_SESSION['imagem'] = $idImagem;
            try{
                $con->deletarComentario($idComentario, $id);
                header('Location: imagemEscolhida copy.php');
            }catch(Exception $e){
  
            }
  
           
        }else if(!empty($_POST['idComEdit'])){
            $idImagem = $_POST['idImagem'];
            $nImagem = $cat->getNome($idImagem);
            $idComentario = $_POST['idComEdit'];
            $comentario = $_POST['edit'];
            $_SESSION['imagem'] = $idImagem;
            if(!empty($comentario)){
   
                try{
                  $con->editarComentario($comentario, $id, $idComentario);
                  header('Location: imagemEscolhida copy.php');
          
                }catch(Exception $e){
          
                }
            }else {
                header('Location: imagemEscolhida copy.php'); 
            }
        }
  
}else{ 
 header('Location:  login.php');
}
?>