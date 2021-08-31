<?php
require_once('../PHP\classes\Imagem.php');

$img = new Imagem();

print_r($img ->getCaminhoByTag("Azuki"));


foreach($img->getCaminhoByTag("Vanilla") as $col){
        echo $img->getTag1($col['id']);
        $favnome = $img->getNome($col['id']);
           echo $fav= $img->verificarFavorita($favnome, "20");
        
}





<div class="container">
    <div class="row">
      <div class="col-6">
          <?php if(!empty($_POST['buscar'])){
            $busca = $_POST['buscar'];
            if($img ->listarCategoriasByInicial($busca) != null){ ?>
              <form action="tema_categoria.php" method="post">
                <ul class="list-group list-group-horizontal">
                  <?php foreach ($img->listarCategoriasByInicial($busca) as $col) {?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><button class="btn btn-outline-dark" type="submit" value="<?php echo $col['nome'];?>" name="escolha" ><?php echo $col['nome']?></li></button> 
                    </ul>
                  <?php } ?>
              </form>
          <?php } else{ ?>
              <h5>Ops... não foi encotrado nada..</h5>
              <h5>gostaria de buscar por tag?</h5>
                  <div class="container-fluid">
                      <form class="d-flex" action="pesquisa.php" method="POST">
                            <input class="form-control " type="search" placeholder="Search" aria-label="Search" name="buscarTag">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                      </form>
                  </div>        
            <?php }
                  }else if(!empty($_POST['buscarTag'])){      
                      $busca = $_POST['buscarTag'];?> 
                      <?php
                        if($img->getCaminhoByTag($busca)){ ?>                            
                            <?php foreach($img->getCaminhoByTag($busca) as $col){ ?> 
                                    <form action="imagemEscolhida.php" method="POST">
                                        <input type="hidden" name="nImagem" value="<?php echo $col['nome_imagem'] ?>">
                                        <button type="submit " name="imagem" value="<?php echo $col['id']; ?>" class="btn btn-light"><img class="img-fluid" src="<?php echo $col['caminho'];?>" alt=""> </button>
                                    </Form>
                                    <ul class="list-group list-group-horizontal">
                                        <?php echo ".";?><li><h6><?php echo $img->getTag1($col['id'])?></h6></li><?php echo ".";?>
                                        <?php echo ".";?><li><h6><?php echo $img->getTag2($col['id'])?></h6></li><?php echo ".";?>
                                        <?php echo ".";?><li><h6><?php echo $img->getTag3($col['id'])?></h6></li><?php echo ".";?>
                                        <?php echo ".";?><li><h6><?php echo $img->getTag4($col['id'])?></h6></li><?php echo ".";?>
                                        <?php echo ".";?><li><h6><?php echo $img->getTag5($col['id'])?></h6></li><?php echo ".";?>
                                    </ul>
                                    <ul class="list-group list-group-horizontal">
                                        <form action="" method="post">
                                            <input type="hidden" name="categoria" value="<?php echo $busca?>">
                                            <input type="hidden" name="caminho" value="<?php echo $col['caminho']?>">
                                            <?php 
                                                $favnome = $img->getNome($col['id']);
                                                $fav = $img->verificarFavorita($favnome, $id);
                                                if($fav){?>
                                                    <li><br><button class="btn btn-outline-light" type ="submit" name="id" value="<?php echo $col['id'];?>" ><img class="img-thumbnail" 
                                                            src="../img/suit-heart-fill.svg"  alt=""></button></li>  
                                            <?php }else{ ?>
                                                <form action="" method="post">
                                                    <li><br><button class="btn btn-outline-success" type ="submit" name="favoritar" value="<?php echo $col['id'];?>" >Adicionar como favorita</button></li>
                                            <?php } ?>
                                        </form>
                                                    <li><button class="btn btn-outline-light"> 
                                                        <a href="<?php echo $col['caminho'];?>" download="<?php echo $col['id'] + 0310; ?>"><img class="img-thumbnail" 
                                                        src="../img/download.svg" alt=""></a>
                                    </ul>         
                                    <hr>
                            <?php } ?>            
      </div>
      <div class="col-6">
        a

      </div>
    </div>
                <?php }else{?>
      <h6> Ops... nada foi encontrado</h6>
    <?php }?> 
  </div> 
    <?php }?>  
            