<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
$con = new Usuario();
$cat = new Imagem();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST)){
        $idImagem = $_POST['excluir'];
       

        try{
            $cat->deletarImagem($idImagem);
            header('Location: gerenciar_imagens.php');
        }catch(Exception $e){

        }
    
 }else {
     header('Location: gerenciar_imagens.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>