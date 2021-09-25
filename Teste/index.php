<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("PHP\classes\Imagem.php");
include_once("PHP\classes\Musica.php");

$img = new Imagem();
$mus = new Musica();
//Se der pau no servidor a primeira coisa que pra tentar é tirar todos o !isset($_SESSION)
  session_start();
 
if(!empty( $_SESSION['nome'])){  
  include_once('PHP/header_index.php');   
  
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
                        <form class="d-flex" action="PHP\pesquisa.php" method="POST">
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
                <a class="nav-link" href="Musicas.php"><button class="btn btn-secondary" type="button">Musicas</button></a>
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
                <a class="nav-link" href="PHP\buscar_por_categoria.php"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PHP\buscar_por_categoria_gif.php"><button class="btn btn-secondary" type="button">Buscar gifs</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PHP\upload_gif.php"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
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
       <h1 id="Topo"></h1>
       <br><br>
       <div class="container">
          <div style="text-align: center;">
          <h4> 
            <p> Bem vindo ao Horn'Gallery! a galeria comunitarida de todos para todos. </p>
              <p>Aqui no Horn'Gallery você pode encontrar os seguintes conteúdos para baixar: Imagens e Gifs
                dos temas Jogos e animes. Use-os para oque você quiser!!, wallpapers, Stickers, imagens de referência e
                mais oque sua imaginação desejar.
              </p>
            <p>além das imagens nós também possuimos letras e traduções das mais diversas músicas! feitas de fãs para fãs!</p>
            <p>além disso se não encontrar oque deseja em algum desses temas não se preocupe! você mesmo pode compatilhar conosco também 
              expandindo o nosso conteúdo cada vez mais! 
            </p>
            </h4>  
          </div>

        </div>
        <br><br><br>
        <div style="text-align: center;"><h4>Sub categorias de imagens em destaque: Animes</h4></div>
        <h6 style="text-align: center">
        <a class="btn btn-outline-success" href="Animes.php" role="button">visitar esse tema por completo</a>
        </h6>
            <hr>
            <div class="container">
              <div class="row">
                <form action="PHP\tema_categoria copy.php" method="get">
                  <table>
                  <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('1');?>"><?php echo $img->getnomeDestaqueA('1');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('2');?>"><?php echo $img->getnomeDestaqueA('2');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('3');?>"><?php echo $img->getnomeDestaqueA('3');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('4');?>"><?php echo $img->getnomeDestaqueA('4');?></button></td>
                    </tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('5');?>"><?php echo $img->getnomeDestaqueA('5');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('6');?>"><?php echo $img->getnomeDestaqueA('6');?></button></td>
                  </tr>
                  </table>
                </form>                    
              </div>
            </div>
        </div>
        <br>
        <h4 style="text-align:center">Sub categorias de imagens em destaque: Jogos</h4>
        <h6 style="text-align: center">
        <a class="btn btn-outline-success" href="Jogos.php" role="button">visitar esse tema por completo</a>
        </h6>
        <hr>
            <div class="container">
              <div class="row">
                <form action="PHP\tema_categoria_jogo copy.php" method="get">
                  <table>
                  <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('7');?>"><?php echo $img->getnomeDestaqueA('7');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('8');?>"><?php echo $img->getnomeDestaqueA('8');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('9');?>"><?php echo $img->getnomeDestaqueA('9');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('10');?>"><?php echo $img->getnomeDestaqueA('10');?></button></td>
                    </tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('11');?>"><?php echo $img->getnomeDestaqueA('11');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $img->getNomeDestaqueA('12');?>"><?php echo $img->getnomeDestaqueA('12');?></button></td>
                  </tr>
                  </table>
                </form>                    
              </div>
            </div>
        </div>
        <br>
        <h4 style="text-align:center">Generos músicais em destaque</h4>
        <h6 style="text-align: center">
        <a class="btn btn-outline-success" href="Musicas.php" role="button">visitar esse tema por completo</a>
        </h6>
        <hr>
            <div class="container">
              <div class="row">
                <form action="PHP\generos.php" method="get">
                  <table>
                  <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaqueG('1');?>"><?php echo $mus->getnomeDestaqueG('1');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getNomeDestaqueG('2');?>"><?php echo $mus->getnomeDestaqueG('2');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getNomeDestaqueG('3');?>"><?php echo $mus->getnomeDestaqueG('3');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getNomeDestaqueG('4');?>"><?php echo $mus->getnomeDestaqueG('4');?></button></td>
                    </tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getNomeDestaqueG('5');?>"><?php echo $mus->getnomeDestaqueG('5');?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getNomeDestaqueG('6');?>"><?php echo $mus->getnomeDestaqueG('6');?></button></td>
                  </tr>
                  </table>
                </form>                    
              </div>
            </div>
        </div>
        <hr>
    </main> 
<br><br>
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
