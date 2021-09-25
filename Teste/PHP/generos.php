<?php
if(!isset($_SESSION)){
  session_start();
}
require_once('../PHP\classes\Musica.php');
require_once('../PHP\classes\Usuario.php');
$cat = new Musica();
if(!empty( $_SESSION['nome'])){  
  include_once('header_temaMusica.php');
}else{  
  include_once('header_nao_logadoM.php');

 } ?>
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
     <form action="generos.php" method="get">
      <button type="submit" class="btn btn-light">Generos</button>  
       </form>
</div>
    <h3 style="text-align:center"><?php echo $categoria ?> </h3>
<br><br><br>

    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
                <p>Atualmente possuimos <?php echo count($cat->listarAutorias($categoria)) . " ";?> músicos desse Genero</p>
            </div>
  </div>
  <hr/>       
    <div class="container">
      <div class="row">
      <ul class="list-group list-group-horizontal">
        <?php foreach($cat->listarAutorias($categoria) as $col){ ?> 
        <div class="col-sm-6">
          <form action="autoriaEscolhida.php" method="GET">
          <button type="submit " name="autoria" value="<?php echo $col['nome_autoria']; ?>" class="btn btn-outline-dark"><?php echo $col['nome_autoria'];?></button>
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
