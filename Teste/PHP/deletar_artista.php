<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
include('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['categoria']; 
    try{
      for($i = 1; $i <= 6; $i++){
        if ($cat == $mus->getnomeDestaqueAutoaria($i)) {
          $mus->atualizarDestaquesA("destaque a ser defindo", "destaque a ser definido", $i);
        }
      }
        $mus->deletarFavoritaByAutoria($cat);
        $mus->deletarAutFavoritaByAutoria($cat);
        $mus->deletarMusicaByAutoria($cat);
        $mus->deletarAutoria($cat);
        header('Location: gerenciar_artista.php');

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