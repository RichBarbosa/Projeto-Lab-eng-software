<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("PHP\classes\Imagem.php");

$img = new Imagem();
//Se der pau no servidor a primeira coisa que pra tentar é tirar todos o !isset($_SESSION)
  session_start();
  $id1 = $img->getIdCarroceuA('4');
  $id2 = $img->getIdCarroceuA('5'); 
  $id3 = $img->getIdCarroceuA('6');
  $imagem1 = $img->getCaminhoCarroceuA('4');
  $imagem2 = $img->getCaminhoCarroceuA('5'); 
  $imagem3 = $img->getCaminhoCarroceuA('6');

if(!empty( $_SESSION['nome'])){  
  include_once('PHP/header_indexJogo.php');   
  
}else{?>
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
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">

    
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Inicio</title>
    
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
     
    <!--esses forms são para pegar os inputs dos buttons de entrar e cadastrar,
    deve ter outro jeito de fazer isso mas nah, se esse comentário ainda tiver aqui
   1 de 2, ou eu não mudei nada pq não consegui algo melhor ou por preguiça mesmo-->
       <form action="PHP\login.php" id="login" method="POST"></form>
       <form action="PHP\cadastro.php" id="cadastro" method="POST"></form>
          
       <!-- primeira opção de navbar, to em duvida se deixo essa ou a segunda--> 
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php" id="a1">
                       
                      <!--Coloquei uma piada interna como logo e nome da aplicação...
                          krl, eu sou um gênio-->  
                        <img src="img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                    <div class="d-grid gap-2 d-md-block">
                      <button class="btn btn-secondary" type="submit" form="login" id="b1">Entrar</button>
                      <button class="btn btn-secondary" type="submit" form="cadastro" id="b2">Cadastrar</button>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <form class="d-flex" action="PHP\pesquisaJogo.php" method="POST">
                            <input class="form-control " type="search" placeholder="Pesquisar" aria-label="Search"  name="buscar" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
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
                <a class="nav-link" href="PHP\buscar_por_categoria_jogo.php"><button class="btn btn-secondary" type="button">Buscar por imagens</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PHP\buscar_por_categoria_jogo_gif.php"><button class="btn btn-secondary" type="button">Buscar gifs</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="PHP\Subimicao_jogo.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Submeter conteúdo</button></a>
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
<?php }?>
  <body> 
   <main>
     <?php    
     ?>
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
            <div style="text-align: center;"><h2>Exemplos</h2></div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">

                    </div>
                    <!--Carrosseu de imagens, tenho que diminuir o tamanho delas, ou não,
                  até que eu gostei delas assim. Também preciso colocar mais imagens além
                de três, embora o intuito seja que elas são trocaveis pelos adms.-->
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active" data-bs-interval="4000">
                          <form action="PHP\imagemJogoEscolhida.php" method="post">
                              <input type="hidden" name="nImagem" value="<?php echo $img->getNome($id1); ?>">
                            <button type="submit" class="btn btn-outline-light" name="imagem" value="<?php echo $id1;?>">
                              <img  class="img-fluid" src=" PHP\<?php echo $imagem1;?>" class="d-block w-100" alt="...">
                            </button>
                          </form>  
                          </div>
                          <div class="carousel-item" data-bs-interval="4000">
                          <form action="PHP\imagemJogoEscolhida.php" method="post">
                          <input type="hidden" name="nImagem" value="<?php echo $img->getNome($id2); ?>"> 
                          <button type="submit" class="btn btn-outline-light" name="imagem" value="<?php echo $id2?>">
                              <img  class="img-fluid" src=" PHP\<?php echo $imagem2?>" class="d-block w-100" alt="...">
                            </button>
                            </form>  
                          </div>
                          <div class="carousel-item" data-bs-interval="4000">
                          <form action="PHP\imagemJogoEscolhida.php" method="post">
                          <input type="hidden" name="nImagem" value="<?php echo $img->getNome($id3); ?>">  
                          <button type="submit" class="btn btn-outline-light" name="imagem" value="<?php echo $id3?>">
                              <img  class="img-fluid" src=" PHP\<?php echo $imagem3?>" class="d-block w-100" alt="...">
                            </button>
                            </form>  
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                      </form>
    </main> 
    <br>
    <br>
    <br>
    <hr>

    <h2>Confira algumas categorias</h2>
    <section> 
      <form action="PHP\tema_categoria_jogo.php" method="post">   
      <div class="container">        
        <div class="row">
          <div class="col-6">
            <figure class="figure">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('7'); ?>">
            <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('7');?>" class="d-block w-100" alt="...">
            </button>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('7'); ?></figcaption>
            </figure>
            <br>
            <br>
            <figure class="figure">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('9'); ?>">
            <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('9');?>" class="d-block w-100" alt="...">

            </button>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('9'); ?></figcaption>
            </figure>
            <br>
            <br>
            <figure class="figure">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('11'); ?>">
            <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('11');?>" class="d-block w-100" alt="...">

            </button>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('11'); ?></figcaption>
            </figure>
          </div>
          
          <div class="col-6">
          <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('8'); ?>">
          <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('8');?>" class="d-block w-100" alt="...">

          </button>
            <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('8'); ?></figcaption>
          </figure>
          <br>
          <br>
          <figure class="figure">
          <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('10'); ?>">
          <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('10');?>" class="d-block w-100" alt="...">

          </button>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('10'); ?></figcaption>
            </figure>
            <br>
            <br>
            <figure class="figure">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('12'); ?>">
            <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('12');?>" class="d-block w-100" alt="...">

            </button>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('12'); ?> </figcaption>
            </figure>
            <br>
            <br>
          </div>          
        </div>
      </div>
        </section>
        </form>  
        <?php
        include_once("PHP/footer.php");  
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
</body>
</html> 
