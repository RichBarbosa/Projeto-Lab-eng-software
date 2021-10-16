<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
$con = new Usuario();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    $IdUser = $_POST['del'];
    try{
      $con->deletarTodosComentario($IdUser);
      $con->deletarTodasFavoritas($IdUser);
      $con->deletarTodasNSFWFavoritas($IdUser);
      $con->deletarTodasCatNSFWFavoritas($IdUser);
      $con->deletarTodasCatFavoritas($IdUser);
      $con->deletarTodasCurtidas($IdUser);
      $con->deletarTodasAvaliacoes($IdUser);
      $con->deletarUsuario($IdUser);
        header('Location: logout.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: perfil.php');
 } 
  
?>