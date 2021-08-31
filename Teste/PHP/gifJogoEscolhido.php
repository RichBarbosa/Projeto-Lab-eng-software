<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Gif.php');
include('classes\Imagem.php');
$idImagem = null;
$caminho = null;
$comentario = null;

$con = new Usuario();
$cat = new Gif();
if(!empty($_SESSION['nome'])){
  $id = $_SESSION['nome'];
  include_once('header_temaJogo.php');
}else{ 
$id = null;
  include_once('header_nao_logado.php');?>

<body>
<br><br><br> 
<?php } 
    if(isset($_POST['imagem'])){
        $idImagem = $_POST['imagem'];
        $nImagem = $_POST['nImagem'];
    }
        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNomeJogo($idImagem);
          $nImagem = $cat->getNomeJogo($idImagem);
          try{
            $cat->deletarJogoFavorita($nome, $id);
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['favoritar'])){
            $idImagem = $_POST['favoritar'];
            $caminho = $_POST['caminho'];
            $nome = $cat->getNomeJogo($idImagem);
            $nImagem = $cat->getNomeJogo($idImagem);
            if($id == null){ ?>
              <script>alert('é preciso estar logado para favoritar imagens!') </script>        
      <?php }else{
                try{
                    $cat->inserirJogoFavorita($caminho, $nome, $id); ?>
                    <script>alert("imagem favoritada com sucesso!") </script>
<?php           }catch(Exception $e){
            }
          }  
        }else if(!empty($_POST['comentario'])){
          $idImagem = $_POST['idimagem'];
          $nImagem = $cat->getNomeJogo($idImagem);
           if($id == null){ ?>
              <script>alert('é preciso estar logado para comentar em imagens!') </script>        
      <?php }else{
              $nome = $cat->getNomeJogo($idImagem);
              $comentario = $_POST['comentario'];
              try{
                  $con -> inserirComentario($comentario, $id, $nome);
              }catch(Exception $e){

              }
        }
      }else if(!empty($_POST['idCom'])){
        $idImagem = $_POST['idImagem'];
        $nImagem = $cat->getNomeJogo($idImagem);
        $idComentario = $_POST['idCom'];
        try{
           $con->deletarComentario($idComentario, $id);
        }catch(Exception $e){

        }
      }else if(!empty($_POST['idComEdit'])){
        $idImagem = $_POST['idImagem'];
        $nImagem = $cat->getNomeJogo($idImagem);
        $idComentario = $_POST['idComEdit'];
        $comentario = $_POST['edit'];
        if(!empty($comentario)){
       
          try{
            $con->editarComentario($comentario, $id, $idComentario);

          }catch(Exception $e){

          }
        }
      }
     
?>
   <main>       
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
              <li><h6><?php echo $cat->getJogoTag1($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getJogoTag2($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getJogoTag3($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getJogoTag4($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getJogoTag5($idImagem)?></h6></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <form action="" method="post">
                <?php 
                  $favnome = $cat->getNomeJogo($idImagem);
                  $fav = $cat->verificarJogoFavorita($favnome, $id);
                  if($fav){?>
                          <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $idImagem;?>" ><img class="img-thumbnail" 
                            src="../img/suit-heart-fill.svg"  alt=""></button></li> 
                <?php }else{ ?>
                            <form action="" method="post">
                              <input type="hidden" name="caminho" value="<?php echo $cat->getCaminhoJogo($idImagem);?>">
                                <li><br><button class="btn btn-outline-success" type ="submit" name="favoritar" value="<?php echo $idImagem;?>" >Adicionar como favorita</button></li>
                <?php } ?>
                            </form>
                          <li><button class="btn btn-outline-light"> 
                            <a href="<?php echo $cat->getCaminhoJogo($idImagem);?>" download="<?php echo $idImagem + 0310; ?>"><img class="img-thumbnail" 
                            src="../img/download.svg" alt=""></a>
                      </ul> 
                  <hr>
          </div>
      </div>        
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-6">
      <form class="d-flex" action="" method="post">
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
        
          <?php foreach($con->getComentario($nImagem) as $col){ ?> 
          <form action="" method="post">
          <table>  
         <tr>
           <td><h5><?php echo $col['user'];?> comentou:</h5></td>
         </tr>
         <tr>
           <td id="com">
             <input type="hidden" name="idImagem" value="<?php echo $idImagem?>">
             <h5><?php echo $col['comentario'];?> <?php if ($id == $col['id']){ 
               ?><br><textarea name="edit" id="" cols="30" rows=""></textarea> <button class="btn btn-outline-danger" type="submit" name="idComEdit" value="<?php echo $col['id_com'];?>">editar </button> <button class="btn btn-outline-danger" type="submit" name="idCom" value="<?php echo $col['id_com'];?>">apagar? </button><?php }?>
               </h5></td>
            </form>  
          <hr>
         </tr>
       <?php }?>        
       </table>
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