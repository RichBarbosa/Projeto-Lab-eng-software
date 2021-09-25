<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST['novoNomeA'])){
        $autoria = $_POST['novoNomeA'];
        $Nautoria = $_POST['categoria'];
        try{
            $mus -> renomearAutoria($autoria, $Nautoria);
            $mus -> renomearAutMusica($autoria, $Nautoria);
            $mus -> renomearAutFavorita($autoria, $Nautoria);
            header('Location: gerenciar_artista.php');
        }catch(Exception $e){

        }
        
    }
    else {
     header('Location: gerenciar_autoria.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>