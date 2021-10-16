<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\NSFW.php');
require_once('../PHP\classes\Usuario.php');
$user = new Usuario();
$img = new NSFW();
if(!empty( $_SESSION['nome'])){
  $id = $_SESSION['nome'];
  if($user->getConfirmacao($id) == "S" || $user->getAdmin($id) == "S"){ 
  include_once('header_NSFW.php');
  
  
  ?>

  <main>
    <?php 
      if(isset($_GET['buscar'])){
          $busca = $_GET['buscar'];
          if($img ->listarCategoriasByInicial($busca) != null){ ?>
            <form action="tema_NSFW.php" method="GET">
              <h6>contúdos encontrados</h6>
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
              
    <?php 
          }else{ ?>
        <h5>Ops... não foi encontrado nada..</h5>
        <h5>gostaria de buscar por tag?</h5>
        <div class="container-fluid">
          <form class="d-flex" action="" method="GET">
            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="buscarTag" autocomplete="off">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <br><br><br><br><br><br><br><br><br>

        </div>     
    <?php }
      } if(!empty($_GET['buscarTag'])){ 
        $busca = $_GET['buscarTag'];
        if($img->getCaminhoByTag($busca)){?>
          <div class="container-fluid">
            <div class="row">
              <h3>Conteúdo marcado com a tag <?php echo $busca; ?> </h3>
              <br><br><br><hr>
            </div>
            <div class="row">
              <div class="col-6">
                <?php 
                  foreach($img->getCaminhoByTag($busca) as $col){ ?> 
                    <form action="NSFWEscolhido copy.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <form action="Tag_NSFW.php" method="get">
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
            </div>
          </div>
    <?php }else if(empty($img->getCaminhoByTag($busca))){?>
      <h5>Ops... não foi encontrado nada..</h5>
        <h5>gostaria de buscar por tag?</h5>
        <div class="container-fluid">
          <form class="d-flex" action="" method="GET">
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
  }else {
    header('Location: ../index.php');
  }
}else {
  header('Location: login.php');
}  
?>    
