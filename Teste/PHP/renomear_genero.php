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
        $nome = $_POST['novoNomeA'];
        $categoria = $_POST['categoria'];
        try{
            $mus -> renomearGenero($nome, $categoria);
            $mus -> renomearGenAutoria($nome, $categoria);
            $mus -> renomearGenMusica($nome, $categoria);
            $mus -> renomearGenAutoriaFavorita($nome, $categoria);
            $mus -> renomearGenFavorita($nome, $categoria);
            header('Location: novo_genero.php');
        }catch(Exception $e){

        }
        
    }
    else {
     header('Location: novo_genero.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>