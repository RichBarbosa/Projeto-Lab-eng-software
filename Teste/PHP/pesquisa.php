<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Gif.php');
require_once('../PHP\classes\Imagem.php');
require_once('../PHP\classes\Usuario.php');
$gif = new Gif();
$img = new Imagem();
if(!empty( $_SESSION['nome'])){  
  include_once('header_tema.php');
  $id = $_SESSION['nome'];
}else{  
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
    <title>Teste</title>
    
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
   <header id="top" >     
       <form action="login.php" id="login" method="POST"></form>
       <form action="cadastro.php" id="cadastro" method="POST"></form>          
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php" id="a1">                     
                        <img src="../img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                    <div class="d-grid gap-2 d-md-block">
                      <button class="btn btn-secondary" type="submit" form="login" id="b1">Entrar</button>
                      <button class="btn btn-secondary" type="submit" form="cadastro" id="b2">Cadastrar</button>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisa.php" method="GET">
                            <input class="form-control " type="search" placeholder="Pesquisar" aria-label="Search" name="buscar" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
            </nav>
            <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <ul class="nav navbar-dark bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria.php"><button class="btn btn-secondary" type="button">Buscar por imagens</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria_gif.php"><button class="btn btn-secondary" type="button">Buscar por gifs</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Subimicao.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Submeter conteúdo</button></a>
            </li>
        </ul>
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
<body>
<br><br><br>
  <?php } ?>
  <main>
    <?php 
      if(isset($_GET['buscar'])){
          $busca = $_GET['buscar'];
          if($img ->listarCategoriasByInicial($busca) != null || $gif ->listarCategoriasByInicial($busca) != null){ ?>
            <form action="tema_categoria copy.php" method="GET">
              <h6>Imagens</h6>
              <div class="container">
                  <div class="row">
                    <?php 
                      foreach ($img->listarCategoriasByInicial($busca) as $col) {?>
                        <div class="col-sm-3"><br>
                          <button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></button> 
                        </div>
                    <?php }?>
                  </div>
                </div>  
            </form>
            <br>
              <form action="tema_categoria_gif copy.php" method="GET">
                <h6>gifs</h6>
                <div class="container">
                  <div class="row">
                      <?php 
                        foreach ($gif->listarCategoriasByInicial($busca) as $col) {?>
                          <div class="col-sm-3"><br>
                            <button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></button> 
                          </div>
                      <?php }?>
                  </div>
                </div>
              </form>
    <?php 
          }else{ ?>
        <h5>Ops... não foi encontrado nada..</h5>
        <h5>gostaria de buscar por tag?</h5>
        <div class="container-fluid">
          <form class="d-flex" action="pesquisa.php" method="GET">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="buscarTag" autocomplete="off">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <br><br><br><br><br><br><br><br><br>

        </div>     
    <?php }
      } if(!empty($_GET['buscarTag'])){ 
        $busca = $_GET['buscarTag'];
        if($img->getCaminhoByTag($busca) || $gif->getCaminhoByTag($busca)){?>
          <div class="container-fluid">
            <div class="row">
              <h3>Conteúdo marcado com a tag <?php echo $busca; ?> </h3>
              <br><br><br><hr>
            </div>
            <div class="row">
              <div class="col-6">
                <h4>Imagens</h4>
                <?php 
                  foreach($img->getCaminhoByTag($busca) as $col){ ?> 
                    <form action="imagemEscolhida copy.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <form action="Tag_anime_imagem.php" method="get">
                    <ul class="list-group list-group-horizontal">
                      <?php if(!empty($img->getTag1($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $img->getTag1($col['id']);?>" class="btn btn-light"> <?php echo $img->getTag1($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($img->getTag2($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $img->getTag2($col['id']);?>" class="btn btn-light"><?php echo $img->getTag2($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($img->getTag3($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $img->getTag3($col['id']);?>" class="btn btn-light"><?php echo $img->getTag3($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($img->getTag4($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $img->getTag4($col['id']);?>" class="btn btn-light"><?php echo $img->getTag4($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($img->getTag5($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $img->getTag5($col['id']);?>" class="btn btn-light"><?php echo $img->getTag5($col['id'])?></h6></li></button>
                      <?php }?>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                      <?php /*?>
                      por hora isso vai ficar comentado, vai dar trabalho fazer com que de pra favoritar aqui
                      <form action="" method="post">
                        <input type="hidden" name="categoria" value="<?php echo $busca?>">
                        <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
                        <?php 
                          $favnome = $img->getNome($col['id']);
                          $fav = $img->verificarFavorita($favnome, $id);
                          if($fav){?>
                            <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
                                                src="../img/suit-heart-fill.svg"  alt=""></button></li>  
                        <?php 
                          }else{ ?>
                            <form action="" method="post">
                              <li><br><button class="btn btn-outline-success" type ="submit" name="favoritar" value="<?php echo $col['id'];?>" >Adicionar como favorita</button></li>
                        <?php 
                          } ?>
                      </form>
                      <?php */?>
                      <li><button class="btn btn-outline-light"> 
                        <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
                                    src="../img/download.svg" alt=""></a></li>
                    </ul>         
                        </hr>
                <?php 
                  } ?>         
              </div>
              <div class="col-6">
                <h4>Gifs</h4>
                <?php 
                  foreach($gif->getCaminhoByTag($busca) as $col){ ?> 
                    <form action="gifEscolhido copy.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <form action="Tag_anime_gif.php" method="get">
                    <ul class="list-group list-group-horizontal">
                    <?php if(!empty($gif->getTag1($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getTag1($col['id']);?>" class="btn btn-light"> <?php echo $gif->getTag1($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getTag2($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getTag2($col['id']);?>" class="btn btn-light"><?php echo $gif->getTag2($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getTag3($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getTag3($col['id']);?>" class="btn btn-light"><?php echo $gif->getTag3($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getTag4($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getTag4($col['id']);?>" class="btn btn-light"><?php echo $gif->getTag4($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getTag5($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getTag5($col['id']);?>" class="btn btn-light"><?php echo $gif->getTag5($col['id'])?></h6></li></button>
                      <?php }?>
                    </ul>
                    <ul class="list-group list-group-horizontal">
                      <form action="" method="post">
                        <input type="hidden" name="categoria" value="<?php echo $busca?>">
                        <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
                        <?php 
                          $favnome = $gif->getNomeJogo($col['id']);
                          $fav = $gif->verificarJogoFavorita($favnome, $id);
                              if($fav){?>
                                <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
                                  src="../img/suit-heart-fill.svg"  alt=""></button></li>  
                        <?php 
                              }else{ ?>
                                    <form action="" method="post">
                                      <li><br><button class="btn btn-outline-success" type ="submit" name="favoritar" value="<?php echo $col['id'];?>" >Adicionar como favorita</button></li>
                        <?php 
                              } ?>
                      </form>
                      <li><button class="btn btn-outline-light"> 
                          <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
                              src="../img/download.svg" alt=""></a>
                    </ul>         
                            </hr>
                <?php 
                } ?>
              </div>
            </div>
          </div>
    <?php }else if(empty($img->getCaminhoByTag($busca)) && empty($gif->getCaminhoByTag($busca))){?>
      <h5>Ops... não foi encontrado nada..</h5>
        <h5>gostaria de buscar por tag?</h5>
        <div class="container-fluid">
          <form class="d-flex" action="pesquisa.php" method="GET">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="buscarTag" autocomplete="off">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
      <?php }

      }
?>      
</main> 
<br><br><br><br><br><br><br><br><br><br><br>

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
?>    
