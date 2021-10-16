<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\NSFW.php');

$con = new Usuario();
$cat = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if($_POST['categoriaFavorito'] == "NSFW"){
      $caminho = $_POST['favorito'];
      $idImagem = $cat->getId($caminho);  
      $_SESSION['NSFW'] = $idImagem;
            
        header('Location: NSFWescolhido.php');

    }
    else {
      header('Location: favoritosNSFW.php');
    }
  }else{
    header('Location: login.php');
  }       
?>