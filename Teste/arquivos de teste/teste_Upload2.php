<form action="teste_Upload2.php"  method="POST" enctype="multipart/form-data">
<input class="form-control form-control-lg"  id="upload" type="file" accept=".png, .jpg, .jpeg" name = "arquivo">
<button type="submit">enviar</button>
</form>
<?php 
require_once('../PHP\classes\Imagem.php');
require_once('../PHP\classes\Upload.php');

if(isset($_FILES['arquivo'])){
    $teste = new Upload($_FILES['arquivo']);
    print_r($teste);

    echo "algo";
}else {
    echo "algo 2";
}

?>