<?php
if(!isset($_SESSION)){
  session_start();
}
include('PHP\classes\Usuario.php');
include('PHP\classes\Imagem.php');
include('PHP\classes\Gif.php');

$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    
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
    <link rel="icon" href="img/bull-horns_39319.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="CSS/signin.css">
    
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Categorias</title>
    
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
      #tabImg{
        overflow: scroll;
        overflow-x: hidden;
        overflow-y: auto;
      }
      #tabGif{
        overflow: scroll;
        overflow-x: hidden;
        overflow-y: auto;
      }
    </style>
   
</head>
<body>
   <header id="top" >          
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php" id="a1">
                        <img src="img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                    <div class="d-grid gap-2 d-md-block">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropstart
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="index.php">Inicio</a></li>
                                <?php if($con->getAdmin($id)== "S") {?>
                                <li><a class="dropdown-item" href="PHP\gerenciar.php">Gerenciar Usuários</a></li>
                                <li><a class="dropdown-item" href="PHP\lista de usuario.php">Lista de usuários</a></li>
                                <li><a class="dropdown-item" href="categorias.php">Criar categoria</a></li>
                                <?php }?>
                                <li><a class="dropdown-item" href="PHP\favoritos.php">Favoritos</a></li>                                
                                <li><a class="dropdown-item" href="PHP\perfil.php">Perfil do usuário</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><button type="submit" class="dropdown-item"form ="logout">Logout</a></button>
                            </ul>
                          </div>
                          <form action="PHP\logout.php" method="POST" id="logout"></form>
                    </div>
                </div>
            </nav>
   </header> 
    <br><br><br>
   <main>
   <h1 id="Topo">Titulo qualquer</h1>
       <div class="container">
          <div style="text-align: center;"> 
            <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
            <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                 bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
            <p>bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla
                bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla </p>
          </div>
        </div>  
      <br>
      <br>
      <br>
    <hr>       
   <div class="container">
            <div class="row">
                <div class="col-4">
                    <h6>Editar Carrosseu de anime</h6>
                    <a class="nav-link" href="PHP\editar_inicio.php"><button class="btn btn-secondary">Editar</button></a>
                </div>
                <div class="col-4">
                    <h6>Editar Carrosseu de jogos</h6>
                    <a class="nav-link" href="PHP\editar_inicioJ.php"><button class="btn btn-secondary">Editar</button></a>

                </div>
                <div class="col-4">a</div>

            </div>
        </div>                                    
  </main>
  <br><br><br><br><br><br><br><br><br>
  <?php
  include_once('PHP/footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
</body>
</html> 
<?php
}else{ 
 header('Location: index.php');
}
?>