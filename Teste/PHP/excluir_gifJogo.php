<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Gif.php');
$con = new Usuario();
$cat = new Gif();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST)){
        $idImagem = $_POST['excluir'];
        $caminho = $cat->getCaminhoJogo($idImagem);
       

        try{
            $cat->deletarGifJogo($idImagem);
            if(file_exists($caminho)){
                if (unlink($caminho)){
                }else {
                    header('Location: gerenciar_gifs_jogo.php');
                }
            }    
            header('Location: gerenciar_gifs_jogo.php');
        }catch(Exception $e){

        }
    
 }else {
     header('Location: gerenciar_gifs_jogo.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>