<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\NSFW.php');
require_once('../PHP\classes\Usuario.php');
$img = new NSFW();
$con = new Usuario();
if(!empty( $_SESSION['nome'])){  
  $id = $_SESSION['nome'];
  if($con->getConfirmacao($id) == "S" || $con->getAdmin($id) == "S"){
    include_once('header_NSFW.php');?>
?>
  <main>
    <?php 
     
       if(!empty($_GET['User'])){ 
        $user = $_GET['User'];
        $dono = $con->getUser($user); 
        ?>
          <div class="container-fluid">
            <div class="row" style="text-align:center">
              <h4>Conteúdo enviado pelo usuário <?php echo $dono; ?> </h4>
            </div>
            <!--
            <div class="row">
            <div class="btn-group" role="group" aria-label="Basic example" style="text-align:center">
                <button type="submit" name="User" class="btn btn-outline-secondary" value="<?//php echo $user;?>" form="imagem">Imagens Anime</button>
                <button type="submit" name="User" class="btn btn-outline-secondary" value="<?//php echo $user;?>" form="gif">Gifs Anime</button>
                <button type="submit" name="User" class="btn btn-outline-secondary" value="<?//php echo $user;?>" form="imagemJ">Imagens Jogo</button>
                <button type="submit" name="User" class="btn btn-outline-secondary" value="<?//php echo $user;?>" form="gifJ">Gifs Jogo</button>
              </div>
              <form action="imagensUserA.php" method="get" id="imagem">
                <input type="hidden" name="genero" value="1">
              </form>
              <form action="gifsUserA.php" method="get" id="gif">
                <input type="hidden" name="genero" value="1">
              </form>
              <form action="imagensUserJ.php" method="get" id="imagemJ">
                <input type="hidden" name="genero" value="2">
              </form>
              <form action="gifsUserJ.php" method="get" id="gifJ">
                <input type="hidden" name="genero" value="2">
              </form>
              <form action="Tag_anime_gif.php" method="get" id="musica"></form>
            </div>-->
            <br><br>
            <div class="row">
              <div class="col-8">
                <?php
                if($img->getCaminhoByUser($user)){ 
                  foreach($img->getCaminhoByUser($user) as $col){ ?> 
                    <form action="NSFWEscolhido.php" method="GET">
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
                    </form>       
                        </hr>
                <?php 
                  } 
                }else{ ?>
                 <h6>esse usuário não enviou nada nessa categoria</h6>
                 <?php }?> 
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
