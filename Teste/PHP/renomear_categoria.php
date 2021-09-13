<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Gif.php');
require_once('classes\Imagem.php');
$con = new Usuario();
$gif = new Gif();
$img = new Imagem();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
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
    }
    else {
     header('Location: ../escolher_categorias.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>