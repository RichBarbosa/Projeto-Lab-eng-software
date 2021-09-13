<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
$con = new Usuario();
$cat = new Imagem();

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
            header('Location: imagemEscolhida copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNome($idImagem);
          $nImagem = $cat->getNome($idImagem);
            $_SESSION['imagem'] = $idImagem;
            try{
              $cat->deletarImagemFavorita($nome, $id);
              header('Location: imagemEscolhida copy.php');
            }catch(Exception $e){
  
            }
  
           
          }else{
            header('Location: imagemEscolhida copy.php');

          }
  
}else{ 
 header('Location:  login.php');
}
?>