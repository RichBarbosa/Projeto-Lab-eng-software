<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Imagem.php');
require_once('../PHP\classes\Usuario.php');
$cat = new Imagem();
if(!empty( $_SESSION['nome'])){  
  include_once('header_temaJogo.php');
}else{  
  include_once('header_nao_logado.php');

 } ?>
<br><br><br>
<?php 
    if(isset($_GET['escolha'])){
        $categoria = $_GET['escolha'];
    }
    else{
      $categoria = $_SESSION['categoria'] ;
    } 
    $idImagem = null;
    $caminho = null;
    if(!empty($_SESSION['nome'])){
          $id = $_SESSION['nome'];
    }else{
      $id = null;
    }
    $nome = null;

    ?>
<main>
<div class="btn-group" role="group" aria-label="Basic example">
     <form action="tema_categoria_jogo copy.php" method="get">
       <input type="hidden" name="escolha" value="<?php echo $categoria;?>">
      <button type="submit" class="btn btn-light">Categoria</button>  
       </form>
</div>
    <h3 style="text-align:center"><?php echo $categoria ?> </h3>

    <form action="favoritarJ.php" method="post">
    <input type="hidden" name="categoria" value="<?php echo $categoria?>">
    <?php 
    $favnome = $categoria;
    $fav = $cat->verificarCatJogoFavorita($favnome, $id);
    if($fav){?>
    <div class="container" style="text-align: center">
      <br><button class="btn btn-outline-light" type ="submit" name="nmCat" value="<?php echo $categoria;?>" ><img class="img-thumbnail" 
            src="../img/suit-heart-fill.svg"  alt=""></button>
  </div>
  <?php }else{ ?>
    <div class="container" style="text-align: center">
    <form action="favoritarJ.php" method="post">
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
                <p>Atualmente possuimos <?php echo count($cat->listarImagemJogo($categoria)) . " ";?> imagens nessa categoria</p>
            </div>
  </div>
  <br><br><br> 
  <hr/>       
    <div class="container">
      <div class="row">
        <?php foreach($cat->listarImagemJogo($categoria) as $col){ ?> 
        <div class="col-sm-6">
          <form action="imagemJogoEscolhida copy.php" method="GET">
            <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
          <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
          </Form>
                   <ul class="list-group list-group-horizontal">
                   <?php echo ".";?><li><h6><?php echo $cat->getJogoTag1($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getJogoTag2($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getJogoTag3($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getJogoTag4($col['id'])?></h6></li><?php echo ".";?>
                   <?php echo ".";?><li><h6><?php echo $cat->getJogoTag5($col['id'])?></h6></li><?php echo ".";?>
                    </ul>
<ul class="list-group list-group-horizontal">
  <form action="favoritarJ.php" method="post">
    <input type="hidden" name="categoria" value="<?php echo $categoria?>">
    <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
    <?php 
    $favnome = $cat->getNomeJogo($col['id']);
    $fav = $cat->verificarFavorita($favnome, $id);
    if($fav){?>
  <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
  src="../img/suit-heart-fill.svg"  alt=""></button></li>
  
  <?php }else{ ?>
    <form action="favoritarJ.php" method="post">
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
?>    
