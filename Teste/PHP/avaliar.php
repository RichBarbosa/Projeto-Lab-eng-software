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
    if($_POST['tipo'] == "imagem"){
      $voto = $_POST['voto'];
      $nome = $_POST['nome'];
      $idImagem = $_POST['idImagem'];
      $_SESSION['imagem'] = $idImagem;
  //verifica se o usuario ja votou, se sim entra em outro if se não adiciona o voto  
      if ($con->getNota($id, $nome) == true) {
  //verifica se o voto recebido é igual ao armazenado, se sim remove se não atualiza     
        if ($con->getNota($id, $nome) == $voto) {
          try {
            $con->removerNota($nome, $id);
            header("Location: imagemEscolhida copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }else{
          try {
            $con->trocarNota($nome, $voto, $id);
            header("Location: imagemEscolhida copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }
      }else{
        try {
          $con->inserirNota($id, $nome, $voto);
          header("Location: imagemEscolhida copy.php");
        } catch (Exception $e) {
          //throw $th;
        }
      }
      
    }else if($_POST['tipo'] == "gif"){
      $voto = $_POST['voto'];
      $nome = $_POST['nome'];
      $idImagem = $_POST['idImagem'];
      $_SESSION['imagem'] = $idImagem;
      //verifica se o usuario ja votou, se sim entra em outro if se não adiciona o voto  
      if ($con->getNota($id, $nome) == true) {
        //verifica se o voto recebido é igual ao armazenado, se sim remove se não atualiza     
        if ($con->getNota($id, $nome) == $voto) {
          try {
            $con->removerNota($nome, $id);
            header("Location: gifEscolhido copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }else{
          try {
            $con->trocarNota($nome, $voto, $id);
            header("Location: gifEscolhido copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }
      }else{
        try {
          $con->inserirNota($id, $nome, $voto);
          header("Location: gifEscolhido copy.php");
        } catch (Exception $e) {
          //throw $th;
        }
      }
    }
    else if($_POST['tipo'] == "imagemJ"){
      $voto = $_POST['voto'];
      $nome = $_POST['nome'];
      $idImagem = $_POST['idImagem'];
      $_SESSION['imagem'] = $idImagem;
      //verifica se o usuario ja votou, se sim entra em outro if se não adiciona o voto  
      if ($con->getNota($id, $nome) == true) {
        //verifica se o voto recebido é igual ao armazenado, se sim remove se não atualiza     
        if ($con->getNota($id, $nome) == $voto) {
          try {
            $con->removerNota($nome, $id);
            header("Location: imagemJogoEscolhida copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }else{
          try {
            $con->trocarNota($nome, $voto, $id);
            header("Location: imagemJogoEscolhida copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }
      }else{
        try {
          $con->inserirNota($id, $nome, $voto);
          header("Location: imagemJogoEscolhida copy.php");
        } catch (Exception $e) {
          //throw $th;
        }
      }      
    }else if($_POST['tipo'] == "gifJ"){
      $voto = $_POST['voto'];
      $nome = $_POST['nome'];
      $idImagem = $_POST['idImagem'];
      $_SESSION['imagem'] = $idImagem;
      //verifica se o usuario ja votou, se sim entra em outro if se não adiciona o voto  
      if ($con->getNota($id, $nome) == true) {
        //verifica se o voto recebido é igual ao armazenado, se sim remove se não atualiza     
        if ($con->getNota($id, $nome) == $voto) {
          try {
            $con->removerNota($nome, $id);
            header("Location: gifJogoEscolhido copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }else{
          try {
            $con->trocarNota($nome, $voto, $id);
            header("Location: gifJogoEscolhido copy.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }
      }else{
        try {
          $con->inserirNota($id, $nome, $voto);
          header("Location: gifJogoEscolhido copy.php");
        } catch (Exception $e) {
          //throw $th;
        }
      }
     
    }else if($_POST['tipo'] == "musica"){
      $voto = $_POST['voto'];
      $nome = $_POST['nome'];
      $idImagem = $_POST['idImagem'];
      $_SESSION['musica'] = $idImagem;
      //verifica se o usuario ja votou, se sim entra em outro if se não adiciona o voto  
      if ($con->getNota($id, $nome) == true) {
        //verifica se o voto recebido é igual ao armazenado, se sim remove se não atualiza     
        if ($con->getNota($id, $nome) == $voto) {
          try {
            $con->removerNota($nome, $id);
            header("Location: Letra.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }else{
          try {
            $con->trocarNota($nome, $voto, $id);
            header("Location: Letra.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }
      }else{
        try {
          $con->inserirNota($id, $nome, $voto);
          header("Location: Letra.php");
        } catch (Exception $e) {
          //throw $th;
        }
      }
    }else if($_POST['tipo'] == "NSFW"){
      $voto = $_POST['voto'];
      $nome = $_POST['nome'];
      $idImagem = $_POST['idImagem'];
      $_SESSION['NSFW'] = $idImagem;
      //verifica se o usuario ja votou, se sim entra em outro if se não adiciona o voto  
      if ($con->getNota($id, $nome) == true) {
        //verifica se o voto recebido é igual ao armazenado, se sim remove se não atualiza     
        if ($con->getNota($id, $nome) == $voto) {
          try {
            $con->removerNota($nome, $id);
            header("Location: NSFWEscolhido.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }else{
          try {
            $con->trocarNota($nome, $voto, $id);
            header("Location: NSFWEscolhido.php");
          } catch (Exception $e) {
            //throw $th;
          }
        }
      }else{
        try {
          $con->inserirNota($id, $nome, $voto);
          header("Location: NSFWEscolhido.php");
        } catch (Exception $e) {
          //throw $th;
        }
      }
    }else {
      header('Location: ../index.php');
    }
  }else{
    header('Location: login.php');
  }       
?>