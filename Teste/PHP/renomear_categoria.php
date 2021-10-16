<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Gif.php');
require_once('classes\Imagem.php');
require_once('classes\NSFW.php');
$con = new Usuario();
$gif = new Gif();
$img = new Imagem();
$nsfw = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){
    if (!empty($_SESSION['cat'])) {
        unset($_SESSION['cat']);
    }
    if (!empty($_SESSION['catG'])) {
        unset($_SESSION['catG']);
    }
    if (!empty($_SESSION['catJ'])) {
        unset($_SESSION['catJ']);
    }
    if (!empty($_SESSION['catJG'])) {
        unset($_SESSION['catJG']);
    }
    if (!empty($_SESSION['catN'])) {
        unset($_SESSION['catN']);
    } 
    if(!empty($_POST['novoNomeA'])){
        $nome = $_POST['novoNomeA'];
        $categoria = $_POST['categoria'];
        try{
            $img -> atualizarCategoria($nome, $categoria);
            $img -> atualizarCatImagem($nome, $categoria);
            $img -> atualizarCatFavorita($nome, $categoria);
            header('Location: ../categorias.php');
        }catch(Exception $e){

        }
        
    }else if(!empty($_POST['novoNomeGA'])){
        $nome = $_POST['novoNomeGA'];
        $categoria = $_POST['categoria'];
        try{
            $gif -> atualizarCategoria($nome, $categoria);
            $gif -> atualizarCatGif($nome, $categoria);
            $gif -> atualizarCatFavorita($nome, $categoria);
            header('Location: ../categorias.php'); 
        }catch(Exception $e){

        }
    }else if(!empty($_POST['novoNomeJ'])){
        $nome = $_POST['novoNomeJ'];
        $categoria = $_POST['categoria'];
        try{
            $img -> atualizarCategoriaJogo($nome, $categoria);
            $img -> atualizarCatImagemJogo($nome, $categoria);
            $img -> atualizarCatFavoritaJogo($nome, $categoria);
            header('Location: ../categorias_jogo.php');  
        }catch(Exception $e){

        }
    }else if(!empty($_POST['novoNomeGJ'])){
        $nome = $_POST['novoNomeGJ'];
        $categoria = $_POST['categoria'];
        try{
            $gif -> atualizarCategoriaJogo($nome, $categoria);
            $gif -> atualizarCatGifJogo($nome, $categoria);
            $gif -> atualizarCatFavoritaJogo($nome, $categoria);
            header('Location: ../categorias_jogo.php'); 
        }catch(Exception $e){

        }       
    }else if(!empty($_POST['novoNomeN'])){
        $nome = $_POST['novoNomeN'];
        $categoria = $_POST['categoria'];
        try{
            $nsfw -> atualizarCategoria($nome, $categoria);
            $nsfw -> atualizarCatImagem($nome, $categoria);
            $nsfw -> atualizarCatFavorita($nome, $categoria);
            header('Location: categorias_NSFW.php');
        }catch(Exception $e){

        }
    }
    else {
     header('Location: ../escolher_categorias.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>