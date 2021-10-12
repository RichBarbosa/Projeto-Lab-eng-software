<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Imagem.php');
$con = new Usuario();
$img = new Imagem();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['nome'];
    if ($img->validarCategoriaJogo($cat) == true ) {
      $_SESSION['catJ'] = $cat;
      header('Location: ../categorias_jogo.php');
    }else{ 
      try{
        $img->inserirNomeCategoriaJogo($cat);
        if (!empty($_SESSION['catJ'])) {
          unset($_SESSION['catJ']);
        }
        header('Location: ../categorias_jogo.php');

      }catch(Exception $e){
        header('Location: erro.html');
        die(); 
      }
    }
 }else {
     header('Location: gerenciar.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>