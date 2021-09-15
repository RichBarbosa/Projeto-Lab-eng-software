<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
require_once('classes\Gif.php');

$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST['idImagem'])){
        $idImagem = $_POST['idImagem'];
        $categoria = $_POST['categoria'];
        try{
            
            $cat->moverImagem($categoria, $idImagem);
            header('Location: gerenciar_imagens.php');
        }catch(Exception $e){

        }
 }else if (!empty($_POST['idGif'])) {
        $idImagem = $_POST['idGif'];
        $categoria = $_POST['categoria'];
    try{
        $gif->moverGif($categoria, $idImagem);
        header('Location: gerenciar_gifs.php');
    }catch(Exception $e){

    }
 }else if(!empty($_POST['idJImagem'])){
    $idImagem = $_POST['idJImagem'];
    $categoria = $_POST['categoria'];
    try{
        $cat->moverImagemJogo($categoria, $idImagem);
        header('Location: gerenciar_imagens_jogo.php');
    }catch(Exception $e){

    }
 }else if(!empty($_POST['idJGif'])){
    $idImagem = $_POST['idJGif'];
    $categoria = $_POST['categoria'];
    try{
        $gif->moverGifJogo($categoria, $idImagem);
        header('Location: gerenciar_gifs_jogo.php');
    }catch(Exception $e){

    } }else {
     header('Location: ../index.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>