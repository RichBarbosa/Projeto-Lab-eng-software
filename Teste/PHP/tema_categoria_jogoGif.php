<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Gif.php');
require_once('../PHP\classes\Usuario.php');
$cat = new Gif();
if(!empty( $_SESSION['nome'])){  
  include_once('header_temaJogo.php');
}else{  
  include_once('header_nao_logado.php');

 } ?>
<br><br><br>
<main>
    <?php 
    if(isset($_POST['escolha'])){
        $categoria = $_POST['escolha'];
    } 
    $idImagem = null;
    $caminho = null;
    if(!empty($_SESSION['nome'])){
          $id = $_SESSION['nome'];
    }else{
      $id = null;
    }
    $nome = null;

    if(!empty($_POST['categoria'])){
        $categoria = $_POST['categoria'];

        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNomeJogo($idImagem);
          try{
            $cat->deletarImagemJogoFavorita($nome, $id);
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['favoritar'])){
            $idImagem = $_POST['favoritar'];
            $caminho = $_POST['caminho'];
            $nome = $cat->getNomeJogo($idImagem);
            if($id == null){ ?>
              <script>alert('é preciso estar logado para favoritar imagens!') </script>        
      <?php }else{
                try{
                    $cat->inserirJogoFavorita($caminho, $nome, $id); ?>
                    <script>alert("imagem favoritada com sucesso!") </script>
<?php           }catch(Exception $e){
            }
          }  
        }
      }
    ?>
    <h3 style="text-align:center"><?php echo $categoria ?> </h3>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
                <p>Atualmente possuimos <?php echo count($cat->listarGifJogo($categoria)) . " ";?> imagens nessa categoria</p>
            </div>
  </div>
  <br><br><br> 
  <hr/>       
    <div class="container">
      <div class="row">
        <?php foreach($cat->listarGifJogo($categoria) as $col){ ?> 
        <div class="col-sm-6">
          <form action="gifJogoEscolhido.php" method="POST">
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
  <form action="" method="post">
    <input type="hidden" name="categoria" value="<?php echo $categoria?>">
    <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
    <?php 
    $favnome = $cat->getNomeJogo($col['id']);
    $fav = $cat->verificarJogoFavorita($favnome, $id);
    if($fav){?>
  <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
  src="../img/suit-heart-fill.svg"  alt=""></button></li>
  
  <?php }else{ ?>
    <form action="" method="post">
    <li><br><button class="btn btn-outline-success" type ="submit" name="favoritar" value="<?php echo $col['id'];?>" >Adicionar como favorita</button></li>
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
