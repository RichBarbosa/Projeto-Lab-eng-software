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
    if(!empty($_POST['musica']) && $_POST['destaque']== "destaque1" ){
        $nome = $_POST['musica'];
        $autoria = $_POST['autoria'];
        $IdM = $_POST['idM'];
        //$cat->inserirDestaqueM($nome, $autoria, $genero);
        $cat->atualizarDestaquesM($nome, $autoria, $IdM, '1');
        header('Location: ../Musicas.php');

    }else if(!empty($_POST['musica']) && $_POST['destaque'] == "destaque2"){
        $nome = $_POST['musica'];
        $autoria = $_POST['autoria'];
        $IdM = $_POST['idM'];
        $cat->atualizarDestaquesM($nome, $autoria, $IdM, '2');
        header('Location: ../Musicas.php');
 
    }elseif(!empty($_POST['musica']) && $_POST['destaque']== "destaque3"){
        $nome = $_POST['musica'];
        $autoria = $_POST['autoria'];
        $IdM = $_POST['idM'];
        $cat->atualizarDestaquesM($nome, $autoria, $IdM, '3');
        header('Location: ../Musicas.php');

    }else if(!empty($_POST['musica']) && $_POST['destaque'] == "destaque4"){
        $nome = $_POST['musica'];
        $autoria = $_POST['autoria'];
        $IdM = $_POST['idM'];
        $cat->atualizarDestaquesM($nome, $autoria, $IdM, '4');
        header('Location: ../Musicas.php');
 
    }elseif(!empty($_POST['musica']) && $_POST['destaque']== "destaque5"){
        $nome = $_POST['musica'];
        $autoria = $_POST['autoria'];
        $IdM = $_POST['idM'];
        $cat->atualizarDestaquesM($nome, $autoria, $IdM, '5');
        header('Location: ../Musicas.php');
    }
    elseif(!empty($_POST['musica']) && $_POST['destaque']== "destaque6"){
        $nome = $_POST['musica'];
        $autoria = $_POST['autoria'];
        $IdM = $_POST['idM'];
        $cat->atualizarDestaquesM($nome, $autoria, $IdM, '6');
        header('Location: ../Musicas.php');
    }else {
     header('Location: editarInicioMA.php');
    } 
  
}else{ 
 header('Location: ../index.php');
}
?>