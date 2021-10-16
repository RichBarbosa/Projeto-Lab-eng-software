<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once("PHP\classes\NSFW.php");
include_once("PHP\classes\Usuario.php");

$mus = new NSFW();
$user = new Usuario();
//Se der pau no servidor a primeira coisa que pra tentar é tirar todos o !isset($_SESSION)
  session_start();
if(!empty( $_SESSION['nome'])){
  $id = $_SESSION['nome'];
  if ($user->getConfirmacao($id) || $user->getAdmin($id)) {    
  include_once('PHP/header_indexNSFW.php');?>   
  <body> 
   <main>
     <?php    
     ?>
       <h1 id="Topo">Horn's Gallery: NSFW</h1>
       <div class="container">
          <div style="text-align: center;"> 
            <p>Quer alguma coisa mais "interessante" relacionado aos nossos conteúdos? Se a resposta for sim você veio ao lugar certo! </p>
            <p>aqui no Horn's Gallery: NSFW você pode ver e compatilhar conosco coisas que você normalmente não veria em um lugar publico.
              Aviso: devido a naturaza do conteúdo é possivel que seja encontrado coisas não recomendado para menores de idade, esteja avisado.
            </p>
          </div>

        </div>
        
      <br>
      <br>
      <br>
            <div style="text-align: center;"><h2>Sub categorias em destaque</h2></div>
            <hr>
            <div class="container">
              <div class="row">
                <form action="PHP\tema_NSFW.php" method="get">
                  <table>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaque('1');?>"><?php echo $mus->getnomeDestaque('1');?></button></td>
                    </tr>
                    <tr>  
                      <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaque('2');?>"><?php echo $mus->getnomeDestaque('2');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaque('3');?>"><?php echo $mus->getnomeDestaque('3');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaque('4');?>"><?php echo $mus->getnomeDestaque('4');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaque('5');?>"><?php echo $mus->getnomeDestaque('5');?></button></td>
                    </tr>
                    <tr>
                      <td><button class="btn btn-secondary" type="submit" name="escolha" value="<?php echo $mus->getnomeDestaque('6');?>"><?php echo $mus->getnomeDestaque('6');?></button></td>
                    </tr>
                  </table>  
                </form>                    
              </div>
            </div>  

    </main> 
    <br>
    <br>
    <br>
    <hr>
        <br><br>  
        <?php
        include_once("PHP/footer.php");  
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>  
    </body>
    </html>
    <?php }else{
      header('Location: index.php');
    } 
  }else{
      header('Location: index.php');
    }   
      ?> 
