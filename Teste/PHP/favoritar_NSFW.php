<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\NSFW.php');
$con = new Usuario();
$cat = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 

        if(!empty($_POST['favoritar'])){
          $idImagem = $_POST['favoritar'];
          $caminho = $_POST['caminho'];
          $nome = $cat->getNome($idImagem);
          $nImagem = $cat->getNome($idImagem);
          $categoria = $_POST['categoriaFavorito'];
          $tipo = $_POST['tipoFavorito'];
          $_SESSION['NSFW'] = $idImagem;
          try{
            $cat->inserirFavorita($caminho, $nome, $id, $categoria, $tipo);
            header('Location: NSFWEscolhido.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNome($idImagem);
          $nImagem = $cat->getNome($idImagem);
            $_SESSION['NSFW'] = $idImagem;
            try{
              $cat->deletarImagemFavorita($nome, $id);
              header('Location: NSFWEscolhido.php');
            }catch(Exception $e){
  
            }
  
           
          }else{
            header('Location: NSFWEscolhido.php');

          }
  
}else{ 
 header('Location:  login.php');
}
?>