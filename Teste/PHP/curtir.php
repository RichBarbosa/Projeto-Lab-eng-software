<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
require_once('classes\Gif.php');
require_once('classes\Musica.php');

$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();
$mus = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if(!empty($_POST['curtirI'])){
      $idImagem = $_POST['curtirI'];
      $nome = $cat->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->inserirCurtido($nome, $id);
        header('Location: imagemEscolhida copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirI'])){
      $idImagem = $_POST['descurtirI'];
      $nome = $cat->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->removerCurtido($nome, $id);
        header('Location: imagemEscolhida copy.php');
      }catch(Exception $e){

      }
    }
    else if(!empty($_POST['curtirIJ'])){
      $idImagem = $_POST['curtirIJ'];
      $nome = $cat->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->inserirCurtido($nome, $id);
        header('Location: imagemJogoEscolhida copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirIJ'])){
      $idImagem = $_POST['descurtirIJ'];
      $nome = $cat->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->removerCurtido($nome, $id);
        header('Location: imagemJogoEscolhida copy.php');
      }catch(Exception $e){

      }
    }
    else if(!empty($_POST['curtirG'])){
      $idImagem = $_POST['curtirG'];
      $nome = $gif->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->inserirCurtido($nome, $id);
        header('Location: gifEscolhido copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirG'])){
      $idImagem = $_POST['descurtirG'];
      $nome = $gif->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->removerCurtido($nome, $id);
        header('Location: gifEscolhido copy.php');
      }catch(Exception $e){

      }
    }
    else if(!empty($_POST['curtirGJ'])){
      $idImagem = $_POST['curtirGJ'];
      $nome = $gif->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->inserirCurtido($nome, $id);
        header('Location: gifJogoEscolhido copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirGJ'])){
      $idImagem = $_POST['descurtirGJ'];
      $nome = $gif->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      try{
        $con->removerCurtido($nome, $id);
        header('Location: gifJogoEscolhido copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['curtirM'])){
      $idMusica = $_POST['curtirM'];
      $autoria = $mus ->getAutoriaById($idMusica);
      $nome = $mus->getNome($idMusica);      
      $_SESSION['musica'] = $idMusica;
      try{
        $con->inserirCurtido($nome, $id);
        header('Location: Letra.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirM'])){
      $idMusica = $_POST['descurtirM'];
      $autoria = $mus ->getAutoriaById($idMusica);
      $nome = $mus->getNome($idMusica);  
      $_SESSION['musica'] = $idMusica;
      try{
        $con->removerCurtido($nome, $id);
        header('Location: Letra.php');
      }catch(Exception $e){

      }
    }else {
      header('Location: ../index.php');
    }
  }else{
    header('Location: login.php');
  }       
?>