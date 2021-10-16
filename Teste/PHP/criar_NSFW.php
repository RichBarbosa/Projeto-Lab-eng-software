<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\NSFW.php');
$con = new Usuario();
$NSFW = new NSFW();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['nome'];
    if ($NSFW->validarCategoria($cat) == true) {
      $_SESSION['catN'] = $cat;
      header('Location: categorias_NSFW.php');
    }else{ 
      try{
        $NSFW->inserirNomeCategoria($cat);
        if (!empty($_SESSION['catN'])) {
          unset($_SESSION['catN']);
        }
        header('Location: categorias_NSFW.php');

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