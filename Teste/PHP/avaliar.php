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
     
    }
    else if($_POST['tipo'] == "imagemJ"){
      
    }else if($_POST['tipo'] == "gifJ"){
     
    }else if($_POST['tipo'] == "musica"){
     
    }
    else {
      header('Location: ../index.php');
    }
  }else{
    header('Location: login.php');
  }       
?>