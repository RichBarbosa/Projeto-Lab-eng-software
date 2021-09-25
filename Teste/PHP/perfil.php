<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
$con = new Usuario();
if(!empty( $_SESSION['nome'])){ 
  $id = $_SESSION['nome']; 
  
    if(!empty($_POST)){
      $nome = $_POST['nome'];
	    $email = $_POST['email'];
	    $senha = $_POST['senha'];
      $usuario = $_POST['usuario'];
      $genero = $_POST['genero'];
      $idade = $_POST['idade'];             
      $a = null;
    if(empty($nome)){
      $nome = $con->getNome($id);
    }
    if(empty($email)){
      $email =  $con->getEmail($id);
    }
    if(!empty($senha)){
      $con->atualizarSenhaById($senha, $id);
    }
    if(empty($usuario)){
      $usuario =  $con->getUser($id);
    }
    if(empty($genero)){
      $genero =  $con->getGenero($id);
    }
    if(empty($idade)){
      $idade =  $con->getIdade($id);
    }
      /*tenta armazenar no banco de dados, se funfar te manda pro login, se der pau
      te manda pra uma página de erro*/
        try {
           
          $con->atualizarNome($nome, $id);
          $con->atualizarEmail($email, $id);
          $con->atualizarUser($usuario, $id);
          $con->atualizarGenero($genero, $id);             
          $con->atualizarIdade($idade, $id);                
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
    
    <!--icone no título, mano eu to perplexo q é só essa tag link para colocar icones,
    krl, pq ninguém fala que é tão simples assim?-->
    <link rel="icon" href="../img/bull-horns_39319.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">
    
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Perfil</title>
    
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
                              <?php echo $con->getUser($id); ?>
                            </button>                          
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../index.php">Inicio</a></li>
                                <?php if($con->getAdmin($id)== "S") {?>
                                  <li><a class="dropdown-item" href="gerenciar.php">Gerenciar Usuários</a></li>
                                <li><a class="dropdown-item" href="lista de usuario.php">Lista de usuários</a></li>
                                <li><a class="dropdown-item" href="../escolher_categoria.php">Criar categoria</a></li>
                                <li><a class="dropdown-item" href="novo_genero.php">Criar genero musical</a></li>
                                <li><a class="dropdown-item" href="gerenciar_artista.php">Gerenciar artistas</a></li>
                                <li><a class="dropdown-item" href="gerenciar_musica.php">Gerenciar músicas</a></li>
                                <li><a class="dropdown-item" href="../escolher_Imagem.php">Gerenciar imagens</a></li>
                                <li><a class="dropdown-item" href="../escolher_gif.php">Gerenciar Gif</a></li>
                                <li><a class="dropdown-item" href="../escolher_carroceu.php">Gerenciar Carroceu</a></li>
                                <li><a class="dropdown-item" href="../escolher_destaque.php">Gerenciar Destaques</a></li>
                                <?php }?>
                                <li><a class="dropdown-item" href="favoritos.php">Favoritos</a></li>                                
                                <li><a class="dropdown-item" href="perfil.php">Perfil de usuário</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></button>
                            </ul>
                          </div>
                          </div>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <ul class="nav navbar-dark bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="../Jogos.php"><button class="btn btn-secondary" type="button">Jogos</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Animes.php"><button class="btn btn-secondary" type="button">Animes</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Musicas.php"><button class="btn btn-secondary" type="button">Musicas</button></a>
            </li>
        </ul>
  </div>
</div>
                </nav>
            </nav>
        
        <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>    
   </header>  
    <main>
    <table class="table">
      <tr>
        <th>Nome</th>
      </tr>
      <tr>
        <td><?php echo $con->getNome($id);?></td>
      </tr>
      <tr>
        <th>Usuário</th>
      </tr>
      <tr>
        <td><?php echo $con->getUser($id);?></td>
      </tr>
      <tr>
        <th>email</th>
      </tr>
      <tr>
        <td><?php echo $con->getEmail($id);?></td>
      </tr>
      <tr>
        <th>Idade</th>
      </tr>
      <tr>
        <td><?php echo $con->getIdade($id). " Anos";?></td>
      </tr>
      <tr>
        <th>Genero</th>
      </tr>
      <tr>
        <td><?php echo $con->getGenero($id);?></td>
      </tr>
      <tr>
        <td><button class="btn btn-outline-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">editar informações</button></td>
      </tr>
      <tr>
      <td><button class="btn btn-outline-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">excluir conta</button></td>
      </tr>
 
    </table>
    <div class="collapse" id="collapseExample">
  <div class="card card-body">
    <div class="container">
      <?php if($con->getAdmin($id) != "S"){ ?>
     tem certeza que deseja excluir sua conta?
     <?php }else{?>
      você atualmente é um administrador, tem certeza que deseja excluir sua conta?
      <?php }?>
      <div class="row">
        <div class="col-4">
        <button class="btn btn-outline-danger" type="submit" form="me_excluir">confirmar</button>

        <button class="btn btn-outline-danger" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">cancelar</button>

        </div>
      </div>
    </div>
  </div>
</div>
<form action="me_deletar.php" method="post" id="me_excluir">
  <input type="hidden" name="del" value="<?php echo $id?>">
</form>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Editar perfil</h5>
    
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <form action="perfil.php" method="POST">
  
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="nome"  autocomplete="off">
        <label for="floatingInput">Nome</label>
      </div>
     
        <div class="form-floating">
        <input type="email" class="form-control" id="floatingPassword"  name="email"  autocomplete="off">
        <label for="floatingPassword">Email</label>
      </div>
      <?php 
       /* if(!empty($a)){ ?>
       <div class="alert alert-success form-floating" role="alert">
      email já está cadastrado, <a href="login.php"> clique aqui se já possuir uma conta</a>
      </div>
      <?php }*/?>
      <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" name="usuario"   autocomplete="off">
      <label for="floatingInput">Nome de Usuário</label>
    </div>
    <div class="form-floating">
      <input type="number" class="form-control" id="floatingInput" name="idade" min="1" max="100"   autocomplete="off">
      <label for="floatingInput">Idade</label>
    </div>
     <div class="form-check">
  <input class="form-check-input" type="radio" name="genero" value="Masculino" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Masculino 
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genero" value="Feminino" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Femnino
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genero" value="Não Binário" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Não Binário 
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genero" value="Outro" id="flexRadioDefault2" >
  <label class="form-check-label" for="flexRadioDefault2">
    Outro 
  </label>
</div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword"   name="senha" autocomplete="off">
      <label for="floatingPassword">Senha</label>
    </div>      
      <button class="w-100 btn btn-lg btn-secondary" type="submit">editar</button>
      <div class="form-floating">
      </div>
    </form>
  </div>
</div>
    </main>
    <br><br>   
        <footer>
          
          <!--essa tag a faz voltar pro topo da página, simples.... oq? achou q eu ia fazer mais um comentário
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