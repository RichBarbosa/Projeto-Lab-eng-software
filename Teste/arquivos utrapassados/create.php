<?php
include("connect.php");
$bd= new connect();

if(!empty($_POST))
{
    $nome = $_POST['nome'];
	$email = $_POST['email'];
    $usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
    $termo = $_POST['termo'];

        try {
            $bd->inserir($nome, $email, $senha, $termo, $usuario);
        } catch (Exception $e) {
            die('ERRO: ' .$e ->getMessage());

        }
    }