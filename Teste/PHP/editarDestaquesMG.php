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
    if(!empty($_POST['genero']) && $_POST['destaque']== "destaque1" ){
        $genero = $_POST['genero'];
        //$cat->inserirDestaqueG($genero);
        $cat->atualizarDestaquesG($genero, '1');
        header('Location: ../index.php');

    }else if(!empty($_POST['genero']) && $_POST['destaque'] == "destaque2"){
        $autoria = $_POST['autoria'];
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesG($genero, '2');
        header('Location: ../index.php');
 
    }elseif(!empty($_POST['genero']) && $_POST['destaque']== "destaque3"){
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesG($genero, '3');
        header('Location: ../index.php');

    }else if(!empty($_POST['genero']) && $_POST['destaque'] == "destaque4"){
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesG($genero, '4');
        header('Location: ../index.php');
 
    }elseif(!empty($_POST['genero']) && $_POST['destaque']== "destaque5"){
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesG($genero, '5');
        header('Location: ../index.php');
    }
    elseif(!empty($_POST['genero']) && $_POST['destaque']== "destaque6"){
        $genero = $_POST['genero'];
        $cat->atualizarDestaquesG($genero, '6');
        header('Location: ../index.php');
    }else {
     header('Location: editarInicioMG.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>