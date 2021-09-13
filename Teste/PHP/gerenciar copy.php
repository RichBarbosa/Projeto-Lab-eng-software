<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
$con = new Usuario();
$id = $_SESSION['nome'];
$IdUser =NULL;
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  $msg = "algo";
  if(!empty($_POST)){
    $email = $_POST['email'];
    try{
    $IdUser = $con->getId($email);
        if(!empty($IdUser)){
          $msg = "existe";
        }else{
          unset($msg);
          $msg = null;
        }

    }catch(Exception $e){
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
    
    <!--icone no título, mano eu to perplexo q é só essa tag link para colocar icones,
    krl, pq ninguém fala que é tão simples assim?-->
    <link rel="icon" href="../img/bull-horns_39319.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="../CSS/signin.css">
    
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Gerenciar</title>
    
    <!--um pouco de CSS no código mesmo, eu também to usando uma stylesheet separada mas né? 
      as vezes da preguiça de ficar trocando de arquivo-->
    <style>
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
   
</head>
<body>
   <header id="top" >          
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php" id="a1">
                        <img src="../img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                    <div class="d-grid gap-2 d-md-block">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropstart
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../index.php">Inicio</a></li>
                                <?php if($con->getAdmin($id)== "S") {?>
                                  <li><a class="dropdown-item" href="gerenciar.php">Gerenciar Usuários</a></li>
                                <li><a class="dropdown-item" href="lista de usuario.php">Lista de usuários</a></li>
                                <li><a class="dropdown-item" href="../escolher_categoria.php">Criar categoria</a></li>
                                <li><a class="dropdown-item" href="../escolher_Imagem.php">Gerenciar imagens</a></li>
                                <li><a class="dropdown-item" href="../escolher_gif.php">Gerenciar Gif</a></li>
                                <li><a class="dropdown-item" href="../escolher_carroceu.php">Gerenciar Carroceu</a></li>
                                <li><a class="dropdown-item" href="../escolher_destaque.php">Gerenciar Destaques</a></li>
                                <?php }?>
                                <li><a class="dropdown-item" href="favoritos.php">Favoritos</a></li>                                
                                <li><a class="dropdown-item" href="perfil.php">Perfil de usuário</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><button type="submit" class="dropdown-item"form ="logout">Logout</a></button>
                            </ul>
                          </div>
                          <form action="logout.php" method="POST" id="logout"></form>
                    </div>
                </div>
            </nav>
   </header> 
    <div class="container-fluid">
        <form class="d-flex" action="gerenciar.php" method="POST">
            <input class="form-control" type="search" placeholder="Search" name="email" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" type="submit">Buscar usuários</button>
        </form>
    </div>
   <main>
<?php 
      if($msg == null){ ?>
        <h3>Usuário não encontrado.</h3>
        <br><br><br><br><br><br><br><br><br>
<?php }else if($msg == "existe"){ ?>
        <table class="table">
          <tr>
            <th>Nome</th>
          </tr>
          <tr>
            <td><?php echo $con->getNome($IdUser);?></td>
          </tr>
          <tr>
            <th>Usuário</th>
          </tr>
          <tr>
            <td><?php echo $con->getUser($IdUser);?></td>
          </tr>
          <tr>
            <th>email</th>
          </tr>
          <tr>
            <td><?php echo $con->getEmail($IdUser);?></td>
          </tr>
          <tr>
            <th>Adm?</th>
          </tr>
          <tr>
            <td><?php echo $con->getAdmin($IdUser);?></td>
          </tr>
          <tr>
            <th>mais alguma coisa</th>
          </tr>
          <tr>
            <td>bla bla bla</td>
          </tr>
          <tr>
            <th>Ultima coisa</th>
          </tr>
          <tr>
            <td>bla bla bla </td>
          </tr>
          <tr>
            <?php if($id != $IdUser){ ?>
            <td><button class="btn  btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Deletar</button> </td>
          </tr>
          <tr>
            <?php if($con->getAdmin($IdUser)== "S") { ?>
        <td><button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight3" aria-controls="offcanvasRight">Rebaixar Usuário</button></td>
              <?php }else if($con->getAdmin($IdUser) != "S") { ?> 
        <td><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight">Promover para administrador</button></td>
        <?php     
            }   
            }?>
        </table>
      
<?php }else{ ?>
        <div class="container-fluid"> Inicie a consulta por usuários utilizando email</div>
        <br><br><br><br><br><br><br><br><br>
<?php }?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Deletar usuário</h5>
    
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php if($con->getAdmin($IdUser) != "S"){?> 
      <div class="form-floating">
        Você está preste a deletar o usuário de email <?php echo $con->getEmail($IdUser); ?>, tem certeza?
    </div>
    <?php }else{?>
      <div class="form-floating">
        Você está preste a deletar o administrador de email <?php echo $con->getEmail($IdUser); ?>, tem certeza?
      </div>
      <?php }?>
      <form action="deletar.php" method="POST"> 
      <input type="hidden" name="del" value="<?php echo $IdUser;?>">    
      <button class="w-100 btn btn-lg btn-danger" type="submit">Confirmar</button>
      </form>
    </div>         
</div>
<?php if($con->getAdmin($IdUser) != "S") { ?> 
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Promover Usuário</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="form-floating">
        Você está preste a promover o usuário de email <?php echo $con->getEmail($IdUser); ?> há administrador, tem certeza?
    </div>
      <form action="adm.php" method="POST">
      <input type="hidden" name="adm" value="S">     
      <input type="hidden" name="id" value="<?php echo $IdUser;?>">    
      <button class="w-100 btn btn-lg btn-primary" type="submit">Confirmar</button>
      </form>
   </div>
</div>
<?php } else if ($con->getAdmin($IdUser) == "S") {?>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight3" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Rebaixar Usuário</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <div class="form-floating">
        Você está preste a revogar o direito de adiministrador do usuário de email <?php echo $con->getEmail($IdUser); ?>, tem certeza?
    </div>
      <form action="adm.php" method="POST">
      <input type="hidden" name="adm" value="N">     
      <input type="hidden" name="id" value="<?php echo $IdUser;?>">    
      <button class="w-100 btn btn-lg btn-danger" type="submit">Confirmar</button>
      </form>
  </div>
</div>
<?php } ?>
  </main>
  <br><br><br><br><br><br><br><br><br>
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
</body>
</html> 
<?php
}else{ 
 header('Location: ../index.php');
}
?>