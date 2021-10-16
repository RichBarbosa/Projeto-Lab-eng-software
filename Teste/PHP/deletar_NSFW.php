<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
include('classes\NSFW.php');
$con = new Usuario();
$NSFW = new NSFW();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['categoria']; 
    try{
      for($i = 1; $i <= 6; $i++){
        if ($cat == $NSFW->getNomeDestaque($i)) {
          $NSFW->atualizarDestaques("destaque a ser definido", $i);
        }
      }
      if (!empty($_SESSION['catN'])) {
        unset($_SESSION['catN']);
      }
        $NSFW->deletarImagemByCategoria($cat);
        $NSFW->deletarCategoria($cat);
        $NSFW->deletarCatFavoritaByCategoria($cat);
        header('Location: categorias_NSFW.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: categorias_NSFW.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>