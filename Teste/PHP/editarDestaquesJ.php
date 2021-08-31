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
        $cat->atualizarDestaquesA($caminho, $nome, '7');
        header('Location: editarInicioJ.php');

    }else if(!empty($_POST['imagem']) && $_POST['destaque'] == "destaque2"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '8');
        header('Location: editarInicioJ.php');
 
    }elseif(!empty($_POST['imagem']) && $_POST['destaque']== "destaque3"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '9');
        header('Location: editarInicioJ.php');

    }else if(!empty($_POST['imagem']) && $_POST['destaque'] == "destaque4"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '10');
        header('Location: editarInicioJ.php');
 
    }elseif(!empty($_POST['imagem']) && $_POST['destaque']== "destaque5"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '11');
        header('Location: editarInicioJ.php');
    }
    elseif(!empty($_POST['imagem']) && $_POST['destaque']== "destaque6"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $nome=$_POST['categoria'];
        $cat->atualizarDestaquesA($caminho, $nome, '12');
        header('Location: editarInicioJ.php');
    }else {
     header('Location: editarInicioJ.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>