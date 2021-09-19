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
  include_once('header_nao_logado.php'); 
   } ?>
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
            <?php if ($img->getCaminhoByTag($busca) != null && $gif->getCaminhoByTag($busca) != null) {?>
              <div class="btn-group" role="group" aria-label="Basic example" style="text-align:center">
                <button type="submit" name="tag" class="btn btn-outline-secondary" value="<?php echo $busca;?>" form="imagem">Imagens</button>
                <button type="submit" name="tag" class="btn btn-outline-secondary" value="<?php echo $busca;?>" form="gif">Gifs</button>
              </div>
                    <form action="Tag_jogo_imagem.php" method="get" id="imagem"></form>
                    <form action="" method="get" id="gif"></form>
                    <br>
                <?php }?>
            <div class="row">
              <div class="col-8">
                <h4 style="text-align:center">Gifs</h4>
                <?php 
                  foreach($gif->getCaminhoJogoByTag($busca) as $col){ ?> 
                    <form action="gifJogoEscolhido copy.php" method="GET">
                      <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                      <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                    </Form>
                    <form action="" method="get">
                    <ul class="list-group list-group-horizontal">
                    <?php if(!empty($gif->getJogoTag1($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getJogoTag1($col['id']);?>" class="btn btn-light"> <?php echo $gif->getJogoTag1($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getJogoTag2($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getJogoTag2($col['id']);?>" class="btn btn-light"><?php echo $gif->getJogoTag2($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getJogoTag3($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getJogoTag3($col['id']);?>" class="btn btn-light"><?php echo $gif->getJogoTag3($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getJogoTag4($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getJogoTag4($col['id']);?>" class="btn btn-light"><?php echo $gif->getJogoTag4($col['id'])?></h6></li></button>
                      <?php }?>
                      <?php if(!empty($gif->getJogoTag5($col['id']))){?>
                      <li><h6><button type="submit" name="tag" value="<?php echo $gif->getJogoTag5($col['id']);?>" class="btn btn-light"><?php echo $gif->getJogoTag5($col['id'])?></h6></li></button>
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
?>    
