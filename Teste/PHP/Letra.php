<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Musica.php');

$comentario = null;

$con = new Usuario();
$cat = new musica();
if(!empty($_SESSION['nome'])){
  $id = $_SESSION['nome'];
  include_once('header_temaMusica.php');
}else{ 
$id = null;
  include_once('header_nao_logadoM.php');?>

<body>
<br><br><br> 
<?php } 
    if(isset($_GET['musica'])){
        $idMusica = $_GET['musica'];
        $autoria = $_GET['autoria'];
        $genero = $_GET['genero'];
        $musica = $cat->getNome($idMusica);
        $idUser = $cat->getUser($idMusica);
        $contView = $cat->getViews($idMusica);
        $contView = $contView + 1;
        try{
          $cat->inserirVisualizacao($idMusica, $contView);
        }catch(Exception $e){

        }
    }
    else{
      $idMusica = $_SESSION['musica'];
      $musica = $cat->getNome($idMusica);
      $autoria = $cat->getAutoriaById($idMusica);
      $genero = $cat->getGeneroByAutoria($autoria);
      $idUser = $cat->getUser($idMusica);
    }
        
?>
<br><br>
   <main>
     <div style="text-align: center">
     <h3><?php echo $musica;?> </h3>
     <form action="autoriaEscolhida.php" method="get">
     <button type="submit" class="btn btn-light" name="autoria" value="<?php echo $autoria;?>"><h6><?php echo $autoria; ?></h6></button>
    </form>
    </div>
    <div style="text-align:end;" class= "col-sm-10">
      <h6 style="text-align:end;">
        nota dos usuários:  <?php echo  round($con->getMediaNota($musica), 2);?>
      </h6>
    </div>
    <div class="container">
      <br>
      <div class=row>
        <div class="col-3">
           <br>
          
        </div>
        <div class="col-3"></div>
        <div class="col-3">
         

        </div>
        <div class="col-3">
        </div>
      </div>
      <br><br><hr>
      <?php if($con->getAdmin($id) =="S" || $id == $idUser ) {?>
          <form action="editar_letra.php" method="get">
          <input type="hidden" name="nome_musica" value="<?php echo $musica;?>">
          <input type="hidden" name="idUser" value="<?php echo $idUser?>">
          <button type="submit" class="btn btn-outline-success" name="id" value="<?php echo $idMusica?>">Editar</button>

          </form>
        <?php }?>
      <div class="row">
        <div class="col-6">
          <h5>Letra Original</h5>
          <pre>
            <h6>
              <br>
           <b><?php echo $cat->getLetra($idMusica);?></b>
        </h6>
          <form action="LetraUser.php" method="get">
              <input type="hidden" name="dono" value="<?php echo $con->getUser($idUser);?>">
              <h6 style="text-size: small"> enviada por <button class="btn btn-light" name="User" value="<?php echo $idUser;?>" type="submit"><b><?php echo $con->getUser($idUser);?></b></button></h6>
          </form>
        <br>  
          </pre>
                  <h6 style="text-size: smaller"><b>Nós apenas divulgamos traduções e letras feitas por fãs. Caso tenha
                interesse na música sugerimos buscar pelos meios oficiais.</b></h6>
                
        </div>
        <?php if(!empty($cat->getTraducao($idMusica))){ ?>
        <div class="col-6">
        <h5><button class="btn btn-outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Essa música possui uma tradução, clique aqui para exibi-lá.
              </button></h5>
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                 <pre>
                  <h6>
                    <b><?php echo $cat->getTraducao($idMusica);?></b>
                  </h6>
                  <h6 style="text-size: small"> enviada por<b> <?php echo $con->getUser($idUser); ?></b></h6>                        
                </pre>
                </div>
                <?php }?>
              </div>        
        </div>
        <?php ?>

      </div>
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-6">
        <br>
        <?php if (!empty($_SESSION['nome'])) {?>        
          <h6>dê uma avaliação</h6>
            <form action="avaliar.php" method="post">
              <?php
              $nota = $con->getNota($id, $musica);
              ?>
              <input type="hidden" name="tipo" value="musica">
              <input type="hidden" name="nome" value="<?php echo $musica; ?>">
              <input type="hidden" name="idImagem" value="<?php echo $idMusica;?>">
              <div class="btn-group" role="group" aria-label="Basic example">
                <?php if ($nota == 1) {?>
                  <button type="submit" name="voto" value="1" class="btn btn-success">1</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="1" class="btn btn-outline-success">1</button>
                <?php }?>
                <?php if ($nota == 2) {?>
                  <button type="submit" name="voto" value="2" class="btn btn-success">2</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="2" class="btn btn-outline-success">2</button> 
                <?php }?>
                <?php if ($nota == 3) {?>
                  <button type="submit" name="voto" value="3" class="btn btn-success">3</button>
                <?php }else{ ?>
                <button type="submit" name="voto" value="3" class="btn btn-outline-success">3</button>
                <?php }?>
                <?php if ($nota == 4) {?>
                  <button type="submit" name="voto" value="4" class="btn btn-success">4</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="4" class="btn btn-outline-success">4</button>
                <?php }?>
                <?php if ($nota == 5) {?>
                  <button type="submit" name="voto" value="5" class="btn btn-success">5</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="5" class="btn btn-outline-success">5</button> 
                <?php }?>
                <?php if ($nota == 6) {?>
                  <button type="submit" name="voto" value="6" class="btn btn-success">6</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="6" class="btn btn-outline-success">6</button>
                <?php }?>
                <?php if ($nota == 7) {?>
                  <button type="submit" name="voto" value="7" class="btn btn-success">7</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="7" class="btn btn-outline-success">7</button> 
                <?php }?>
                <?php if ($nota == 8) {?>
                  <button type="submit" name="voto" value="8" class="btn btn-success">8</button>
                <?php }else{ ?>
                <button type="submit" name="voto" value="8" class="btn btn-outline-success">8</button>
                <?php }?>
                <?php if ($nota == 9) {?>
                  <button type="submit" name="voto" value="9" class="btn btn-success">9</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="9" class="btn btn-outline-success">9</button>
                <?php }?>
                <?php if ($nota == 10) {?>
                  <button type="submit" name="voto" value="10" class="btn btn-success">10</button>
                <?php }else{ ?>
                  <button type="submit" name="voto" value="10" class="btn btn-outline-success">10</button> 
                <?php }?>      
            </div>
          </form>
        <?php }?>
        <?php if ($cat->getViews($idMusica)== 1) {?>
          <h6 style="text-align: end;"><?php echo $cat->getViews($idMusica);?> visualização</h6>
        <?php }else{ ?>
          <h6 style="text-align: end;"><?php echo $cat->getViews($idMusica);?> visualizações</h6>
          <?php }?>
    <ul class="list-group list-group-horizontal">
      <form action="favoritar_musica.php" method="post">
          <?php 
            $favnome = $musica;
                  $fav = $cat->verificarMusicaFavorita($favnome, $id);
                  $curtido = $con->verificarCurtido($favnome, $id);
                  if($fav){?>
                          <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $idMusica;?>" ><img class="img-thumbnail" 
                            src="../img/suit-heart-fill.svg"  alt=""></button></li> 
                <?php }else{ ?>
                            <form action="favoritar_musica.php" method="post">
                              <input type="hidden" name="idMusica" value="<?php echo $idMusica;?>">
                                <li><br><button class="btn btn-outline-success" 
                                type ="submit" name="favoritar" value="<?php echo $musica;?>" 
                                <?php if (empty($_SESSION['nome'])){?> 
                                disabled> é preciso estar logado para favoritar</button>
                                <?php }else { ?>
                                >Adicionar como favorita</button><?php }?>
                                <?php } ?>
                            </form>
                            <br><br>
                            <?php 
                       if($curtido){?>
                       <form action="curtir.php" method="post">
                        <li><br><button class="btn btn-success" type ="submit" name="descurtirM" value="<?php echo $idMusica;?>" >curtido!</button></li>
                        </form> 
              <?php }else{ ?>
                          <form action="curtir.php" method="post">
                              <li><br><button class="btn btn-outline-success" type ="submit"
                              name="curtirM" value="<?php echo $idMusica;?>"
                              <?php if (empty($_SESSION['nome'])){?> 
                              disabled> é preciso estar logado para curtir</button>
                             <?php }else { ?>
                              >curtir!</button><?php }?> </li>
              <?php } ?>
                          </form> 
                  </ul> 
                  <br>
                  <?php if($cat->getCurtido($idMusica) == 1){?>
                    <br>
                  <h6> <?php echo $cat->getCurtido($idMusica) . " ";?> curtida!</h6>
                  <?php }else{ ?>
                    <h6> <?php echo $cat->getCurtido($idMusica) . " ";?> curtidas!</h6>
                    <?php }?>
            </div> 
      </div>        
    </div>
        <div class="container">
           <br>
          <?php if(!empty($cat->getLinkS($idMusica))){ ?>
          <a href="<?php echo $cat->getLinkS($idMusica); ?>" target="_blank">
          <button type="button" class="btn btn-outline-success">é possivel acessar essa música
            externamente! Clique aqui.
          </button></a>
            <?php }?>  
        </div>
    <br><br>
    <div class="container-fluid">
    <div class="row">
    <div class="col-6">
      <form class="d-flex" action="comentariosM.php" method="post">
        <input type="hidden" name="idMusica" value="<?php echo $idMusica;?>">
       <?php if($id == null){ ?>
        <h6>para comentar é preciso estar logado </h6>
       <?php }else{ ?>
          <h6>adcionar um comentário </h6>
          <textarea class="form-control" name="comentario" id="com" cols="30" rows=""></textarea>
          <button class="btn btn-outline-success" type="submit">Comentar</button>
          <?php } ?>
  </form>
                </div>
                </div>
                <div class="container-fluid">
                  <hr>
    <div class="row">
                <div class="col-6">
          <br>
         <?php if(count($con->getComentario($musica)) < 1){ ?>
      <h6>seja o primeiro a comentar!</h6>
   <?php }else{ ?>
    <h3> <?php echo count($con->getComentario($musica)) . " ";?> comentários!</h3>
   </hr>
   <br>                
          <?php foreach($con->getComentario($musica) as $col){ ?> 
          <form action="comentariosM.php" method="post">
          <table>  
         <tr>
           <td><h5><?php echo $col['user'];?> comentou:</h5>
           <?php if($col['editado'] == "S"){ ?>
        <h6 style="font-size: small;">editado</h6>
        <?php }?>
          </td>
         </tr>
         <tr>
           <td id="com">
             <input type="hidden" name="idMusica" value="<?php echo $idMusica?>">
             <h5><?php echo $col['comentario']. "<br>". "<h6>" .$col['data_atual']."</h6>";?> <?php if ($id == $col['id']){ 
               ?><br><textarea name="edit" id="" cols="30" rows=""></textarea> <button class="btn btn-outline-danger" type="submit" name="idComEdit" value="<?php echo $col['id_com'];?>">editar </button> <button class="btn btn-outline-danger" type="submit" name="idCom" value="<?php echo $col['id_com'];?>">apagar? </button><?php }?>
               </h5></td>
            </form>  
          <hr>
         </tr>
       <?php }?>        
       </table>
       <?php } ?>
  </main>
  <br><br><br><br><br><br><br><br><br>
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