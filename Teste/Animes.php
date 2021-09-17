<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("PHP\classes\Imagem.php");

$img = new Imagem();
//Se der pau no servidor a primeira coisa que pra tentar é tirar todos o !isset($_SESSION)
  session_start();
  $id1 = $img->getIdCarroceuA('1');
  $id2 = $img->getIdCarroceuA('2'); 
  $id3 = $img->getIdCarroceuA('3');
  $imagem1 = $img->getCaminhoCarroceuA('1');
  $imagem2 = $img->getCaminhoCarroceuA('2'); 
  $imagem3 = $img->getCaminhoCarroceuA('3');

if(!empty( $_SESSION['nome'])){  
  include_once('PHP/header.php');   
  
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
    <link rel="stylesheet" href="https://unpkg.com/wingcss"/>

    
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
      .imgT{
        max-height: max-content;
        max-width: max-content;
        object-fit: cover;
     }
     .imgC{
       height: 360px;
       width: 360px;
       object-fit: cover;
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
                        <form class="d-flex" action="PHP\pesquisa.php" method="GET">
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
                <a class="nav-link" href="PHP\buscar_por_categoria.php"><button class="btn btn-secondary" type="button">Buscar por imagens</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PHP\buscar_por_categoria_gif.php"><button class="btn btn-secondary" type="button">Buscar gifs</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="PHP\Subimicao.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Submeter conteúdo</button></a>
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
       <h1 id="Topo">Horn's Gallery: Anime</h1>
       <div class="container">
          <div style="text-align: center;">
          <br> 
            <p>Precisa de um Wallpaper? ou de um Gif de anime? Aqui no Horn Gallery você pode encontrar
              o suficiente para encher uma galaria com 15GB de imagens. </p>
            <p>caso não encontre oque deseja, não se preocupe, o horn's gallery é inteiramente comunitário,
              continue voltando até que alguém coloque o que deseja, ou simplimente submeta você mesmo para que 
              outros não passem por algo parecido.
            </p>
          </div>

        </div>
        
      <br>
      <br>
      <br>
            <div style="text-align: center;"><h2>Alguns exemplos em destaque</h2></div>
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
                          <form action="PHP\imagemEscolhida copy.php" method="GET"> 
                              <input type="hidden" name="nImagem" value="<?php echo $img->getNome($id1); ?>">
                            <button type="submit" class="btn btn-outline-light" name="imagem" value="<?php echo $id1;?>">
                              <img  class="img-fluid" src=" PHP\<?php echo $imagem1;?>" class="d-block w-100" alt="...">
                            </button>
                          </form>  
                          </div>
                          <div class="carousel-item" data-bs-interval="4000">
                          <form action="PHP\imagemEscolhida copy.php" method="GET">
                          <input type="hidden" name="nImagem" value="<?php echo $img->getNome($id2); ?>"> 
                          <button type="submit" class="btn btn-outline-light" name="imagem" value="<?php echo $id2?>">
                              <img  class="img-fluid" src=" PHP\<?php echo $imagem2?>" class="d-block w-100" alt="...">
                            </button>
                            </form>  
                          </div>
                          <div class="carousel-item" data-bs-interval="4000">
                          <form action="PHP\imagemEscolhida copy.php" method="GET">
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

    <h2>Algumas categorias em destaque</h2>
    <section> 
      <form action="PHP\tema_categoria copy.php" method="GET">   
      <div class="container">        
        <div class="row">
          <div class="col-6">
            <figure class="figure">
            <div class="container">
             <div class="imgT">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('1'); ?>">
            <img  class="img-fluid" src=" PHP\<?php echo $img->getCaminhoDestaqueA('1');?>" class="d-block w-100" alt="...">
            </button>
            </div>
            </div>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('1'); ?></figcaption>
            </figure>
            <br>
            <br>
            <figure class="figure">
            <div class="container">
             <div class="imgT">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('3'); ?>">
            <img  class="img-fluid imgT" src=" PHP\<?php echo $img->getCaminhoDestaqueA('3');?>" class="d-block w-100" alt="...">

            </button>
            </div>
            </div>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('3'); ?></figcaption>
            </figure>
            <br>
            <br>
            <figure class="figure">
            <div class="container">
             <div class="imgT">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('5'); ?>">
            <img  class="img-fluid imgT" src=" PHP\<?php echo $img->getCaminhoDestaqueA('5');?>" class="d-block w-100" alt="...">

            </button>
            </div>
            </div>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('5'); ?></figcaption>
            </figure>
          </div>
          
          <div class="col-6">
          <div class="container">
             <div class="imgT">
          <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('2'); ?>">
          <img  class="img-fluid imgT" src=" PHP\<?php echo $img->getCaminhoDestaqueA('2');?>" class="d-block w-100" alt="...">

          </button>
          </div>
            </div>
            <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('2'); ?></figcaption>
          </figure>
          <br>
          <br>
          <figure class="figure">
          <div class="container">
             <div class="imgT">
          <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('4'); ?>">
          <img  class="img-fluid imgT" src=" PHP\<?php echo $img->getCaminhoDestaqueA('4');?>" class="d-block w-100" alt="...">

          </button>
          <div class="container">
             <div class="imgT">
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('4'); ?></figcaption>
            </figure>
            <br>
            <br>
            <figure class="figure">
            <div class="container">
             <div class="imgT">
            <button type="submit" class="btn btn-outline-light" name="escolha" value="<?php echo $img->getNomeDestaqueA('6'); ?>">
            <img  class="img-fluid imgT" src=" PHP\<?php echo $img->getCaminhoDestaqueA('6');?>" class="d-block w-100" alt="...">

            </button>
            </div>
            </div>
              <figcaption class="figure-caption"><?php echo $img->getNomeDestaqueA('6'); ?> </figcaption>
            </figure>
            <br>
            <br>
          </div>          
        </div>
      </div>
        </section>
        </form>  
        <footer>
          
          <!--essa tag a faz voltar pro topo da página, simples.... oq? achou q eu ia fazer mais um comentário
          ironizando ou zoando algo?-->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          $.post("PHP\imagemEscolhida.php"), "nImagem=<?php echo $img->getNome($id2); ?>",function(data){
                console.log(data);
          });
        </script>
</body>
</html> 
