<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\NSFW.php');
require_once('../PHP\classes\Usuario.php');
$img = new NSFW();
$user = new Usuario();
if(!empty( $_SESSION['nome'])){
  $id = $_SESSION['nome']; 
  if($user->getConfirmacao($id) == "S" || $user->getAdmin($id) == "S"){

  include_once('header_NSFW.php');
  ?>

  <main>
    <?php 
     
       if(!empty($_GET['tag'])){ 
        $busca = $_GET['tag'];
        ?>
          <div class="container-fluid">
            <div class="row" style="text-align:center">
              <h3>Conteúdo marcado com a tag <?php echo $busca; ?> </h3>
              <br><br><br><hr>
            </div>
            
            <div class="row">
              <div class="col-8">
                <?php 
                  foreach($img->getCaminhoByTag($busca) as $col){ ?> 
                    <form action="NSFWEscolhido.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <form action="" method="get">
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
                    </form>
                    <ul class="list-group list-group-horizontal">
                      <li><button class="btn btn-outline-light"> 
                        <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
                                    src="../img/download.svg" alt=""></a></li>
                    </ul>         
                        </hr>
                <?php 
                  } ?>         
              </div>
              <div class="col-6">
               
              </div>
            </div>
          </div> 
<?php }?>     
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
