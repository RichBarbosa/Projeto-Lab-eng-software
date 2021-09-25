<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Musica.php');
$idImagem = null;
$caminho = null;
$comentario = null;

$con = new Usuario();
$cat = new Musica();
if(!empty($_SESSION['nome'])){
  $id = $_SESSION['nome'];
  include_once('header_temaMusica.php');
}else{ 
$id = null;
  include_once('header_nao_logadoM.php');?>

<body>
<br><br><br> 
<?php } 
    if(isset($_GET['autoria'])){
        $autoria = $_GET['autoria'];
    }
    else{
      $autoria = $_SESSION['autoria'];
    }
        
?>
   <main>    
<br><br><br>

<div class="container">
<h4 style="text-align: center;"><?php echo $autoria?> </h4>
<form action="favoritar_artista.php" method="post">
    <input type="hidden" name="autoria" value="<?php echo $autoria?>">
    <?php 
    $favnome = $autoria;
    $fav = $cat->verificarAutFavorita($favnome, $id);
    if($fav){?>
    <div class="container" style="text-align: center">
      <br><button class="btn btn-outline-light" type ="submit" name="nmAut" value="<?php echo $autoria;?>" ><img class="img-thumbnail" 
            src="../img/suit-heart-fill.svg"  alt=""></button>
  </div>
  <?php }else{ ?>
    <div class="container" style="text-align: center">
    <form action="favoritar_artista.php" method="post">
    <br><button class="btn btn-outline-success" type ="submit" 
    name="favoritarAut" value="<?php echo $autoria;?>" 
    <?php if (empty($_SESSION['nome'])){?> 
    disabled> é preciso estar logado para favoritar</button>
    <?php }else { ?>
    >Adicionar como favorita</button><?php }?> </li>
    <?php } ?>
  </form>
  </div>
  <br>
      <div class="container">
    <div class="alert alert-success" role="alert">
            <p>Atualmente possuimos <?php echo count($cat->getMusica($autoria)) . " ";?> músicas do(a) artista <?php echo $autoria;?></p>
        </div>
      </div>
</div>
<hr/>       
<div class="container">
  <div class="row">
  <ul class="list-group list-group-horizontal">
    <?php foreach($cat->getMusica($autoria) as $col){ ?>
      <form action="Letra.php" method="GET">
        <input type="hidden" name="autoria" value="<?php echo $autoria;?>">
        <input type="hidden" name="genero" value="<?php echo $cat->getGeneroByAutoria($autoria);?> ">
      <li class="list-group-item"><button type="submit " name="musica" value="<?php echo $col['id']; ?>" class="btn btn-outline-dark"><?php echo $col['nome_musica'];?></button></li>
      </Form>   
      <?php }?> 
      </ul>
    </div>
  </div>  
</main>
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