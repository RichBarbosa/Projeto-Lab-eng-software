<?php
if(!isset($_SESSION)){
  session_start();
}include_once("classes\Usuario.php");

/*esse primeiro if serve pra verificar se o usuário ja ta logado, se sim, manda de volta pra index
se não, permite acessar a página de o cadastro*/
if(empty( $_SESSION['nome'])){

  if(!empty($_POST)){
    $nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
    $usuario = $_POST['usuario'];
    $termo = $_POST['termo'];
    $a = null;
      /*tenta armazenar no banco de dados, se funfar te manda pro login, se der pau
      te manda pra uma página de erro*/
        try {
            $inserir = new Usuario();
            /*verifica se o email informado já está cadastrado, caso exista uma string é armazenada*/
            if($inserir->validarUsuario($email) == true ){
              $a = "existe";
            ?>   
            <?php
            }else{
              //insere o usuario, ava, é mesmo? pensei que o nome inserirUsuario era auto explicativo
            $inserir->inserirUsuario($nome, $email, $senha, $termo, $usuario);
            header('Location: login.php');
            }
        } catch (Exception $e) {
            header('Location: erro.html');
            die();

        }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    <link rel="icon" href="../img/bull-horns_39319.ico" type="image/x-icon">
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Cadastrar-se</title>
    <!--um pouco de CSS no código mesmo, eu também to usando uma stylesheet separada mas né? 
      as vezes da preguiça de ficar trocando de arquivo-->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      #b1{
        font-family: Arial, Helvetica, sans-serif;
        font-size: medium;
      }
      #b2{
        font-family: Arial, Helvetica, sans-serif;
        font-size: medium;
      }
      #a1{
        font-family: Arial, Helvetica, sans-serif;
        font-size: x-large;
        padding: 0;
        border: 0;
      }
    </style>
       <link href="../CSS/signin.css" rel="stylesheet">

</head>
<body>
   <header id="top" >
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php" id="a1">
                        <img src="../img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                </div>
            </nav>
   </header> 
   
   <main class="form-signin">
    <form action="cadastro.php" method="POST">
      <h1 class="h3 mb-3 fw-normal">Cadastrar-se</h1>
  
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="nome" required autocomplete="off">
        <label for="floatingInput">Nome</label>
      </div>
     
        <div class="form-floating">
        <input type="email" class="form-control" id="floatingPassword"  name="email" required autocomplete="off">
        <label for="floatingPassword">Email</label>
      </div>
      <?php 
        /*lembra da val a? então, se exitir algo nela (tipo uma string chamada existe)
        significa que o usuario já existe, logo aparece um alerta pro usuário, simples mas funciona*/
        if(!empty($a)){ ?>
       <div class="alert alert-success form-floating" role="alert">
      email já está cadastrado, <a href="login.php"> clique aqui se já possuir uma conta</a>
      </div>
      <?php }?>
      <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="usuario"  required autocomplete="off">
      <label for="floatingInput">Nome de Usuário</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword"  required name="senha" autocomplete="off">
      <label for="floatingPassword">Senha</label>
    </div>
    <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="S" name="termo" required><a href="#">   li e concordo com os termos de uso</a>
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-secondary" type="submit">cadastrar</button>
      <div class="form-floating">
        <a href="login.php"> já possui uma conta? clique aqui</a>
      </div>
    </form>
  </main>
  <br>
  <br>
  <br>
        <footer>
          <!--esse link faz voltar pro topo da página, simples.... oq? achou q eu ia fazer mais um comentário
          ironizando ou zoando algo?-->
          <a href="#top"><button class="btn btn-secondary" type="button">voltar ao Topo</button></a>
          <a href="sobre.html"><button class="btn btn-secondary" type="button">Sobre nós</button></a>
          <ul>
            <li><a href="teste.html"><img src="../img/discord.svg" alt="discord logo"> </a></li>
            <li><a href="teste.html"><img src="../img/linkedin.svg" alt="linkedin logo"> </a></li>
            <li></li>
            <li></li>
          </ul>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
</body>
</html>
<?php
}else{ 
  header('Location: ../index.php');   
}
?>  