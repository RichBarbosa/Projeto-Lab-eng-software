<?php
    include_once("classes\Usuario.php");
    $conn = new Usuario();
    
    $email =$_POST['email'];

    $email = preg_replace('/[^[:alnum:]_.@]/','',$email);    
    $chave = $conn->gerarChave($email);  
    
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
    <title>Redefinir Senha</title>
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
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
            </nav>
    <ul class="nav navbar-dark bg-dark">
      <li class="nav-item">
        <a class="nav-link" href="teste.html"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
      </li>
    </ul>    
   </header> 
   
   <main class="form-signin">
    <form action="senha.php" method="POST">
      <h1 class="h3 mb-3 fw-normal">redefina sua senha.
      </h1>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword"  name="senha" required autocomplete="off">
        <label for="floatingPassword">Senha</label>
      </div>
      <?php if($chave){ ?>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword"  name="senhanova" required>
        <label for="floatingPassword">Confirmar senha</label>
        <input type="hidden" name="nome" value="<?php echo $email; ?>">
        <input type="hidden" name="chave" value="<?php echo $chave; ?>">
      </div>
      <button class="w-100 btn btn-lg btn-secondary" type="submit">Redefinir</button>
  
    </form>
     <?php 
    }else{
      header('Location: esqueci_senha.php');
    }
    ?>
  </main>
<br>
<br>
<br>
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
