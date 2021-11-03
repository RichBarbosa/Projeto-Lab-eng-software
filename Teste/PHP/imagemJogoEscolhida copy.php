<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Imagem.php');
$idImagem = null;
$caminho = null;
$comentario = null;

$con = new Usuario();
$cat = new Imagem();
if(!empty($_SESSION['nome'])){
  $id = $_SESSION['nome'];
  include_once('header_temaJogo.php');
}else{ 
$id = null;
  include_once('header_nao_logado.php');?>

<body>
<br><br><br> 
<?php } 
    if(isset($_GET['imagem'])){
        $idImagem = $_GET['imagem'];
        $nImagem = $_GET['nImagem'];
        $contView = $cat->getJogoViews($nImagem);
        $contView = $contView + 1;
        try{
          $cat->inserirJogoVisualizacao($nImagem, $contView);
        }catch(Exception $e){

        }
    }
    else{
      $idImagem = $_SESSION['imagem'];
      $nImagem = $cat->getNomeJogo($idImagem);

    }
        
?>
   <main>
   <div class="btn-group" role="group" aria-label="Basic example">
     <form action="tema_categoria_jogo copy.php" method="get">
       <input type="hidden" name="escolha" value="<?php echo $cat->getCategoriaJogoByNome($nImagem);?>">
      <button type="submit" class="btn btn-light">Categoria</button>  
       </form>
         <button type="button" class="btn btn-light">Imagem</button>
</div>
    <div style="text-align:end;" class= "col-sm-10">
      <h6 style="text-align:end;">
        nota dos usuários:  <?php echo  round($con->getMediaNota($nImagem), 2);?>
      </h6>
    </div>       
    <table class="table">
      <tr>
        <th></th>
      </tr>
      <tr>
        <td><img src="<?php echo $cat->getCaminhoJogo($idImagem);?>" class="img-thumbnail" alt="..."> </td>
      </tr>    
    </table>
    <hr/>       
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
        <ul class="list-group list-group-horizontal">
        <form action="Tag_jogo_imagem.php" method="get">
        <?php if(!empty($cat->getJogoTag1($idImagem))){?>
          <li><button type="submit" name="tag" value="<?php echo $cat->getJogoTag1($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getJogoTag1($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getJogoTag2($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getJogoTag2($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getJogoTag2($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getJogoTag3($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getJogoTag3($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getJogoTag3($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getJogoTag4($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getJogoTag4($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getJogoTag4($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getJogoTag5($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getJogoTag5($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getJogoTag5($idImagem)?></h6> </button></li>
       <?php }?>
        </ul>       
        </form>
        <br>
        <div class= "col-sm-4">
          <?php
            $IDdono = $cat->getUser($idImagem, 2);
            $dono = $con->getUser($IDdono);
            if($dono != null){?>
              <form method="get" action="imagensUserJ.php">
                <input type="hidden" name="genero" value="2">
                <h6>enviado por:
                  <button class="btn btn-light" name="User" value="<?php echo $IDdono;?>" type="submit"><b><?php echo $dono;?></b></button></h6>
              </form>
          <?php }?>
        </div>
        <br>
        <?php if (!empty($_SESSION['nome'])) {?>        
          <h6>dê uma avaliação</h6>
            <form action="avaliar.php" method="post">
              <?php
              $nota = $con->getNota($id, $nImagem);
              ?>
              <input type="hidden" name="tipo" value="imagemJ">
              <input type="hidden" name="nome" value="<?php echo $nImagem; ?>">
              <input type="hidden" name="idImagem" value="<?php echo $idImagem;?>">
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
        <?php if ($cat->getJogoViews($nImagem)== 1) {?>
          <h6 style="text-align: end;"><?php echo $cat->getJogoViews($nImagem);?> visualização</h6>
        <?php }else{ ?>
          <h6 style="text-align: end;"><?php echo $cat->getJogoViews($nImagem);?> visualizações</h6>
          <?php }?>
            <ul class="list-group list-group-horizontal">
              <form action="favoritar_imagemJ.php" method="post">
                <?php 
                  $favnome = $cat->getNomeJogo($idImagem);
                  $fav = $cat->verificarJogoFavorita($favnome, $id);
                  $curtido = $con->verificarCurtido($favnome, $id);
                  if($fav){?>
                          <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $idImagem;?>" ><img class="img-thumbnail" 
                            src="../img/suit-heart-fill.svg"  alt=""></button></li> 
                <?php }else{ ?>
                            <form action="favoritar_imagemJ.php" method="post">
                              <input type="hidden" name="caminho" value="<?php echo $cat->getCaminhoJogo($idImagem);?>">
                              <input type="hidden" name="categoriaFavorito" value="Jogo">
                              <input type="hidden" name="tipoFavorito" value="Imagem">
                                <li><br><button class="btn btn-outline-success" 
                                type ="submit" name="favoritar" value="<?php echo $idImagem;?>" 
                                <?php if (empty($_SESSION['nome'])){?> 
                                disabled> é preciso estar logado para favoritar</button>
                                <?php }else { ?>
                                >Adicionar como favorita</button><?php }?>
                                <?php } ?>
                            </form>
                            <?php 
                       if($curtido){?>
                       <form action="curtir.php" method="post">
                        <li><br><button class="btn btn-success" type ="submit" name="descurtirIJ" value="<?php echo $idImagem;?>" >curtido!</button></li>
                        </form> 
              <?php }else{ ?>
                          <form action="curtir.php" method="post">
                              <li><br><button class="btn btn-outline-success" type ="submit"
                              name="curtirIJ" value="<?php echo $idImagem;?>"
                              <?php if (empty($_SESSION['nome'])){?> 
                              disabled> é preciso estar logado para curtir</button>
                             <?php }else { ?>
                              >curtir!</button><?php }?> </li>
              <?php } ?>
                          </form>
                        <li><button class="btn btn-outline-light"> 
                        <a href="<?php echo $cat->getCaminhoJogo($idImagem);?>" download="<?php echo $idImagem + 0310; ?>"><img class="img-thumbnail" 
                        src="../img/download.svg" alt=""></a></li>  
                  </ul> 
                  <br>
                  <?php if ($cat->getJogoCurtido($nImagem) == 1){?>
                  <h6> <?php echo $cat->getJogoCurtido($nImagem) . " ";?> curtida!</h6>
                  <?php }else{ ?>
                    <h6> <?php echo $cat->getJogoCurtido($nImagem) . " ";?> curtidas!</h6>
                    <?php }?>
              <hr>
      </div>        
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-6">
      <form class="d-flex" action="comentariosJ.php" method="post">
        <input type="hidden" name="idimagem" value="<?php echo$idImagem;?>">
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
         <?php if(count($con->getComentario($nImagem)) < 1){ ?>
      <h6>seja o primeiro a comentar!</h6>
   <?php }else{ ?>
    <h3> <?php echo count($con->getComentario($nImagem)) . " ";?> comentários!</h3>
   </hr>
   <br>                
          <?php foreach($con->getComentario($nImagem) as $col){ ?> 
          <form action="comentariosJ.php" method="post">
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
             <input type="hidden" name="idImagem" value="<?php echo $idImagem?>">
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