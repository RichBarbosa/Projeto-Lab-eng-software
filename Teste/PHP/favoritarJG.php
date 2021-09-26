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
          $nome = $cat->getNomeJogo($idImagem);
          $caminho = $_POST['caminho'];
          $TipoCat = $_POST['categoriaFavorito'];
          $tipo = $_POST['tipoFavorito'];
          $_SESSION['categoria'] = $categoria;
          try{
            $cat->inserirJogoFavorita($caminho, $nome, $id, $TipoCat, $tipo);
            header('Location: tema_categoria_jogoGif copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
            $idImagem = $_POST['id'];
            $nome = $cat->getNomeJogo($idImagem);
            $_SESSION['categoria'] = $categoria;
            try{
              $cat->deletarImagemJogoFavorita($nome, $id);
              header('Location: tema_categoria_jogoGif copy.php');
            }catch(Exception $e){
  
            }
  
           
          }else if(!empty($_POST['favoritarCat'])){
            $favCat = $_POST['favoritarCat'];
            $_SESSION['categoria'] = $categoria;
                try{
                    $cat->inserirCatJogoFavorita($favCat, $id);
                    header('Location: tema_categoria_jogoGif copy.php');

           }catch(Exception $e){
                  } 
          }else if (!empty($_POST['nmCat'])){
            $_SESSION['categoria'] = $categoria;
            $favCat = $_POST['nmCat'];
              try{
                $cat->deletarCatJogoFavorita($favCat, $id);
                header('Location: tema_categoria_jogoGif copy.php');
              }catch(Exception $e){
  
              }
          }
       
    
 }else {
     header('Location: tema_categoria_jogoGif copy.php');
 } 
  
}else{ 
 header('Location: login.php');
}
?>