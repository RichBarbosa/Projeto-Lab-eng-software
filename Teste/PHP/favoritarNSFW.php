<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\NSFW.php');
$con = new Usuario();
$cat = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if(!empty($_POST['categoria'])){
        $categoria = $_POST['categoria'];

        if(!empty($_POST['favoritar'])){
          $idImagem = $_POST['favoritar'];
          $nome = $cat->getNome($idImagem);
          $caminho = $_POST['caminho'];
          $TipoCat = $_POST['categoriaFavorito'];
          $tipo = $_POST['tipoFavorito'];
           $_SESSION['categoriaN'] = $categoria;
          try{           
            $cat->inserirFavorita($caminho, $nome, $id, $TipoCat, $tipo);
            header('Location: tema_NSFW.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
            $idImagem = $_POST['id'];
            $nome = $cat->getNome($idImagem);
            $_SESSION['categoriaN'] = $categoria;
            try{
              $cat->deletarImagemFavorita($nome, $id);
              header('Location: tema_NSFW.php');
            }catch(Exception $e){
  
            }
  
           
          }else if(!empty($_POST['favoritarCat'])){
            $favCat = $_POST['favoritarCat'];
            $_SESSION['categoriaN'] = $categoria;
                try{
                    $cat->inserirCatFavorita($favCat, $id);
                    header('Location: tema_NSFW.php');

           }catch(Exception $e){
                  } 
          }else if (!empty($_POST['nmCat'])){
            $_SESSION['categoriaN'] = $categoria;
            $favCat = $_POST['nmCat'];
              try{
                $cat->deletarCatFavorita($favCat, $id);
                header('Location: tema_NSFW.php');
              }catch(Exception $e){
  
              }
          }
       
    
 }else {
     header('Location: tema_NSFW.php');
 } 
  
}else{ 
 header('Location: perfl.php');
}
?>