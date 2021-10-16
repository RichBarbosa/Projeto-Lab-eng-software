<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\NSFW.php');
$idImagem = null;
$caminho = null;
$comentario = null;

$con = new Usuario();
$cat = new NSFW();
if(!empty($_SESSION['nome'])){
  $id = $_SESSION['nome'];
  if($con->getConfirmacao($id) == "S" || $con->getAdmin($id) == "S"){
  include_once('header_NSFW.php');?>

<?php 
    if(isset($_GET['imagem'])){
        $idImagem = $_GET['imagem'];
        $nImagem = $_GET['nImagem'];
        $contView = $cat->getViews($nImagem);
        $contView = $contView + 1;
        try{
          $cat->inserirVisualizacao($nImagem, $contView);
        }catch(Exception $e){

        }
    }
    else{
      $idImagem = $_SESSION['NSFW'];
      $nImagem = $cat->getNome($idImagem);
    }
?>
<main>
<div class="btn-group" role="group" aria-label="Basic example">
     <form action="tema_NSFW.php" method="get">
       <input type="hidden" name="escolha" value="<?php echo $cat->getCategoriaByNome($nImagem);?>">
      <button type="submit" class="btn btn-light">Categoria</button>  
       </form>
         <button type="button" class="btn btn-light">conteúdos</button>
</div>
<div class="container">
  <!--
  <h6 style="text-align:end;">
    nota dos usuários:  <?php //echo  round($con->getMediaNota($nImagem), 2);?>
</h6>
  -->
 <div class="imgT">
    <img src="<?php echo $cat->getCaminho($idImagem);?>" class="img-thumbnail" alt="...">
  </div>
  </div>
<hr/>       
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <ul class="list-group list-group-horizontal">
        <form action="Tag_NSFW.php" method="get">
        <?php if(!empty($cat->getTag1($idImagem))){?>
          <li><button type="submit" name="tag" value="<?php echo $cat->getTag1($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getTag1($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getTag2($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getTag2($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getTag2($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getTag3($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getTag3($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getTag3($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getTag4($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getTag4($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getTag4($idImagem)?></h6> </button></li>
       <?php }?>
       <?php if(!empty($cat->getTag5($idImagem))){?>
       <li><button type="submit" name="tag" value="<?php echo $cat->getTag5($idImagem)?>" class="btn btn-light">
       <h6><?php echo $cat->getTag5($idImagem)?></h6> </button></li>
       <?php }?>
        </ul>
        </form>
        <br>
        <?php //bagulho de avaliação, ta desativado por hora
        /* if (!empty($_SESSION['nome'])) {?>        
          <h6>dê uma avaliação</h6>
            <form action="avaliar.php" method="post">
              <?php
              $nota = $con->getNota($id, $nImagem);
              ?>
              <input type="hidden" name="tipo" value="imagem">
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
        <?php }*/?>  
        <?php if ($cat->getViews($nImagem)== 1) {?>
          <h6 style="text-align: end;"><?php echo $cat->getViews($nImagem);?> visualização</h6>
        <?php }else{ ?>
          <h6 style="text-align: end;"><?php echo $cat->getViews($nImagem);?> visualizações</h6>
          <?php }?>
        <ul class="list-group list-group-horizontal">
          <form action="favoritar_NSFW.php" method="post">
            <?php 
              $favnome = $cat->getNome($idImagem);
              $fav = $cat->verificarFavorita($favnome, $id);
              $curtido = $con->verificarCurtido($favnome, $id);
              if($fav){?>
                      <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $idImagem;?>" ><img class="img-thumbnail" 
                        src="../img/suit-heart-fill.svg"  alt=""></button></li> 
            <?php }else{ ?>
                        <form action="favoritar_NSFW.php" method="post">
                          <input type="hidden" name="caminho" value="<?php echo $cat->getCaminho($idImagem);?>">
                            <li><br><button class="btn btn-outline-success" type ="submit"
                            name="favoritar" value="<?php echo $idImagem;?>"
                            <?php if (empty($_SESSION['nome'])){?> 
                            disabled> é preciso estar logado para favoritar</button>
                           <?php }else { ?>
                            >Adicionar como favorita</button><?php }?> </li>
            <?php } ?>
                        </form>
                      
                        <?php 
                       if($curtido){?>
                       <form action="curtir.php" method="post">
                        <li><br><button class="btn btn-success" type ="submit" name="descurtirN" value="<?php echo $idImagem;?>" >curtido!</button></li>
                        </form> 
              <?php }else{ ?>
                          <form action="curtir.php" method="post">
                              <li><br><button class="btn btn-outline-success" type ="submit"
                              name="curtirN" value="<?php echo $idImagem;?>"
                              <?php if (empty($_SESSION['nome'])){?> 
                              disabled> é preciso estar logado para curtir</button>
                             <?php }else { ?>
                              >curtir!</button><?php }?> </li>
              <?php } ?>
                          </form>
                        <li><button class="btn btn-outline-light"> 
                        <a href="<?php echo $cat->getCaminho($idImagem);?>" download="<?php echo $idImagem + 0310; ?>"><img class="img-thumbnail" 
                        src="../img/download.svg" alt=""></a></li>  
                  </ul> 
                  <br>
                  <?php if($cat->getCurtido($nImagem) == 1){?>
                  <h6> <?php echo $cat->getCurtido($nImagem) . " ";?> curtida!</h6>
                  <?php }else{ ?>
                    <h6> <?php echo $cat->getCurtido($nImagem) . " ";?> curtidas!</h6>
                    <?php }?>
              <hr>
      </div>
  </div>        
</div>
<div class="container-fluid">
<div class="row">
<div class="col-6">
  <form class="d-flex" action="comentariosN.php" method="post">
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
      <form action="comentariosN.php" method="post">
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
      <hr>
     </tr>
     </form>
   <?php }?>        
   </table>
   <?php }?>
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
  }else {
    header('Location: ../index.php');
  }
}else {
  header('Location: login.php');
  } 
?>