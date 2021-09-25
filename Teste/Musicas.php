<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("PHP\classes\Musica.php");

$mus = new Musica();
//Se der pau no servidor a primeira coisa que pra tentar é tirar todos o !isset($_SESSION)
  session_start();
  
$idm1 = $mus->getIdDestaqueM('1');
$idm2 = $mus->getIdDestaqueM('2');
$idm3 = $mus->getIdDestaqueM('3');
$idm4 = $mus->getIdDestaqueM('4');
$idm5 = $mus->getIdDestaqueM('5');
$idm6 = $mus->getIdDestaqueM('6');
if(!empty( $_SESSION['nome'])){  
  include_once('PHP/header_indexMusica.php');   
  
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
                        <form class="d-flex" action="PHP\pesquisaMusica.php" method="POST">
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
                <a class="nav-link" href="Musicas.php"><button class="btn btn-secondary" type="button">Músicas</button></a>
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
                <a class="nav-link" href="PHP\buscar_genero_musica.php"><button class="btn btn-secondary" type="button">Generos</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="PHP\buscar_autoria_musica.php"><button class="btn btn-secondary" type="button">Artistas</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="PHP\escolher_autoria.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Adicionar uma letra</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="PHP\escolher_genero.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>adicionar um artista</button></a>
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
       <h1 id="Topo">Horn's Gallery: Música</h1>
       <div class="container">
          <div style="text-align: center;"> 
            <p>Cansou de cantar aquela música errada ou de invocar o  demônio por não saber o idioma direito?</p>
            <p>Então você veio ao lugar certo, aqui no Horn's Gallery: Música possuimos as mais diversas letras
              das mais diversas músicas escritas de fãs para fãs, explore os generos ou artistas, ou envie a sua 
              propria caso não encontre a que deseja.
            </p>
          </div>

        </div>
        
      <br>
      <br>
      <br>
            <div style="text-align: center;"><h2>Artistas em destaque</h2></div>
            <hr>
            <div class="container">
              <div class="row">
                <form action="PHP\autoriaEscolhida.php" method="get">
                  <table>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="autoria" value="<?php echo $mus->getnomeDestaqueAutoaria('1');?>"><?php echo $mus->getnomeDestaqueAutoaria('1');?></button></td>
                    </tr>
                    <tr>  
                      <td><button class="btn btn-secondary" type="submit" name="autoria" value="<?php echo $mus->getnomeDestaqueAutoaria('2');?>"><?php echo $mus->getnomeDestaqueAutoaria('2');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="autoria" value="<?php echo $mus->getnomeDestaqueAutoaria('3');?>"><?php echo $mus->getnomeDestaqueAutoaria('3');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="autoria" value="<?php echo $mus->getnomeDestaqueAutoaria('4');?>"><?php echo $mus->getnomeDestaqueAutoaria('4');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="autoria" value="<?php echo $mus->getnomeDestaqueAutoaria('5');?>"><?php echo $mus->getnomeDestaqueAutoaria('5');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="autoria" value="<?php echo $mus->getnomeDestaqueAutoaria('6');?>"><?php echo $mus->getnomeDestaqueAutoaria('6');?></button></td>
                    </tr>
                  </table>  
                </form>                    
              </div>
            </div>  

    </main> 
    <br>
    <br>
    <br>
    <hr>

    <h2>Músicas em destaque</h2>
    <section> 
      <form action="PHP\Letra.php" method="post">   
      <div class="container">
              <div class="row">
                <table>
                  <tr>
                    <td><button class="btn btn-secondary" type="submit" name="musica" value="<?php echo $mus->getIdDestaqueM('1');?>"><?php echo $mus->getNome($idm1);?></button></td>
                    </tr>
                    <tr>
                    <td><button class="btn btn-secondary" type="submit" name="musica" value="<?php echo $mus->getIdDestaqueM('2');?>"><?php echo $mus->getNome($idm2);?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="musica" value="<?php echo $mus->getIdDestaqueM('3');?>"><?php echo $mus->getNome($idm3);?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="musica" value="<?php echo $mus->getIdDestaqueM('4');?>"><?php echo $mus->getNome($idm4);?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="musica" value="<?php echo $mus->getIdDestaqueM('5');?>"><?php echo $mus->getNome($idm5);?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="musica" value="<?php echo $mus->getIdDestaqueM('6');?>"><?php echo $mus->getNome($idm6);?></button></td>
                  </tr>
                </table>  
              </div>
            </div> 
        </section>
        </form>
        <br><br>  
        <?php
        include_once("PHP/footer.php");  
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
</body>
</html> 
