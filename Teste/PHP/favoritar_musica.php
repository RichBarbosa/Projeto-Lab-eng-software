<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 

        if(!empty($_POST['favoritar'])){
          $idMusica = $_POST['idMusica'];
          $nome = $_POST['favoritar'];
          $autoria = $mus->getAutoriaById($idMusica);
          $genero = $mus->getGeneroByAutoria($autoria);
          $_SESSION['musica'] = $idMusica;
          try{
            $mus->inserirFavorita($nome, $autoria, $genero, $id, $idMusica);
            header('Location: Letra.php');
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['id'])){
          $idMusica = $_POST['id'];
          $autoria = $mus ->getAutoriaById($idMusica);
          $nome = $mus->getNome($idMusica);
            $_SESSION['musica'] = $idMusica;
            try{
              $mus->deletarMusicaFavorita($nome, $id);
              header('Location: Letra.php');
            }catch(Exception $e){
  
            }
  
           
          }else{
            header('Location: Letra.php');

          }
  
}else{ 
 header('Location:  login.php');
}
?>