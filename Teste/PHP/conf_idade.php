<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Imagem.php');
$con = new Usuario();
$img = new Imagem();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getIdade($id) >= 18 ){
    if ($con->getConfirmacao($id) != "S" ) {
      $conf = "S";
      try{
        $con->inserirConfirmacao($conf, $id);
        header('Location: ../indexNSFW.php');

      }catch(Exception $e){
        header('Location: erro.html');
        die(); 
      }
    }else{
      header('Location: ../indexNSFW.php'); 
    }       
 }else {
     header('Location: ../index.php');
 } 
?>