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
      if (!empty($_SESSION['catG'])) {
        unset($_SESSION['catG']);
      }
        $gif->deletarGifByCategoria($cat);
        $gif->deletarCategoria($cat);
        $gif->deletarCatFavoritaByCategoria($cat);
        header('Location: ../categorias.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: ../categorias.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>