<?php
include("PHP\classes\Usuario.php");
if(!isset($_SESSION)){
    session_start();
}
$con = new Usuario();
if(!empty( $_SESSION['nome'])){  
    $id = $_SESSION['nome'];
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
    <link rel="stylesheet" type="text/css" href="CSS/footer.css">
    
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
      .aviso{
    border: black;
    background-color: red;
    color: white;
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
                              <?php echo $con->getUser($id); ?>
                            </button>                          
                            <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="index.php">Inicio</a></li>
                                <?php if($con->getAdmin($id)== "S") {?>
                                  <li><a class="dropdown-item" href="PHP\gerenciar.php">Gerenciar Usuários</a></li>
                                <li><a class="dropdown-item" href="PHP\lista_de_usuario.php">Lista de usuários</a></li>
                                <li><a class="dropdown-item" href="escolher_categoria.php">Criar categoria</a></li>
                                <li><a class="dropdown-item" href="PHP\novo_genero.php">Criar genero musical</a></li>
                                <li><a class="dropdown-item" href="PHP\gerenciar_artista.php">Gerenciar artistas</a></li>
                                <li><a class="dropdown-item" href="PHP\gerenciar_musica.php">Gerenciar músicas</a></li>
                                <li><a class="dropdown-item" href="escolher_Imagem.php">Gerenciar imagens</a></li>
                                <li><a class="dropdown-item" href="escolher_gif.php">Gerenciar Gif</a></li>
                                <li><a class="dropdown-item" href="escolher_carroceu.php">Gerenciar Carroceu</a></li>
                                <li><a class="dropdown-item" href="escolher_destaque.php">Gerenciar Destaques</a></li>

                                
                                <?php }?>
                                <li><a class="dropdown-item" href="PHP\favoritos.php">Favoritos</a></li>                                
                                <li><a class="dropdown-item" href="PHP/perfil.php">Perfil de usuário</a></li>                               

                                <li><a class="dropdown-item" href="PHP\logout.php">Logout</a></li>
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
                <a class="nav-link" href="Jogos.php"><button class="btn btn-secondary" type="button">Jogos</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Animes.php"><button class="btn btn-secondary" type="button">Animes</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Musicas.php"><button class="btn btn-secondary" type="button">Musicas</button></a>
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
       <br><br><br>
     <?php if ($con->getIdade($id) < 18 ) { ?>
        <div class="container">
            <div class="row">
                <div class="aviso">
                    <h4 style="text-align:center"><b>AVISO:</b> </h4>
                    <p><b> Você é está preste a acessar conteúdos não adequados para todas idade,
                        caso seja maior de idade confirme essa informação no seu perfil, se não for
                        volte imediatamente para o inicio.
                        </b>
                    </p>
                </div>   
            </div>
            <br><br>
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="PHP\perfil.php" class="btn btn-outline-success">Confirmar idade</a>
                    <a href="index.php" class="btn btn-outline-success">Voltar ao inicio</a>
                </div>
            </div>
        </div>
        <?php }else if($con->getConfirmacao($id) == "S" || $con->getAdmin($id) == "S"){ ?>
                <div class="container">
                            <div class="row">
                                <div class="aviso">
                                    <h4 style="text-align:center"><b>AVISO:</b> </h4>
                                    <p><b> Você está preste a acessar conteúdos possivelmente inadequados a serem vistos em lugares
                                        publicos, ao clicar em continuar você assume esses riscos. A partir disso nós não nos responsabilizamos por qualquer coisa que possa acontecer em seguida.  
                                        </b>
                                    </p>
                                </div>   
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="indexNSFW.php" class="btn btn-outline-success">continuar</a>
                                    <a href="index.php" class="btn btn-outline-success">Voltar ao inicio</a>
                                </div>
                            </div>
                        </div>        
            <?php }else if($con->getIdade($id) >= 18 && $con->getConfirmacao($id) != "S"){?>
                        <div class="container">
                            <div class="row">
                                <div class="aviso">
                                    <h4 style="text-align:center"><b>AVISO:</b> </h4>
                                    <p><b> Você está preste a acessar conteúdos possivelmente inadequados a serem vistos em lugares
                                        publicos, ao clicar em continuar você assume os riscos além de confirmar explicitamente que 
                                        é maior de idade. A partir disso nós não nos responsabilizamos por qualquer coisa que possa acontecer em seguida.  
                                        </b>
                                    </p>
                                </div>   
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="PHP\conf_idade.php" class="btn btn-outline-success">continuar</a>
                                    <a href="index.php" class="btn btn-outline-success">Voltar ao inicio</a>
                                </div>
                            </div>
                        </div>
            <?php }?>
                                                                         
    </main> 
    <br>
    <br>
    <br>
    <hr>

   
        <footer>
          <a href="#top"><button class="btn btn-secondary" type="button">voltar ao Topo</button></a>
          <a href="sobre.html"><button class="btn btn-secondary" type="button">Sobre nós</button></a>
          <ul>
            <li><a href="teste.html"><img src="img/discord.svg" alt="discord logo"> </a></li>
            <li><a href="teste.html"><img src="img/linkedin.svg" alt="linkedin logo"> </a></li>
            <li></li>
            <li></li>
          </ul>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
</body>
</html> 
<?php
}else{ 
 header('Location: PHP\login.php');
}
?>