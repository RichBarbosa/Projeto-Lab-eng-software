<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\NSFW.php');
$con = new Usuario();
$cat = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST['categoria']) && $_POST['destaque']== "destaque1" ){
        $nome=$_POST['categoria'];
        //$cat->inserirDestaque($nome);
        $cat->atualizarDestaques($nome, '1');
        header('Location: ../indexNSFW.php');

    }else if(!empty($_POST['categoria']) && $_POST['destaque'] == "destaque2"){
        $nome=$_POST['categoria'];
        $cat->atualizarDestaques($nome, '2');
        header('Location: ../indexNSFW.php');
 
    }elseif(!empty($_POST['categoria']) && $_POST['destaque']== "destaque3"){
        $nome=$_POST['categoria'];
        $cat->atualizarDestaques($nome, '3');
        header('Location: ../indexNSFW.php');

    }else if(!empty($_POST['categoria']) && $_POST['destaque'] == "destaque4"){
        $nome=$_POST['categoria'];
        $cat->atualizarDestaques($nome, '4');
        header('Location: ../indexNSFW.php');
 
    }elseif(!empty($_POST['categoria']) && $_POST['destaque']== "destaque5"){
        $nome=$_POST['categoria'];
        $cat->atualizarDestaques($nome, '5');
        header('Location: ../indexNSFW.php');
    }
    elseif(!empty($_POST['categoria']) && $_POST['destaque']== "destaque6"){
        $nome=$_POST['categoria'];
        $cat->atualizarDestaques($nome, '6');
        header('Location: ../indexNSFW.php');
    }else {
     header('Location: editarInicio.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>