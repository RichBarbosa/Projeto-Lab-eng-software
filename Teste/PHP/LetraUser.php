<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Musica.php');
require_once('../PHP\classes\Usuario.php');
$mus = new Musica();
$con = new Usuario();
if(!empty( $_SESSION['nome'])){  
  include_once('header_temaMusica.php');
  $id = $_SESSION['nome'];
}else{  
  include_once('header_nao_logadoM.php');?>

<br><br><br>
  <?php } ?>
  <main>
    <?php 
     
       if(!empty($_GET['User'])){ 
        $user = $_GET['User'];
        $dono = $_GET['dono']; 
        ?>
          <div class="container-fluid">
            <div class="row" style="text-align:center">
              <h4>Letras enviadas pelo usuário <?php echo $dono; ?> </h4>
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
                <ul class="list-group">
                  <?php
                    if($mus->getMusicaByUser($user)){ 
                      foreach($mus->getMusicaByUser($user) as $col){ ?> 
                        <form action="Letra.php" method="GET">
                          <input type="hidden" name="autoria" value="<?php echo $col['nome_autoria'] ?>">
                          <input type="hidden" name="genero" value="<?php echo $col['nome_genero'] ?>">
                          <li"><button class="btn btn-light" type="submit" name="musica" value="<?php echo $col['id'];?>"><?php echo $col['nome_musica']?></li></button>
                          <br> 
                          </ul>
                      </form>  
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
?>    
