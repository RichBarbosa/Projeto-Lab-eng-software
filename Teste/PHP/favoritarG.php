<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Gif.php');
$con = new Usuario();
$cat = new Gif();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if(!empty($_POST['categoria'])){
        $categoria = $_POST['categoria'];

        if(!empty($_POST['favoritar'])){
          $idImagem = $_POST['favoritar'];
          $nome = $cat->getNome($idImagem);
          $caminho = $_POST['caminho'];
          $_SESSION['categoria'] = $categoria;
          try{
            $cat->inserirFavorita($caminho, $nome, $id);
            header('Location: tema_categoria_gif copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
            $idImagem = $_POST['id'];
            $nome = $cat->getNome($idImagem);
            $_SESSION['categoria'] = $categoria;
            try{
              $cat->deletarGifFavorito($nome, $id);
              header('Location: tema_categoria_gif copy.php');
            }catch(Exception $e){
  
            }
  
           
          }else if(!empty($_POST['favoritarCat'])){
            $favCat = $_POST['favoritarCat'];
            $_SESSION['categoria'] = $categoria;
                try{
                    $cat->inserirCatFavorita($favCat, $id);
                    header('Location: tema_categoria_gif copy.php');

           }catch(Exception $e){
                  } 
          }else if (!empty($_POST['nmCat'])){
            $_SESSION['categoria'] = $categoria;
            $favCat = $_POST['nmCat'];
              try{
                $cat->deletarCatFavorita($favCat, $id);
                header('Location: tema_categoria_gif copy.php');
              }catch(Exception $e){
  
              }
          }
       
    
 }else {
     header('Location: tema_categoria_gif copy.php');
 } 
  
}else{ 
 header('Location: login.php');
}
?>