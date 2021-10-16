<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\NSFW.php');
require_once('../PHP\classes\Usuario.php');
$cat = new NSFW();
$user = new Usuario();
if(!empty( $_SESSION['nome'])){
  $id = $_SESSION['nome'];
  if($user->getConfirmacao($id) == "S" || $user->getAdmin($id) == "S"){ 
    include_once('header_NSFW.php');?>
      <main>
        <?php 
          if(isset($_GET['escolha'])){
            $categoria = $_GET['escolha'];
          }
          else{
            $categoria = $_SESSION['categoriaN'] ;
          } 
          $idImagem = null;
          $caminho = null;
          ?>  
          <div class="btn-group" role="group" aria-label="Basic example">
            <form action="" method="get">
              <input type="hidden" name="escolha" value="<?php echo $categoria;?>">
              <button type="submit" class="btn btn-light">Categoria</button>
            </form>
          </div>
          <br><br><br>        
          <h3 style="text-align:center"><?php echo $categoria ?> </h3>
          <form action="favoritarNSFW.php" method="post">
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
              <form action="favoritarNSFW.php" method="post">
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
                <p>Atualmente possuimos <?php echo count($cat->listarImagem($categoria)) . " ";?> imagens nessa categoria</p>
              </div>
            </div>
            <br><br><br> 
            <hr/>       
            <div class="container">
              <div class="row">
                <?php foreach($cat->listarImagem($categoria) as $col){ ?> 
                  <div class="col-sm-6">
                    <form action="NSFWEscolhido.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <form action="Tag_NSFW.php" method="get">
                      <ul class="list-group list-group-horizontal">
                        <?php if(!empty($cat->getTag1($col['id']))){?>
                          <li><h6><button type="submit" name="tag" value="<?php echo $cat->getTag1($col['id']);?>" class="btn btn-light"> <?php echo $cat->getTag1($col['id'])?></h6></li></button>
                        <?php }?>
                        <?php if(!empty($cat->getTag2($col['id']))){?>
                          <li><h6><button type="submit" name="tag" value="<?php echo $cat->getTag2($col['id']);?>" class="btn btn-light"><?php echo $cat->getTag2($col['id'])?></h6></li></button>
                        <?php }?>
                        <?php if(!empty($cat->getTag3($col['id']))){?>
                          <li><h6><button type="submit" name="tag" value="<?php echo $cat->getTag3($col['id']);?>" class="btn btn-light"><?php echo $cat->getTag3($col['id'])?></h6></li></button>
                        <?php }?>
                        <?php if(!empty($cat->getTag4($col['id']))){?>
                          <li><h6><button type="submit" name="tag" value="<?php echo $cat->getTag4($col['id']);?>" class="btn btn-light"><?php echo $cat->getTag4($col['id'])?></h6></li></button>
                        <?php }?>
                        <?php if(!empty($cat->getTag5($col['id']))){?>
                          <li><h6><button type="submit" name="tag" value="<?php echo $cat->getTag5($col['id']);?>" class="btn btn-light"><?php echo $cat->getTag5($col['id'])?></h6></li></button>
                        <?php }?>
                      </ul>
                    </form>
                    <ul class="list-group list-group-horizontal">
                      <form action="favoritarNSFW.php" method="post">
                        <input type="hidden" name="categoria" value="<?php echo $categoria?>">
                        <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
                        <?php 
                          $favnome = $cat->getNome($col['id']);
                          $fav = $cat->verificarFavorita($favnome, $id);
                          if($fav){?>
                            <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
                                src="../img/suit-heart-fill.svg"  alt=""></button></li>    
                        <?php }else{ ?>
                          <form action="favoritarNSFW.php" method="post">
                              <li><br><button class="btn btn-outline-success" type ="submit" 
                                name="favoritar" value="<?php echo $col['id'];?>" 
                              <?php if (empty($_SESSION['nome'])){?> 
                                disabled> é preciso estar logado para favoritar</button>
                              <?php }else { ?>
                                >Adicionar como favorita</button><?php }?> 
                              <?php } ?>
                          </form>
                          <li><button class="btn btn-outline-light"> 
                            <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
                            src="../img/download.svg" alt=""></a>
                      </ul>      
                      <?php if($cat->getCurtido($favnome) == 1) {?>
                        <h6><?php echo $cat->getCurtido($favnome);?> curtida</h6>
                        <?php }else{ ?>
                          <h6><?php echo $cat->getCurtido($favnome);?> curtidas</h6>
                        <?php }?>   
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
  }else {
  header('Location: ../index.php');
  }
}else {
  header('Location: login.php');
}
?>    
