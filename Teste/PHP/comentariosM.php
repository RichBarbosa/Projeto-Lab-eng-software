<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 

        if(!empty($_POST['comentario'])){
            $idMusica = $_POST['idMusica'];
            $autoria = $mus ->getAutoriaById($idMusica);
            $nome = $mus->getNome($autoria);
            $comentario = $_POST['comentario'];
            $data = date("Y-m-d");
            $_SESSION['musica'] = $idMusica;
          try{
            $con -> inserirComentario($comentario, $id, $nome, $data);
            header('Location: Letra.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['idCom'])){
            $idMusica = $_POST['idMusica'];
            $autoria = $mus ->getAutoriaById($idMusica);
            $nome = $mus->getNome($autoria);
            $idComentario = $_POST['idCom'];
            $_SESSION['musica'] = $idMusica;
            try{
                $con->deletarComentario($idComentario, $id);
                header('Location: Letra.php');
            }catch(Exception $e){
  
            }
  
           
        }else if(!empty($_POST['idComEdit'])){
            $idMusica = $_POST['idMusica'];
            $autoria = $mus ->getAutoriaById($idMusica);
            $nome = $mus->getNome($autoria);
            $idComentario = $_POST['idComEdit'];
            $comentario = $_POST['edit'];
            $edit = "S";
            $_SESSION['musica'] = $idMusica;
            if(!empty($comentario)){
   
                try{
                  $con->editarComentario($comentario, $id, $idComentario, $edit);
                  header('Location: Letra.php');
          
                }catch(Exception $e){
          
                }
            }else {
                header('Location: Letra.php'); 
            }
        }
  
}else{ 
 header('Location:  login.php');
}
?>