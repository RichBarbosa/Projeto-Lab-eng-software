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
        $cat->atualizarCarroceuA($caminho, $id, '4');
        header('Location: editar_inicioJ.php');

    }else if(!empty($_POST['imagem']) && $_POST['escolha'] == "imagem2"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $cat->atualizarCarroceuA($caminho, $id, '5');
        header('Location: editar_inicioJ.php');
 
    }elseif(!empty($_POST['imagem']) && $_POST['escolha']== "imagem3"){
        $id = $_POST['imagem'];
        $caminho = $cat->getCaminho($id);
        $cat->atualizarCarroceuA($caminho, $id, '6');
        header('Location: editar_inicioJ.php');

    }else {
     header('Location: editar_inicioJ.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>