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
        if ($cat == $mus->getnomeDestaqueG($i)) {
          $mus->atualizarDestaquesM("destaque a ser defindo", $i);
        }
      }
        $mus->deletarFavoritaByGenero($cat);
        $mus->deletarAutFavoritaByGenero($cat);
        $mus->deletarMusicaByGenero($cat);
        $mus->deletarAutoriaByGenero($cat);
        $mus->deletarGenero($cat);
        header('Location: novo_genero.php');

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