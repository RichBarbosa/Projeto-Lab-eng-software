<?php
include("classes\Usuario.php");
$conn= new Usuario();

if(!empty($_POST)){
    $email =$_POST['nome'];
    $chave =$_POST['chave'];
	$senhanova = $_POST['senha'];
	$confirmarsenha = $_POST['senhanova'];
    if($senhanova== $confirmarsenha){
        $senha = $senhanova;

        $result = $conn->confirmarChave($email, $chave);
    if($result){
        try {
        $conn->alterarSenha($result, $senha);
        header('Location: login.php');
        } catch (Exception $e) {
             die();
             header('Location: ../erro.html');
        }
    }

}else{ ?>
    <script>alert('as senhas não batem')</script>
   <?php header('Location: redefinir.php');
}
}?>
