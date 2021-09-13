<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
$con = new Usuario();
$id = $_SESSION['nome'];
$IdUser =NULL;
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  $msg = "algo";
  if(!empty($_GET['busca'])){
    $busca = $_GET['busca'];
    try{
        if(!empty($con->buscarUsuario($busca))){
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
   <br><br>
   <h5 style="text-align:center">buscar usuários especificos</h5> 
    <div class="container-fluid">
        <form class="d-flex" action="gerenciar.php" method="GET">
            <input class="form-control" type="search" placeholder="buscar" name="busca" aria-label="Search" autocomplete="off">
            <button class="btn btn-outline-success" type="submit">Buscar usuários</button>
        </form>
        <?php 
      if($msg == null){ ?>
        <h3>Usuário não encontrado.</h3>
        <br><br><br><br><br><br><br><br><br>
<?php }else if($msg == "existe"){ ?>
  <form action="gerenciarUsuario.php" method="post">
                  <?php 
                    foreach ($con->buscarUsuario($busca) as $col) {?>
                      <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">
                          <button class="btn btn-outline-dark" type="submit" value="<?php echo $col['id'];?>" name="id" ><?php echo $con->getEmail($col['id']);?></button></li> 
                      </ul>
                  <?php }?>
              </form>
      
<?php } ?>
        <br><br><br><br><br>
        <form action="gerenciarUsuario.php" method="post">
          <h6 style="text-align:center">lista de usuário</h6>
        <select class="form-select" aria-label="Default select example" name= "id">
                                        <?php foreach($con->listarEmail() as $col){ ?>      
                                            <option value="<?php echo $col['id'];?>"><?php echo $col['email'];?></option>
                                        <?php }?>
                                    </select>
                                    <button type="submit " class="btn btn-secondary">buscar</button>
        </form>
    </div>
   <main>
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