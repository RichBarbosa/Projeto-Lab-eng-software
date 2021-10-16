<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)){
  session_start();
}require_once('../PHP\classes\NSFW.php');
require_once('../PHP\classes\Usuario.php');

$con = new Usuario();
$cat = new NSFW();
if(!empty( $_SESSION['nome'])){ 
  $id = $_SESSION['nome']; 
  
    

    $idImagem = null;
    $nome = null;


        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          
          try{
            $con->deletarFavoritaNSFWById($idImagem, $id);
            header('Location: favoritosNSFW.php');
          }catch(Exception $e){

          }

         
        }
    
}else{ 
 header('Location: ../index.php');
}
?>