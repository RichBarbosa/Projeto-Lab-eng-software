<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
include('classes\Gif.php');
$con = new Usuario();
$gif = new Gif();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['categoria2']; 
    try{
      if (!empty($_SESSION['catJG'])) {
        unset($_SESSION['catJG']);
      }
        $gif->deletarGifByCategoriaJogo($cat);
        $gif->deletarCategoriaJogo($cat);
        $gif->deletarCatJogoFavoritaByCategoria($cat);
        header('Location: ../categorias_jogo.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: ../categorias_jogo.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>