<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Musica.php');
$con = new Usuario();
$cat = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST['autoria']) && $_POST['destaque']== "destaque1" ){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesAutoria($autoria, $genero, '1');
        header('Location: ../Musicas.php');

    }else if(!empty($_POST['autoria']) && $_POST['destaque'] == "destaque2"){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesAutoria($autoria, $genero, '2');
        header('Location: ../Musicas.php');
 
    }elseif(!empty($_POST['autoria']) && $_POST['destaque']== "destaque3"){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesAutoria($autoria, $genero, '3');
        header('Location: ../Musicas.php');

    }else if(!empty($_POST['autoria']) && $_POST['destaque'] == "destaque4"){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesAutoria($autoria, $genero, '4');
        header('Location: ../Musicas.php');
 
    }elseif(!empty($_POST['autoria']) && $_POST['destaque']== "destaque5"){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesAutoria($autoria, $genero, '5');
        header('Location: ../Musicas.php');
    }
    elseif(!empty($_POST['autoria']) && $_POST['destaque']== "destaque6"){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesAutoria($autoria, $genero, '6');
        header('Location: ../Musicas.php');
    }else {
     header('Location: editarInicioMA.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>