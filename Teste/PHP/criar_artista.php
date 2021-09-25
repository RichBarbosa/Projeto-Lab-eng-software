<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
  if(!empty($_POST)){
     $autoria = $_POST['nome'];
     $genero = $_POST['genero'];  
    try{
        $mus->criarAutoria($autoria, $genero);
        header('Location: ../index.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: escolher_genero.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>