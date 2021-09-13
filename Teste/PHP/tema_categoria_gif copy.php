<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Gif.php');
require_once('../PHP\classes\Usuario.php');
$cat = new Gif();
if(!empty( $_SESSION['nome'])){  
  include_once('header_tema.php');
}else{
  $id = null;    
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
                    <form class="d-flex" action="pesquisa.php" method="POST">
                            <input class="form-control " type="search" placeholder="Pesquisar" aria-label="Search"  name="buscar" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
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
                <a class="nav-link" href=""><button class="btn btn-secondary" type="button"></button></a>
            </li>
        </ul>
  </div>
</div>
                </nav>
            </nav>
            <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <ul class="nav navbar-dark bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria.php"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria_gif.php"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Subimicao.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Submeter conteudo</button></a>
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
    if(isset($_GET['escolha'])){
        $categoria = $_GET['escolha'];
    }
    else{
      $categoria = $_SESSION['categoria'] ;
    } 
    $idImagem = null;
    $caminho = null;
    if(!empty($_SESSION['nome'])){
          $id = $_SESSION['nome'];
    }else{
      $id = null;
    }
    $nome = null;

    if(!empty($_POST['categoria'])){
        $categoria = $_POST['categoria'];

        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNome($idImagem);
          try{
            $cat->deletarGifFavorito($nome, $id);
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['favoritar'])){
            $idImagem = $_POST['favoritar'];
            $caminho = $_POST['caminho'];
            $nome = $cat->getNome($idImagem);
            if($id == null){ ?>
              <script>alert('é preciso estar logado para favoritar imagens!') </script>        
      <?php }else{
                try{
                    $cat->inserirFavorita($caminho, $nome, $id); ?>
                    <script>alert("imagem favoritada com sucesso!") </script>
<?php           }catch(Exception $e){
            }
          }  
        }else if(!empty($_POST['favoritarCat'])){
          $favCat = $_POST['favoritarCat'];
          if($id == null){ ?>
            <script>alert('é preciso estar logado para favoritar categorias!') </script>        
    <?php }else{
              try{
                  $cat->inserirCatFavorita($favCat, $id); ?>
                  <script>alert("categoria favoritada com sucesso!") </script>
<?php           }catch(Exception $e){
                }
          }  
        }else if (!empty($_POST['nmCat'])){
          $favCat = $_POST['nmCat'];
            try{
              $cat->deletarCatFavorita($favCat, $id);
            }catch(Exception $e){

            }
        }
      }
    ?>
    <h3 style="text-align:center"><?php echo $categoria ?> </h3>
    
    <form action="favoritarG.php" method="post">
    <input type="hidden" name="categoria" value="<?php echo $categoria?>">
    <?php 
    $favnome = $categoria;
    $fav = $cat->verificarCatFavorita($favnome, $id);
    if($fav){?>
    <div class="container" style="text-align: center">
      <br><button class="btn btn-outline-light" type ="submit" name="nmCat" value="<?php echo $categoria;?>" ><img class="img-thumbnail" 
            src="../img/suit-heart-fill.svg"  alt=""></button>
  </div>
  <?php }else{ ?>
    <div class="container" style="text-align: center">
    <form action="favoritarG.php" method="post">
    <br><button class="btn btn-outline-success" type ="submit" 
    name="favoritarCat" value="<?php echo $categoria;?>" 
    <?php if (empty($_SESSION['nome'])){?> 
      disabled> é preciso estar logado para favoritar</button>
      <?php }else { ?>
      >Adicionar como favorita</button><?php }?>
    <?php } ?>
  </form>
  </div>
<br><br><br>
    
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
                <p>Atualmente possuimos <?php echo count($cat->listarGif($categoria)) . " ";?> imagens nessa categoria</p>
            </div>
  </div>
  <br><br><br> 
  <hr/>       
    <div class="container">
      <div class="row">
        <?php foreach($cat->listarGif($categoria) as $col){ ?> 
        <div class="col-sm-6">
          <form action="gifEscolhido copy.php" method="GET">
            <input type="hidden" name="nImagem" value="<?php echo $col['nome_gif'] ?>">
          <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
          </Form>
                   <ul class="list-group list-group-horizontal">
                   <?php echo ".";?><li><h6><?php echo $cat->getTag1($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getTag2($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getTag3($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getTag4($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getTag5($col['id'])?></h6></li><?php echo ".";?>
                    </ul>
<ul class="list-group list-group-horizontal">
<form action="favoritarG.php" method="post">
    <input type="hidden" name="categoria" value="<?php echo $categoria?>">
    <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
    <?php 
    $favnome = $cat->getNome($col['id']);
    $fav = $cat->verificarFavorita($favnome, $id);
    if($fav){?>
  <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
  src="../img/suit-heart-fill.svg"  alt=""></button></li>
  
  <?php }else{ ?>
    <form action="favoritarG.php" method="post">
    <li><br><button class="btn btn-outline-success" type ="submit" 
    name="favoritar" value="<?php echo $col['id'];?>" 
    <?php if (empty($_SESSION['nome'])){?> 
    disabled> é preciso estar logado para favoritar</button>
    <?php }else { ?>
    >Adicionar como favorita</button><?php }?> </li>
    <?php } ?>
  </form>
  <li><button class="btn btn-outline-light"> 
    <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
    src="../img/download.svg" alt=""></a>
</ul>         
          <hr>
        </div>
          <?php }?> 
        </div>        
        </div>
  </main>  
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
