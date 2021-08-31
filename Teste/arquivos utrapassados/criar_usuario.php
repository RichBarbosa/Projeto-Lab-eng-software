<?php
//essa pagina não é mais util, oq faz foi integrado na cadastro.php
include("classes\Usuario.php");


if(!empty($_POST))
{
    $nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
    $usuario = $_POST['usuario'];
    $termo = $_POST['termo'];
        try {
            $inserir = new Usuario();
            if($inserir->validarUsuario($email) == true ){
                header('Location: ../cadastro.php');
            ?>   
            <?php
            }else{
            $inserir->inserirUsuario($nome, $email, $senha, $termo, $usuario);
            header('Location: ../login.html');
            }
        } catch (Exception $e) {
            //header('Location: ../cadastro.html');
            /*?>
            <script>
                alert(<?php echo  ?>)
            </script>*/
            die('Erro: ' . $e->$e ->getMessage());

        }
}


