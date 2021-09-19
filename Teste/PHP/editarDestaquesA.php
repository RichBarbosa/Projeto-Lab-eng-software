<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
$con = new Usuario();
$cat = new Imagem();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST['imagem']) && $_POST['destaque']== "destaque1" ){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '1');
        header('Location: ../Animes.php');

    }else if(!empty($_POST['imagem']) && $_POST['destaque'] == "destaque2"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '2');
        header('Location: ../Animes.php');
 
    }elseif(!empty($_POST['imagem']) && $_POST['destaque']== "destaque3"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '3');
        header('Location: ../Animes.php');

    }else if(!empty($_POST['imagem']) && $_POST['destaque'] == "destaque4"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '4');
        header('Location: ../Animes.php');
 
    }elseif(!empty($_POST['imagem']) && $_POST['destaque']== "destaque5"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '5');
        header('Location: ../Animes.php');
    }
    elseif(!empty($_POST['imagem']) && $_POST['destaque']== "destaque6"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '6');
        header('Location: ../Animes.php');
    }else {
     header('Location: editarInicio.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>