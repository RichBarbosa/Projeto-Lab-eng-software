<?php
require_once('../PHP\classes\Imagem.php');
require_once('../PHP\classes\Usuario.php');


$cat = new Imagem();
?>

<Table  class="table">
        <tr>
          <th>caminho</th>
          
        </tr> 
        <!--nessa pagina eu não preciso da variavel i, mas to deixando aqui pra lembrar oq eu preciso fazer depois -->
    <?php foreach($cat->listarImagem("Nekopara") as $i => $col){ ?>
        <tr>
            <td><img src="<?php echo $col['caminho'];?>" alt=""></td>
            <?php }?> 
        </tr>
    </Table>
    </main>
