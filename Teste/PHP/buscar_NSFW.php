<?php
require_once('classes\NSFW.php');
require_once('classes\Usuario.php');
if(!isset($_SESSION)){
  session_start();
}
$img = new NSFW();
$user = new Usuario();
if(!empty( $_SESSION['nome'])){
  $id = $_SESSION['nome'];
  if($user->getConfirmacao($id) == "S" || $user->getAdmin($id) == "S"){  
   include_once('header_NSFW.php');
   ?>
   <main>
   <h4 style="text-align:center">Buscar</h4>
        <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading"></h4>
                <p>Atualmente possuimos <?php echo count($img->listarCategorias()) . " ";?> categorias no total</p>
            </div>
            <hr/>
        <div class="container-fluid">
            <div class="row">
                <div class="col align-self-center">
                    <form action="" method="GET">
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
            if(!empty($_GET['inicial'])){
                $inicial = $_GET['inicial'];?>
                <div class="container">
                  <div class="row">
                      <?php foreach ($img->listarCategoriasByInicial($inicial) as $col) {?>
                        <div class="col-sm-2"><br>
                          <form action="tema_NSFW.php" method="GET">
                            <button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></button> 
                            <br>
                          </form>                
                        </div>    
                      <?php } ?>
                  </div>
                </div>
            <?php 
        }else{
            unset($inicial);
        }?>
            <hr>
            
            
    </main>        
  </main> 
  <br><br><br><br><br><br>   
        <footer>
          
          <!--essa tag a faz voltar pro topo da p??gina, simples.... oq? achou q eu ia fazer mais um coment??rio
          ironizando ou zoando algo?-->
          <a href="#top"><button class="btn btn-secondary" type="button">voltar ao Topo</button></a>
          <a href="sobre.html"><button class="btn btn-secondary" type="button">Sobre n??s</button></a>
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