<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
$con = new Usuario();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $adm = $_POST['adm']; 
    $IdUser = $_POST['id'];
    try{
        $con->atualizarAdm($adm,$IdUser);
        header('Location: gerenciar.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: gerenciar.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>