<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Imagem.php');

$con = new Usuario();
$img = new Imagem();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
?>
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
    <link rel="stylesheet" type="text/css" href="../CSS/signin.css">
    
    <!--os treco do Bootstrap, quem diria que um link desses faz até um asno como eu fazer um front
    end, krl, eu amo frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>editar destaques</title>
    
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
      #div1{
          
        overflow: scroll;
        height: 500px;
        width: 100%;
        overflow-x: hidden;
        overflow-y: auto;
      }
    </style>
   
</head>
<body>
   <header id="top" >          
          <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php" id="a1">
                        <img src="../img/bull-horns_39319.ico" alt="" width="30" height="24" class="d-inline-block align-text-top" >    
                          Horn's Gallery
                    </a>
                    <div class="d-grid gap-2 d-md-block">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropstart
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="../index.php">Inicio</a></li>
                                <?php if($con->getAdmin($id)== "S") {?>
                                  <li><a class="dropdown-item" href="gerenciar.php">Gerenciar Usuários</a></li>
                                <li><a class="dropdown-item" href="lista de usuario.php">Lista de usuários</a></li>
                                <li><a class="dropdown-item" href="../escolher_categoria.php">Criar categoria</a></li>
                                <li><a class="dropdown-item" href="../escolher_Imagem.php">Gerenciar imagens</a></li>
                                <li><a class="dropdown-item" href="../escolher_gif.php">Gerenciar Gif</a></li>
                                <li><a class="dropdown-item" href="../escolher_carroceu.php">Gerenciar Carroceu</a></li>
                                <li><a class="dropdown-item" href="../escolher_destaque.php">Gerenciar Destaques</a></li>
                                <?php }?>
                                <li><a class="dropdown-item" href="favoritos.php">Favoritos</a></li>                                
                                <li><a class="dropdown-item" href="perfil.php">Perfil de usuário</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><button type="submit" class="dropdown-item"form ="logout">Logout</a></button>
                            </ul>
                          </div>
                          <form action="logout.php" method="POST" id="logout"></form>
                    </div>
                </div>
            </nav>
   </header> 
    <br><br><br>
   <main>       
   <h4 style="text-align:center">Editar destaques</h4>
        <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
                <p>Atualmente possuimos <?php echo count($img->listarCategorias()) . " ";?> categorias no total</p>
            </div>
            <div class="container">
                <div class ="row">
                    <div class="col">
                    <h6> editar destaques</h6>

<select class="form-select" aria-label="Default select example" name="destaque" id="" form="destaque">
            <option value="destaque1">Primeiro destaque</option>
            <option value="destaque2">Segundo destaque</option>
            <option value="destaque3">Terceiro destaque</option>
            <option value="destaque4">quarto destaque</option>
            <option value="destaque5">quinto destaque</option>
            <option value="destaque6">sexto destaque</option>

</select>
                    </div>
                </div>
            </div>
            <hr/>
        <div class="container-fluid">
            <div class="row">
                <div class="col align-self-center">
                    <form action="" method="POST">
                    <button type="submit" class="btn btn-secondary" name="inicial" value="A">A</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="B">B</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="C">C</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="D">D</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="E">E</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="F">F</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="G">G</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="H">H</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="I">I</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="J">J</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="K">K</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="L">L</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="M">M</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="N">N</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="O">O</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="P">P</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="Q">Q</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="R">R</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="S">S</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="T">T</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="U">U</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="V">V</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="W">W</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="X">X</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="Y">Y</button>
                    <button type="submit" class="btn btn-secondary" name="inicial" value="Z">Z</button>
                </form>
            </div>
        </div>
    </div>
    <hr/>
            <?php
            if(!empty($_POST)){
                $inicial = $_POST['inicial'];?>
                <form action="escolherImagemDestaque.php" method="post" id="destaque">
                    <ul class="list-group list-group-horizontal">
               <?php foreach ($img->listarCategoriasByInicial($inicial) as $col) {?>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item"><button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></li></button> 
                    </ul>
                <?php } ?>
             </form>
            <?php 
        }else{
            unset($inicial);
        }?>
            <hr>
            
            
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
}else{ 
 header('Location: ../index.php');
}
?>