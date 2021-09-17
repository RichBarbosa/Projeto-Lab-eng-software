<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Gif.php');
$con = new Usuario();
$cat = new Gif();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 

        if(!empty($_POST['comentario'])){
            $idImagem = $_POST['idimagem'];
            $nImagem = $cat->getNomeJogo($idImagem);
            $nome = $cat->getNomeJogo($idImagem);
            $comentario = $_POST['comentario'];
            $data = date("Y-m-d");
            $_SESSION['imagem'] = $idImagem;
          try{
            $con -> inserirComentario($comentario, $id, $nome, $data);
            header('Location: gifJogoEscolhido copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['idCom'])){
            $idImagem = $_POST['idImagem'];
            $nImagem = $cat->getNomeJogo($idImagem);
            $idComentario = $_POST['idCom'];
            $_SESSION['imagem'] = $idImagem;
            try{
                $con->deletarComentario($idComentario, $id);
                header('Location: gifJogoEscolhido copy.php');
            }catch(Exception $e){
  
            }
  
           
        }else if(!empty($_POST['idComEdit'])){
            $idImagem = $_POST['idImagem'];
            $nImagem = $cat->getNomeJogo($idImagem);
            $idComentario = $_POST['idComEdit'];
            $comentario = $_POST['edit'];
            $_SESSION['imagem'] = $idImagem;
            if(!empty($comentario)){
   
                try{
                  $con->editarComentario($comentario, $id, $idComentario);
                  header('Location: gifJogoEscolhido copy.php');
          
                }catch(Exception $e){
          
                }
            }else {
                header('Location: gifJogoEscolhido copy.php'); 
            }
        }
  
}else{ 
 header('Location:  login.php');
}
?>