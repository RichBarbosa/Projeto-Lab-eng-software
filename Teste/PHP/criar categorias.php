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
    if ($img->validarCategoria($cat) == true) {
      $_SESSION['cat'] = $cat;
      header('Location: ../categorias.php');
    }else{ 
      try{
        $img->inserirNomeCategoria($cat);
        if (!empty($_SESSION['cat'])) {
          unset($_SESSION['cat']);
        }
        header('Location: ../categorias.php');

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