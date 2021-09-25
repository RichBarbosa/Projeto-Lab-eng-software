<?php
include("PHP\classes\Usuario.php");
include("PHP\classes\Imagem.php");
if(!isset($_SESSION)){
    session_start();
}
$con = new Usuario();
if(!empty( $_SESSION['nome'])){  
    $id = $_SESSION['nome'];
    $img = new Imagem(); 
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
       <h1 id="Topo">Upload imagem: anime</h1>
       <div class="container">
          <div style="text-align: center;"> 
            <p>escolha a imagem que deseja submeter, escreva pelo menos uma tag, e selecione a sub categoria da imagem.</p>
            <p>caso a sub categoria não estiver disponivel ainda contate um administrador que para ele 
                provideciar caso se enquadre nas normas.</p>
                
                <div class="aviso">
              <h4 style="text-align:center"><b>AVISO:</b> </h4>
              <p><b> Você é responsável pelo oque publica, dito isso ao enviar um conteúdo
              você concorda com as diretrizes de publicação e afirma que as informações
              publicadas são referentes ao tema em questão. Caso um dos nossos administradores
              julgue seu conteúdo como improprio para a situação ele terá total liberdade
              de alterar ou remover.</b>
              </p>
            </div>
          </div>
        </div>  
      <br>
      <br>
      <br>
    <hr>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <form action="PHP\upload_imagem.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tag 1  Obrigatoria</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" name="tag1" required autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tag 2  Opcional</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" name="tag2" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tag 3  Opcional</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" name="tag3" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tag 4  Opcional</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" name="tag4" autocomplete="off">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tag 5  Opcional</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputText" name="tag5" autocomplete="off">
                            </div>
                        </div>
                        <fieldset class="row mb-3">
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <div>
                                        <h4>Selecione uma imagem</h4>
                                        <input class="form-control form-control-lg"  id="upload" type="file" accept=".png, .jpg, .jpeg" name = "arquivo" required>
                                    </div>       
                                </div>
                        </div>
                        </fieldset>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <h4>Selecione a categoria da imagem </h4>
                                    <select class="form-select" aria-label="Default select example" name= "categoria">
                                        <?php foreach($img->listarCategorias() as $col){ ?>      
                                            <option value="<?php echo $col['nome'];?>"><?php echo $col['nome'];?></option>
                                        <?php }?>
                                    </select>     
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </form>
        </div>
        <div class="col-sm-6">
            <img class="img-thumbnail" id="img">
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
            <li><a href="teste.html"><img src="img/discord.svg" alt="discord logo"> </a></li>
            <li><a href="teste.html"><img src="img/linkedin.svg" alt="linkedin logo"> </a></li>
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
}else{ 
 header('Location: PHP\login.php');
}
?>