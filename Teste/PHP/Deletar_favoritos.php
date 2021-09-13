<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)){
  session_start();
}require_once('../PHP\classes\Imagem.php');
require_once('../PHP\classes\Usuario.php');
require_once('../PHP\classes\gif.php');

$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();
if(!empty( $_SESSION['nome'])){ 
  $id = $_SESSION['nome']; 
  
    

    $idImagem = null;
    $nome = null;


        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          
          try{
            $con->deletarFavoritaById($idImagem, $id);
            header('Location: favoritos.php');
          }catch(Exception $e){

          }

         
        }
    
}else{ 
 header('Location: ../index.php');
}
?>