<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
$con = new Usuario();
$cat = new Imagem();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if(!empty($_POST['categoria'])){
        $categoria = $_POST['categoria'];

        if(!empty($_POST['favoritar'])){
          $idImagem = $_POST['favoritar'];
          $nome = $cat->getNomeJogo($idImagem);
          $caminho = $_POST['caminho'];
           $_SESSION['categoria'] = $categoria;
          try{           
            $cat->inserirFavorita($caminho, $nome, $id);
            header('Location: tema_categoria_jogo copy.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
            $idImagem = $_POST['id'];
            $nome = $cat->getNome($idImagem);
            $_SESSION['categoria'] = $categoria;
            try{
              $cat->deletarImagemFavorita($nome, $id);
              header('Location: tema_categoria_jogo copy.php');
            }catch(Exception $e){
  
            }
  
           
          }else if(!empty($_POST['favoritarCat'])){
            $favCat = $_POST['favoritarCat'];
            $_SESSION['categoria'] = $categoria;
                try{
                    $cat->inserirCatJogoFavorita($favCat, $id);
                    header('Location: tema_categoria_jogo copy.php');

           }catch(Exception $e){
                  } 
          }else if (!empty($_POST['nmCat'])){
            $_SESSION['categoria'] = $categoria;
            $favCat = $_POST['nmCat'];
              try{
                $cat->deletarCatJogoFavorita($favCat, $id);
                header('Location: tema_categoria_jogo copy copy.php');
              }catch(Exception $e){
  
              }
          }
       
    
 }else {
     header('Location: tema_categoria_jogo copy.php');
 } 
  
}else{ 
 header('Location: perfl.php');
}
?>