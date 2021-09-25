<?php
include("classes\Usuario.php");
include("classes\Imagem.php");
include_once("classes\Musica.php");
if(!isset($_SESSION)){
    session_start();
}
$con = new Usuario();
$mus = new Musica();
if(!empty( $_SESSION['nome'])){
    $id = $_SESSION['nome'];
    if (isset($_GET['idUser'])) {
      $idUser = $_GET['idUser'];
      $idMusica = $_GET['id'];
      if ($con->getAdmin($id) == "S" || $id == $idUser){
      $nomeM = $_GET['nome_musica'];
      $autoria = $mus->getAutoriaById($idMusica);  

    
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
    <title>Upload</title>
    
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
       <h1 id="Topo">Atualizar música: <?php echo $nomeM;?></h1>
       <div class="container">
          <div style="text-align: center;"> 
            <p>edite a música.
            </p>
          </div>
        </div>  
      <br>
      <br>
      <br>
      <div class="container">
        <div class="row">
            <div class="col-4">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-outline-success" form="musica">atualizar</button>
            <button type="reset" class="btn btn-outline-danger">redefinir</button>
            </div>
          </div>
        </div>
      </div>
    <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <form action="atualizar_musica.php" method="POST" id="musica">
                      <input type="hidden" name="idMusica" value="<?php echo $idMusica;?>">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" value="<?php echo $nomeM;?>" name="nome" placeholder="Nome da música" required autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText"
                                <?php if($mus->getLinkY($idMusica) != null || $mus->getLinkY($idMusica) != " "){ ?>
                                  value="<?php echo $mus->getLinkY($idMusica)?>"
                                  <?php }?>
                                name="youtube" placeholder="Link no Youtube (opcional)" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" name="streaming"
                                <?php if(!empty ($mus->getLinkS($idMusica))){ ?>
                                  value="<?php echo $mus->getLinkS($idMusica)?>"
                                  <?php }?> 
                                placeholder="Link em um aplicativo de streaming (opcional)" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                        <h6>letra da música </h6>
                          <textarea class="form-control" name="letraO"
                           id="com" cols="50" rows="70" required>
                           <?php echo $mus->getLetra($idMusica)?>
                          </textarea>
                        </div>
                        <div class="row mb-3">
                        </div>                                                                         
                        <div class="row mb-3">
                           
                        </div>
                        <div class="row mb-3">
                            
                        </div>
                    </form>
        </div>
        <div class="col-sm-6">
        <h6>tradução da música (opcional)</h6>
          <textarea class="form-control" name="letraT" id="com" cols="50" rows="70" form="musica">
          <?php if( empty($mus->getTraducao($idMusica))){ ?>
            <?php echo $mus->getTraducao($idMusica)?>
          <?php }?> 
          </textarea>
        </div>                                            
    </main>
    <br>
    <br>
    <br>
    <hr>

   
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>                           
    <script src="JavaScript/Scripts.js"></script>
</body>
</html> 
<?php  
    }
  }  
}else{ 
 header('Location: login.php');
}
?>