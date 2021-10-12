<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
include('classes\Imagem.php');
$con = new Usuario();
$img = new Imagem();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['categoria']; 
    try{
      for($i = 1; $i <= 6; $i++){
        if ($cat == $img->getNomeDestaqueA($i)) {
          $img->atualizarDestaquesA("cat_apagada", "destaque a ser definido", $i);
        }
      }
      if (!empty($_SESSION['cat'])) {
        unset($_SESSION['cat']);
      }
        $img->deletarImagemByCategoria($cat);
        $img->deletarCategoria($cat);
        $img->deletarCatFavoritaByCategoria($cat);
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