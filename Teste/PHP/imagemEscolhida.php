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
  include_once('header_buscarJogo.php');
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
                        <form class="d-flex" action="pesquisa.php">
                            <input class="form-control " type="search" placeholder="Pesquisar" aria-label="Search"  name="buscar" autocomplete="off">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
            </nav>
        
        <div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-dark p-4">
    <ul class="nav navbar-dark bg-dark">
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria.php"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buscar_por_categoria_gif.php"><button class="btn btn-secondary" type="button">Buscar por categorias</button></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="Subimicao.php"><button class="btn btn-secondary"><img src="https://img.icons8.com/office/16/000000/upload--v1.png"/>Submeter conteúdo</button></a>
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
    if(isset($_POST['imagem'])){
        $idImagem = $_POST['imagem'];
        $nImagem = $_POST['nImagem'];
    }
        if(!empty($_POST['id'])){
          $idImagem = $_POST['id'];
          $nome = $cat->getNome($idImagem);
          $nImagem = $cat->getNome($idImagem);
          try{
            $cat->deletarImagemFavorita($nome, $id);
          }catch(Exception $e){

          }

         
        }else if(!empty($_POST['favoritar'])){
            $idImagem = $_POST['favoritar'];
            $caminho = $_POST['caminho'];
            $nome = $cat->getNome($idImagem);
            $nImagem = $cat->getNome($idImagem);
            if($id == null){ ?>
              <script>alert('é preciso estar logado para favoritar imagens!') </script>        
      <?php }else{
                try{
                    $cat->inserirFavorita($caminho, $nome, $id); ?>
                    <script>alert("imagem favoritada com sucesso!") </script>
<?php           }catch(Exception $e){
            }
          }  
        }else if(!empty($_POST['comentario'])){
          $idImagem = $_POST['idimagem'];
          $nImagem = $cat->getNome($idImagem);
           if($id == null){ ?>
              <script>alert('é preciso estar logado para comentar em imagens!') </script>        
      <?php }else{
              $nome = $cat->getNome($idImagem);
              $comentario = $_POST['comentario'];
              try{
                  $con -> inserirComentario($comentario, $id, $nome);
              }catch(Exception $e){

              }
        }
      }else if(!empty($_POST['idCom'])){
        $idImagem = $_POST['idImagem'];
        $nImagem = $cat->getNome($idImagem);
        $idComentario = $_POST['idCom'];
        try{
           $con->deletarComentario($idComentario, $id);
        }catch(Exception $e){

        }
      }else if(!empty($_POST['idComEdit'])){
        $idImagem = $_POST['idImagem'];
        $nImagem = $cat->getNome($idImagem);
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
        <td><img src="<?php echo $cat->getCaminho($idImagem);?>" class="img-thumbnail" alt="..."> </td>
      </tr>    
    </table>
    <hr/>       
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
            <ul class="list-group list-group-horizontal">
              <li><h6><?php echo $cat->getTag1($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getTag2($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getTag3($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getTag4($idImagem)?></h6></li>
              <li><h6><?php echo $cat->getTag5($idImagem)?></h6></li>
            </ul>
            <ul class="list-group list-group-horizontal">
              <form action="" method="post">
                <?php 
                  $favnome = $cat->getNome($idImagem);
                  $fav = $cat->verificarFavorita($favnome, $id);
                  if($fav){?>
                          <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $idImagem;?>" ><img class="img-thumbnail" 
                            src="../img/suit-heart-fill.svg"  alt=""></button></li> 
                <?php }else{ ?>
                            <form action="" method="post">
                              <input type="hidden" name="caminho" value="<?php echo $cat->getCaminho($idImagem);?>">
                                <li><br><button class="btn btn-outline-success" type ="submit" name="favoritar" value="<?php echo $idImagem;?>" >Adicionar como favorita</button></li>
                <?php } ?>
                            </form>
                          <li><button class="btn btn-outline-light"> 
                            <a href="<?php echo $cat->getCaminho($idImagem);?>" download="<?php echo $idImagem + 0310; ?>"><img class="img-thumbnail" 
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          $.post("imagemEscolhida.php"), "idImagem=<?php echo $nImagem ?>",function(data){
                console.log(data);
          });
        </script>
</body>
</html> 
<?php
?>