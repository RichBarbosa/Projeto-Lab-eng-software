<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Gif.php');
$con = new Usuario();
$cat = new Gif();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 

        if(!empty($_POST['favoritar'])){
          $idImagem = $_POST['favoritar'];
          $caminho = $_POST['caminho'];
          $nome = $cat->getNome($idImagem);
          $nImagem = $cat->getNome($idImagem);
          $_SESSION['imagem'] = $idImagem;
          try{
            $cat->inserirFavorita($caminho, $nome, $id);
            header('Location: gifEscolhido copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNome($idImagem);
          $nImagem = $cat->getNome($idImagem);
            $_SESSION['imagem'] = $idImagem;
            try{
              $cat->deletarGifFavorito($nome, $id);
              header('Location: gifEscolhido copy.php');
            }catch(Exception $e){
  
            }
  
           
          }else{
            header('Location:  gifEscolhido copy.php');
 
          }
  
}else{ 
 header('Location:  login.php');
}
?>