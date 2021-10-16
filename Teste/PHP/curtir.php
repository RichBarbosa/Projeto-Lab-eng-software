<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
require_once('classes\Gif.php');
require_once('classes\Musica.php');
require_once('classes\NSFW.php');

$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();
$mus = new Musica();
$nsfw = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if(!empty($_POST['curtirI'])){
      $idImagem = $_POST['curtirI'];
      $nome = $cat->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $cat->getCurtido($nome);
      $curtir = $curtir + 1;
      try{
        $cat->inserirCurtido($curtir, $nome);
        $con->inserirCurtido($nome, $id);
        header('Location: imagemEscolhida copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirI'])){
      $idImagem = $_POST['descurtirI'];
      $nome = $cat->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $cat->getCurtido($nome);
      $curtir = $curtir - 1;
      try{
        $cat->removerCurtido($curtir, $nome);
        $con->removerCurtido($nome, $id);
        header('Location: imagemEscolhida copy.php');
      }catch(Exception $e){

      }
    }
    else if(!empty($_POST['curtirIJ'])){
      $idImagem = $_POST['curtirIJ'];
      $nome = $cat->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $cat->getJogoCurtido($nome);
      $curtir = $curtir + 1;
      try{
        $cat->inserirJogoCurtido($curtir, $nome);
        $con->inserirCurtido($nome, $id);
        header('Location: imagemJogoEscolhida copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirIJ'])){
      $idImagem = $_POST['descurtirIJ'];
      $nome = $cat->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $cat->getJogoCurtido($nome);
      $curtir = $curtir - 1;
      try{
        $cat->removerJogoCurtido($curtir, $nome);
        $con->removerCurtido($nome, $id);
        header('Location: imagemJogoEscolhida copy.php');
      }catch(Exception $e){

      }
    }
    else if(!empty($_POST['curtirG'])){
      $idImagem = $_POST['curtirG'];
      $nome = $gif->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $gif->getCurtido($nome);
      $curtir = $curtir + 1;
      try{
        $con->inserirCurtido($nome, $id);
        $gif->inserirCurtido($curtir, $nome);
        header('Location: gifEscolhido copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirG'])){
      $idImagem = $_POST['descurtirG'];
      $nome = $gif->getNome($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $gif->getCurtido($nome);
      $curtir = $curtir - 1;
      try{
        $gif->removerCurtido($curtir, $nome);
        $con->removerCurtido($nome, $id);
        header('Location: gifEscolhido copy.php');
      }catch(Exception $e){

      }
    }
    else if(!empty($_POST['curtirGJ'])){
      $idImagem = $_POST['curtirGJ'];
      $nome = $gif->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $gif->getJogoCurtido($nome);
      $curtir = $curtir + 1;
      try{
        $con->inserirCurtido($nome, $id);
        $gif->inserirJogoCurtido($curtir, $nome);
        header('Location: gifJogoEscolhido copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirGJ'])){
      $idImagem = $_POST['descurtirGJ'];
      $nome = $gif->getNomeJogo($idImagem);
      $_SESSION['imagem'] = $idImagem;
      $curtir = $gif->getJogoCurtido($nome);
      $curtir = $curtir - 1;
      try{
        $gif->removerJogoCurtido($curtir, $nome);
        $con->removerCurtido($nome, $id);
        header('Location: gifJogoEscolhido copy.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['curtirM'])){
      $idMusica = $_POST['curtirM'];
      $autoria = $mus ->getAutoriaById($idMusica);
      $nome = $mus->getNome($idMusica);      
      $_SESSION['musica'] = $idMusica;
      $curtir = $mus->getCurtido($idMusica);
      $curtir = $curtir + 1;
      try{
        $con->inserirCurtido($nome, $id);
        $mus->inserirCurtido($curtir, $idMusica);
        header('Location: Letra.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirM'])){
      $idMusica = $_POST['descurtirM'];
      $autoria = $mus ->getAutoriaById($idMusica);
      $nome = $mus->getNome($idMusica);  
      $_SESSION['musica'] = $idMusica;
      $curtir = $mus->getCurtido($idMusica);
      $curtir = $curtir - 1;
      try{
        $mus->removerCurtido($curtir, $idMusica);
        $con->removerCurtido($nome, $id);
        header('Location: Letra.php');
      }catch(Exception $e){

      }
    }
      else if(!empty($_POST['curtirN'])){
      $idImagem = $_POST['curtirN'];
      $nome = $nsfw->getNome($idImagem);
      $_SESSION['NSFW'] = $idImagem;
      $curtir = $nsfw->getCurtido($nome);
      $curtir = $curtir + 1;
      try{
        $nsfw->inserirCurtido($curtir, $nome);
        $con->inserirCurtido($nome, $id);
        header('Location: NSFWEscolhido.php');
      }catch(Exception $e){

      }
    }else if(!empty($_POST['descurtirN'])){
      $idImagem = $_POST['descurtirN'];
      $nome = $nsfw->getNome($idImagem);
      $_SESSION['NSFW'] = $idImagem;
      $curtir = $nsfw->getCurtido($nome);
      $curtir = $curtir - 1;
      try{
        $nsfw->removerCurtido($curtir, $nome);
        $con->removerCurtido($nome, $id);
        header('Location: NSFWEscolhido.php');
      }catch(Exception $e){

      }
    }
    else {
      header('Location: ../index.php');
    }
  }else{
    header('Location: login.php');
  }       
?>