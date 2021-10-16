<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\NSFW.php');
$con = new Usuario();
$cat = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST)){
        $idImagem = $_POST['id'];
        $tag1 = $_POST['tag1'];
        $tag2 = $_POST['tag2'];
        $tag3 = $_POST['tag3'];
        $tag4 = $_POST['tag4'];
        $tag5 = $_POST['tag5'];

        try{
            $cat->atualizarTag($tag1, $tag2, $tag3, $tag4, $tag5, $idImagem);
            header('Location: ger_NSFW.php');
        }catch(Exception $e){

        }
    
 }else {
     header('Location: gerenciar_imagens.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>