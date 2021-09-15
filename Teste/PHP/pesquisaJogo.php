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
  include_once('header_temaJogo.php');
  $id = $_SESSION['nome'];
}else{
  include_once('header_nao_logado.php')  
  ?>

<br><br><br>
  <?php } ?>

  <main>
  <?php 
      if(isset($_GET['buscar'])){
          $busca = $_GET['buscar'];
          if($img ->listarCategoriasJogoByInicial($busca) != null || $gif ->listarCategoriasJogoByInicial($busca) != null){ ?>
            <form action="tema_categoria_jogo copy.php" method="GET">
              <h6>Imagens</h6>
              <ul class="list-group list-group-horizontal">
                  <?php 
                    foreach ($img->listarCategoriasJogoByInicial($busca) as $col) {?>
                      <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></li></button> 
                      </ul>
                  <?php }?>
              </ul>  
            </form>
              <form action="tema_categoria_jogoGif copy.php" method="GET">
                <h6>gifs</h6>
                <ul class="list-group list-group-horizontal">
                  <?php 
                    foreach ($gif->listarCategoriasJogoByInicial($busca) as $col) {?>
                      <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></li></button> 
                      </ul>
                  <?php }?>
              </form>
    <?php 
          }else{ ?>
        <h5>Ops... não foi encontrado nada..</h5>
        <h5>gostaria de buscar por tag?</h5>
        <div class="container-fluid">
          <form class="d-flex" action="pesquisaJogo.php" method="GET">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="buscarTag" autocomplete="off">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>

        </div>     
    <?php }
      } if(!empty($_GET['buscarTag'])){ 
        $busca = $_GET['buscarTag'];
        if($img->getCaminhoJogoByTag($busca) || $gif->getCaminhoJogoByTag($busca)){?>
          <div class="container-fluid">
            <div class="row">
              <h3>Conteúdo marcado com a tag <?php echo $busca; ?> </h3>
              <br><br><br><hr>
            </div>
            <div class="row">
              <div class="col-6">
                <h4>Imagens</h4>
                <?php 
                  foreach($img->getCaminhoJogoByTag($busca) as $col){ ?> 
                    <form action="imagemJogoEscolhida copy.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <ul class="list-group list-group-horizontal">
                      <?php echo ".";?><li><h6><?php echo $img->getJogoTag1($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $img->getJogoTag2($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $img->getJogoTag3($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $img->getJogoTag4($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $img->getJogoTag5($col['id'])?></h6></li><?php echo ".";?>
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
                  foreach($gif->getCaminhoJogoByTag($busca) as $col){ ?> 
                    <form action="gifJogoEscolhido copy.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <ul class="list-group list-group-horizontal">
                      <?php echo ".";?><li><h6><?php echo $gif->getJogoTag1($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $gif->getJogoTag2($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $gif->getJogoTag3($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $gif->getJogoTag4($col['id'])?></h6></li><?php echo ".";?>
                      <?php echo ".";?><li><h6><?php echo $gif->getJogoTag5($col['id'])?></h6></li><?php echo ".";?>
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
    <?php }else if(empty($img->getCaminhoJogoByTag($busca)) && empty($gif->getCaminhoJogoByTag($busca))){?>
      <h5>Ops... não foi encontrado nada..</h5>
        <h5>gostaria de buscar por tag?</h5>
        <div class="container-fluid">
          <form class="d-flex" action="pesquisaJogo.php" method="GET">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="buscarTag" autocomplete="off">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
     <?php }
      
    }?>

</main>  
<br><br><br>
<br><br><br>
<br><br><br>
<br><br><br>

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
