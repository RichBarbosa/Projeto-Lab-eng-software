<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Musica.php');

$con = new Usuario();
$cat = new Musica();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){
    if(!empty($_POST)){
        $idMusica = $_POST['musica'];
        $nome = $cat->getNome($idMusica);
        $autoria = $cat->getAutoriaById($idMusica);
        $genero = $cat->getGeneroByAutoria($autoria);

     
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
      .imgT{
        height:500px;
        width: 500px;
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
    <br><br><br>
   <main>       
    <h2><?php echo $nome;?><h2>
    <h6 style="text-align:center;"><?php echo $autoria; ?></h6>
        <form action="editar_letra.php" method="get" >
            <input type="hidden" name="id" value="<?php echo $idMusica;?>">
            <input type="hidden" name="idUser" value="<?php echo $id;?>">
            <input type="hidden" name="nome_musica" value="<?php echo $nome;?>">
            <div class="container">
              <div class=row>
                <div class="col-6">
                <pre>
                  <h6>
                    <br>
                    <b><?php echo $cat->getLetra($idMusica);?></b>
                  </h6>
                </pre>
                </div>
     <div class="col-3">
       <br><br>         
        <table>
          <tr>
          <td><button  class="btn btn-outline-success" type="submit">Editar letra</button></td>
          </tr>
          <tr>
            <td><button class="btn btn-outline-success" type="button" data-bs-toggle="collapse" 
              data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Mover música</button></td>
          </tr>
          <tr>           
            <td><button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Excluir</button></li>
            </td>
          </tr>         
      </form> 
      </div>
    </div>

    <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <div class="form-check">
    <h6>mover para:</h6>
        <form action="mover.php" method="POST">
          <input type="hidden" name="idMusica" value="<?php echo $idMusica;?>">
        <select class="form-select" aria-label="Default select example" name= "categoria">
            <?php foreach($cat->listarTodasAutorias() as $col){ ?>      
                <option value="<?php echo $col['nome_autoria'];?>"><?php echo $col['nome_autoria'];?></option>
            <?php }?>
        </select>
        <button type="submit " class="btn btn-secondary">Confirmar</button>

            </form>  
            
    </div>
  </div>
</div>
      </div>
      </div>
    

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir essa música?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="excluir_musica.php" method="post">
            <input type="hidden" name="excluir" value="<?php echo $idMusica;?>">
        <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>  
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
</body>
</html> 
<?php
    }else{
        header('Location: ../gerenciar_imagens.php');
    }
}else{ 
 header('Location: ../index.php');
}
?>