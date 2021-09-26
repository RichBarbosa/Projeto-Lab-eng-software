<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
require_once('classes\Gif.php');

$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if($_POST['categoriaFavorito'] == "Anime" && $_POST['tipoFavorito'] == "Imagem"){
      $caminho = $_POST['favorito'];
      $idImagem = $cat->getId($caminho);  
      $_SESSION['imagem'] = $idImagem;
            
        header('Location: imagemEscolhida copy.php');

    }else if ($_POST['categoriaFavorito'] == "Anime" && $_POST['tipoFavorito'] == "Gif") {
      $caminho = $_POST['favorito'];
      $idImagem = $gif->getId($caminho);  
      $_SESSION['imagem'] = $idImagem;
      header('Location: gifEscolhido copy.php');
    }
    else if ($_POST['categoriaFavorito'] == "Jogo" && $_POST['tipoFavorito'] == "Imagem") {
        $caminho = $_POST['favorito'];
      $idImagem = $cat->getJogoId($caminho);  
      $_SESSION['imagem'] = $idImagem;
            
        header('Location: imagemJogoEscolhida copy.php');
    }
    else if ($_POST['categoriaFavorito'] == "Jogo" && $_POST['tipoFavorito'] == "Gif") {
        $caminho = $_POST['favorito'];
        $idImagem = $gif->getJogoId($caminho);  
        $_SESSION['imagem'] = $idImagem;
              
          header('Location: gifJogoEscolhido copy.php');
    }
    else {
      header('Location: favoritos.php');
    }
  }else{
    header('Location: login.php');
  }       
?>