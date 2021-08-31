<?php
//essa pagina não é mais util, oq faz foi integrado na login.php
session_start();
include_once("classes\Usuario.php");
$conn = new Usuario();

//verifica se o usuario colocou os 2 campos
if(empty($_POST['email']) || empty($_POST['senha']) ){
    header('Location: ../login.html');
    exit();
}

$email =$_POST['email'];
$senha = $_POST['senha'];


$email = preg_replace('/[^[:alnum:]_.@]/','',$email);
$senha = addslashes($senha);

$result = $conn->logarUsuario($email,$senha);
$nome = $conn->getUser($email);

if($result){
$_SESSION['nome'] = $nome;
header('Location: ../index.php');
exit();

}
else{
    $_SESSION['erro'] = true;
    header('Location: ../Login.php');
}

?>