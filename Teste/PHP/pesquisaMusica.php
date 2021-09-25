<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Musica.php');
require_once('../PHP\classes\Usuario.php');
$mus = new Musica();
if(!empty( $_SESSION['nome'])){  
  include_once('header_temaMusica.php');
  $id = $_SESSION['nome'];
}else{
  include_once('header_nao_logadoM.php')  
  ?>

<br><br><br>
  <?php } ?>

  <main>
    <br>
    <div class="container">
     <div class="row">
      <?php
      if(isset($_GET['buscar'])){
          $busca = $_GET['buscar'];
          if($mus ->listarAutoriasByInicial($busca) != null || $mus->listarMusicasByInicial($busca) || $mus->listarGeneroByInicial($busca)){ ?>
            <div class="col-4">
            <form action="autoriaEscolhida.php" method="GET">
              <br><br>
              <h6>Artistas</h6>
              <br>
              <ul class="list-group ">
                  <?php
                  if(empty($mus->listarAutoriasByInicial($busca))){ ?>
                    <h6>nenhum artista encontrado</h6>
                 <?php }else {
                    foreach ($mus->listarAutoriasByInicial($busca) as $col) {?>
                        <li><button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome_autoria'];?>" name="autoria" ><?php echo $col['nome_autoria']?></li></button> 
                      </ul>
                  <?php }
                  }?>
              </ul>  
            </form>
            </div>
              <div class="col-4">
              <form action="Letra.php" method="GET">
                <br><br>
                <h6>Músicas</h6>
                <br>
                <ul class="list-group">
                  <?php
                  if(empty($mus->listarMusicasByInicial($busca))){ ?>
                    <h6>nenhum música encontrada</h6>
                    <?php }else{ 
                    foreach ($mus->listarMusicasByInicial($busca) as $col) {?>
                        <input type="hidden" name="autoria" value="<?php echo $col['nome_autoria'] ?>">
                        <input type="hidden" name="genero" value="<?php echo $col['nome_genero'] ?>">
                        <li"><button class="btn btn-outline-dark" type="submit" name="musica" value="<?php echo $col['id'];?>"><?php echo $col['nome_musica']?></li></button> 
                      </ul>
                  <?php }
                  }?>
              </form>
              </div>
              <div class="col-4">
              <form action="generos.php" method="GET">
                <br><br>
                <h6>Generos</h6>
                <br>
                <ul class="list-group">
                  <?php
                    if(empty($mus->listarGeneroByInicial($busca))){ ?>
                      <h6>nenhum genero encontrado</h6>
                      <?php }else{
                    foreach ($mus->listarGeneroByInicial($busca) as $col) {?>
                        <li><button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></li></button> 
                      </ul>
                  <?php }
                  }?>
              </form>
              </div>
    <?php 
          }else{ ?>
        <h5>Ops... não foi encontrado nada.. verifique se foi escrito corretamente</h5>
           
    <?php }
      } ?>
      </div>
    </div>  
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
