<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
include('classes\Upload.php');
$con = new Usuario();
$id = $_SESSION['nome'];
  if(isset($_FILES['arquivo'])){
    $up = new Upload($_FILES['arquivo']);
      $tag1 = $_POST['tag1'];
      $tag2 = $_POST['tag2'];
      $tag3 = $_POST['tag3'];
      $tag4 = $_POST['tag4'];
      $tag5 = $_POST['tag5'];
      $categoria = $_POST['categoria'];
      $pasta = "../imagensJogo/";

    try{
      $up->uploadImagemJogo($pasta, $categoria, $tag1, $tag2, $tag3, $tag4, $tag5);
      header('Location: ../upload_jogo.php');

    }catch(Exception $e){
      header('Location: erro.html');
      die(); 
    }
    
 }else {
     header('Location: ../upload_jogo.php');
 } 
  
?>