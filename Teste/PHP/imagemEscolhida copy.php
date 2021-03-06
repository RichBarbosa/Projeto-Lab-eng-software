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
  include_once('header_tema.php');
}else{ 
$id = null;?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--icone no título, mano eu to perplexo q é só essa tag link para colocar icones,
    krl, pq ninguém fala que é tão simples assim?-->
    <link rel="icon" href="../img/bull-horns_39319.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../CSS/menu.css">

    
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Temas</title>
    
    <!--um pouco de CSS no código mesmo, eu também to usando uma stylesheet separada mas né? 
      as vezes da preguiça de ficar trocando de arquivo-->
    <style>
      #b1{
        font-family: Arial, Helvetica, sans-serif;
        font-size: medium;
      }
      #b2{
        font-family: Arial, Helvetica, sans-serif;
        font-size: medium;
      }
      #a1{
        font-family: Arial, Helvetica, sans-serif;
        font-size: x-large;
        padding: 0;
        border: 0;
      }
      .imgT{
        height:500px;
        width: 500px;
     }
    </style>
   
</head>

   <header id="top" >          
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php" id="a1">
                        <img src="../img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                    <form action="login.php" id="login" method="POST"></form>
                    <form action="cadastro.php" id="cadastro" method="POST"></form>
                    <div class="d-grid gap-2 d-md-block">
                      
                    <button class="btn btn-secondary" type="submit" form="login" id="b1">Entrar</button>
                      <button class="btn btn-secondary" type="submit" form="cadastro" id="b2">Cadastrar</button>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisa.php" method="GET">
                            <input class="form-control " type="search" placeholder="Pesquisar" aria-label="Search"  name="buscar" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                    <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <ul class="nav navbar-dark bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="../Jogos.php"><button class="btn btn-secondary" type="button">Jogos</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Animes.php"><button class="btn btn-secondary" type="button">Animes</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../Musicas.php"><button class="btn btn-secondary" type="button">Músicas</button></a>
            </li>
        </ul>
  </div>
</div>
                </nav>
            </nav>
        
        <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <ul class="nav navbar-dark bg-dark">
    <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria.php"><button class="btn btn-secondary" type="button">Buscar por imagens</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria_gif.php"><button class="btn btn-secondary" type="button">Buscar gifs</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Subimicao.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Submeter conteúdo</button></a>
            </li>
            </li>
        </ul>
  </div>
</div>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>    
   </header> 
<body>
<br><br><br> 
<?php } 
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
      $idImagem = $_SESSION['imagem'];
      $nImagem = $cat->getNome($idImagem);

    }
?>
<main>
<div class="btn-group" role="group" aria-label="Basic example">
     <form action="tema_categoria copy.php" method="get">
       <input type="hidden" name="escolha" value="<?php echo $cat->getCategoriaByNome($nImagem);?>">
      <button type="submit" class="btn btn-light">Categoria</button>  
       </form>
         <button type="button" class="btn btn-light">Imagem</button>
</div>
<div class="container">
  <div class="row">
    <div class= "col-sm-2">
    <?php /*
      $IDdono = $cat->getUser($idImagem);
      $dono = $con->getUser($IDdono);
      if($dono != null){?>
        <form method="get" action="imagensUserA.php">
          <input type="hidden" name="genero" value="1">
          <h6>enviado por: <button class="btn btn-light" name="User" value="<?php echo $IDdono;?>" type="submit"><b><?php echo $dono;?></b></button></h6>
        </form>
    <?php }*/?>
    </div>
    <div style="text-align:end;" class= "col-sm-10">
      <h6 style="text-align:end;">
        nota dos usuários:  <?php echo  round($con->getMediaNota($nImagem), 2);?>
      </h6>
    </div>
  </div>  
  <div class ="row">
    <img src="<?php echo $cat->getCaminho($idImagem);?>" class="img-thumbnail" alt="...">
  </div>
</div>
<hr/>       
<div class="container">
  <div class="row">
    <div class="col-sm-6">
        <ul class="list-group list-group-horizontal">
        <form action="Tag_anime_imagem.php" method="get">
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
        <div class= "col-sm-4">
          <?php
            $IDdono = $cat->getUser($idImagem, 1);
            $dono = $con->getUser($IDdono);
            if($dono != null){?>
              <form method="get" action="imagensUserA.php">
                <input type="hidden" name="genero" value="1">
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
        <?php }?>  
        <?php if ($cat->getViews($nImagem)== 1) {?>
          <h6 style="text-align: end;"><?php echo $cat->getViews($nImagem);?> visualização</h6>
        <?php }else{ ?>
          <h6 style="text-align: end;"><?php echo $cat->getViews($nImagem);?> visualizações</h6>
          <?php }?>
        <ul class="list-group list-group-horizontal">
          <form action="favoritar_imagem.php" method="post">
            <?php 
              $favnome = $cat->getNome($idImagem);
              $fav = $cat->verificarFavorita($favnome, $id);
              $curtido = $con->verificarCurtido($favnome, $id);
              if($fav){?>
                      <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $idImagem;?>" ><img class="img-thumbnail" 
                        src="../img/suit-heart-fill.svg"  alt=""></button></li> 
            <?php }else{ ?>
                        <form action="favoritar_imagem.php" method="post">
                          <input type="hidden" name="caminho" value="<?php echo $cat->getCaminho($idImagem);?>">
                          <input type="hidden" name="categoriaFavorito" value="Anime">
                          <input type="hidden" name="tipoFavorito" value="Imagem">
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
                        <li><br><button class="btn btn-success" type ="submit" name="descurtirI" value="<?php echo $idImagem;?>" >curtido!</button></li>
                        </form> 
              <?php }else{ ?>
                          <form action="curtir.php" method="post">
                              <li><br><button class="btn btn-outline-success" type ="submit"
                              name="curtirI" value="<?php echo $idImagem;?>"
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
  <form class="d-flex" action="comentarios.php" method="post">
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
      <form action="comentarios.php" method="post">
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
?>