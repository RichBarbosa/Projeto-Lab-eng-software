<?php
if(!isset($_SESSION)){
  session_start();
}include_once("classes\Usuario.php");

/*esse primeiro if serve pra verificar se o usuário ja ta logado, se sim, manda de volta pra index
se não, permite acessar a página de login*/
if(empty( $_SESSION['nome'])){

  if(!empty($_POST)){  
  $conn = new Usuario();

  
  $email =$_POST['email'];
  $senha = $_POST['senha'];
  
  //faz tratamento no email e na senha pra evitar sql injection
  $email = preg_replace('/[^[:alnum:]_.@]/','',$email);
  $senha = addslashes($senha);
  
  //faz o login do usuário
  $result = $conn->logarUsuario($email,$senha);

  //pega o id do usuario
  $nome = $conn->getId($email);
  $msg = null;
  
  if($result){
  $_SESSION['nome'] = $nome;
  header('Location: ../index.php');
  exit();
  
  }else{
      //$_SESSION['erro'] = true;
      $msg ="erro";
  }   
} 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/bull-horns_39319.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <title>Login</title>
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
      .lnr-eye{
        position: absolute;
        top: 20px;
        right: 10px;
        cursor: pointer;
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
    <form action="login.php" method="POST">
      <h1 class="h3 mb-3 fw-normal">Login</h1>
      <?php 
        /*lembra da val a? então, mesma lógica aqui so q em vez de val a agora é msg, pq n pensei nisso 
        quando fiz o val a*/
        if(!empty($msg)){ ?>
       <div class="alert alert-success form-floating" role="alert">
          usuário ou senha incorreto
      </div>
      <?php }?>
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" autocomplete="off">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password" autocomplete="off">
        <span class="lnr lnr-eye"></span>
        <label for="floatingPassword">Senha</label>
      </div>

      <button class="w-100 btn btn-lg btn-secondary" type="submit">Entrar</button>
      <div class="form-floating">
        <a href="esqueci_senha.php">Esqueceu a senha? clique aqui</a>
      </div>
      <div class="form-floating">
        <a href="cadastro.php">Não possui uma conta? clique aqui</a>
      </div>
  
    </form>
  </main>
  <br>
  <br>
  <br><br><br><br><br><br>
        <footer>
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
    <script>
        let btn = document.querySelector('.lnr-eye');
        btn.addEventListener('click', function() {
          let input = document.querySelector('#senha');
          
          if(input.getAttribute('type') == 'password'){
            input.setAttribute('type', 'text');
          }else{
            input.setAttribute('type', 'password');
          }
        });
    </script>  
</body>
</html>
<?php
}else{ 
  header('Location: ../index.php');   
}
?> 