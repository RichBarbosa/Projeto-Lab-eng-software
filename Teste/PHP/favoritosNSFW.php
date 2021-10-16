<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)){
  session_start();
}require_once('../PHP\classes\NSFW.php');
require_once('../PHP\classes\Usuario.php');

$con = new Usuario();
$cat = new NSFW();
if(!empty( $_SESSION['nome'])){ 
  $id = $_SESSION['nome']; 
  if($con->getConfirmacao($id) == "S" || $con->getAdmin($id) == "S"){
    
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
    <title>Favoritos</title>
    
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
                                <li><a class="dropdown-item" href="favoritosNSFW.php">Favoritos(NSFW)</a></li>                                
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
                <a class="nav-link" href="../indexNSFW.php"><button class="btn btn-secondary" type="button">Inicio</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php"><button class="btn btn-secondary" type="button">Voltar para o Horn's Gallery padrão</button></a>
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
    <main>
    <?php 
    $idImagem = null;
    $nome = null;


        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          
          try{
            $con->deletarFavoritaById($idImagem, $id);
          }catch(Exception $e){

          }

         
        }
    ?>
    <h3 style="text-align:center">Favoritos</h3>
    <br>
  <br><br><br>
  <div class="container">
    <div class="row">
        <div class="col-4">
          <h6>Categoria NSFW</h6>
          <?php if(empty($cat->listarCategoriasFavoritas($id))){?>
            <h6>Você ainda não favoritou nenhuma sub categoria</h6>
            <?php }else{ ?>
          <div class="form-check">
            <form action="tema_NSFW.php" method="GET">
            <select class="form-select" aria-label="Default select example" name= "escolha">
                <?php foreach($cat->listarCategoriasFavoritas($id) as $col){ ?>      
                    <option value="<?php echo $col['nome'];?>"><?php echo $col['nome'];?></option>
                <?php }?>
            </select>
            <button type="submit " class="btn btn-light">ir para a categoria</button>

                </form>
              </div>
            <?php }?>              
        </div>
        <div class="col-4">
        </div>
        
      </div>
    </div>
  </div> 
  <hr/>
  <?php if(empty($cat->getFavorita($id))){ ?>
    
    <h3>Você não favoritou nada ainda</h3>
    <br><br><br><br><br><br><br><br><br><br><br><br> 

<?php }else{?>    
  <h5>Imagens e gifs favoritados</h5>
  <?php echo $nome;?>
  <br><br>
    <div class="container">
      <div class="row">
        <?php foreach($cat->getFavorita($id) as $col){ ?> 
        <div class="col-sm-6">
        <form action="definirNSFW.php" method="post">
          <input type="hidden" name="categoriaFavorito" value="NSFW">
          <button type="submit " class="btn btn-light" name="favorito" value="<?php echo $col['caminho'];?>"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
        </form>
<ul class="list-group list-group-horizontal">
  <form action="Deletar_favoritosNSFW.php" method="post"> 
  <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id_favorito'];?>" ><img class="img-thumbnail" 
  src="../img/suit-heart-fill.svg"  alt=""></button></li>
  
  </form>
  <li><button class="btn btn-outline-light"> 
    <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
    src="../img/download.svg" alt=""></a>
</ul>         
          <hr>
        </div>
          <?php }
}
          ?> 
        </div>        
        </div>  
    </main> 
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
}else {
  header('Location: ../index.php');
}
}else{ 
 header('Location: ../index.php');
}
?>