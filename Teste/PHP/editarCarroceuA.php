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
    if(!empty($_POST['imagem']) && $_POST['escolha']== "imagem1" ){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $cat->atualizarCarroceuA($caminho, $id, '1');
        header('Location: editar_inicio.php');

    }else if(!empty($_POST['imagem']) && $_POST['escolha'] == "imagem2"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $cat->atualizarCarroceuA($caminho, $id, '2');
        header('Location: editar_inicio.php');
 
    }elseif(!empty($_POST['imagem']) && $_POST['escolha']== "imagem3"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $cat->atualizarCarroceuA($caminho, $id, '3');
        header('Location: editar_inicio.php');

    }else {
     header('Location: editar_inicio.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>