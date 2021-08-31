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
                          <form action="PHP\logout.php" method="POST" id="logout"></form>
                    </div>
                </div>
            </nav>
   </header> 
    <br><br><br>
   <main>       
       <div class="container">
            <div class="row">
            <h6>Criar nova categoria de imagem</h6>
                <div class="col-sm-6">
                    <form method="POST" action="PHP\criar_categorias_jogo.php">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" placeholder="Criar nova Categoria" autocomplete="off">
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                              </div>
                        </div>  
                      </form>
                <div class="col sm-6">
                    <div class="form-check">
                        <h6>Excluir categoria de imagem </h6>
                        <form action="PHP\deletar_categoria_jogo.php" method="POST" id="deletar">
                            <select class="form-select" aria-label="Default select example" name= "categoria">
                                <?php foreach($cat->listarCategoriasJogo() as $col){ ?>      
                                    <option value="<?php echo $col['nome'];?>"><?php echo $col['nome'];?></option>
                                <?php }?>
                            </select>
                        </form>  
                              <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Excluir</button> 
                    </div>                          
                </div>
        </div>
        

        <div class="col-sm-6">
          <h6>Lista da categorias de imagem </h6>
        <Table  class="table" id="tabImg">
        <tr>
          <th>id da categoria</th>
          <th>nome</th>
        </tr> 
    <?php foreach($cat->listarCategoriasJogo() as $col){ ?>
        <tr>
            <td><?php echo $col['id'];?></td>
            <td><?php echo $col['nome'];?></td>
            <?php }?> 
        </tr>
    </Table>
    </div>
    <br><br><br><br><br><br>
    <div class="container">
  <div class="row">
    <div class="col-6">
    <br><br><br><br><br><br>

      <h6>Criar nova categoria de gif</h6>
      <form method="POST" action="PHP\criar_categorias_gif_jogo.php">
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="form-control" placeholder="Criar nova Categoria" autocomplete="off">
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                              </div>
      </form>
                        </div>
                        <div class="col sm-6">
                    <div class="form-check">
                        <h6>Excluir categoria de gifs </h6>
                        <form action="PHP\deletar_categoria_gif_jogo.php" method="POST"  id="deletar_gif">
                            <select class="form-select" aria-label="Default select example" name= "categoria2">
                                <?php foreach($gif->listarCategoriasJogo() as $col){ ?>      
                                    <option value="<?php echo $col['nome'];?>"><?php echo $col['nome'];?></option>
                                <?php }?>
                            </select>
                        </form>  
                              <button class="btn btn-danger" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight">Excluir</button> 
                    </div>                          
                </div>  
    </div>
    </form>
    
    
    <div class="col-6">
    <br><br><br><br><br><br>
      <h6>Lista da categorias de gifs </h6>
        <Table  class="table" id="tabGif">
        <tr>
          <th>id da categoria</th>
          <th>nome</th>
        </tr> 
    <?php foreach($gif->listarCategoriasJogo() as $col){ ?>
        <tr>
            <td><?php echo $col['id'];?></td>
            <td><?php echo $col['nome'];?></td>
            <?php }?> 
        </tr>
    </Table>
    </div>
    </div>
  </div>        
    
    <hr>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Excluir categoria: imagem</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    Alerta, excluir uma categoria irá apagar todos os dados dela, deseja continuar?
    <button class="btn btn-danger" type="submit" form="deletar">Excluir </button> 

  </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight2" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Excluir categoria: gif</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    Alerta, excluir uma categoria irá apagar todos os dados dela, deseja continuar?
    <button class="btn btn-danger" type="submit" form="deletar_gif">Excluir  </button> 

  </div>
</div>        
  </main>
  <br><br><br><br><br><br><br><br><br>
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
 header('Location: index.php');
}
?>