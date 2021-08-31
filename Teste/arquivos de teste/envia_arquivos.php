<?php
include("Upload.php");

$tipos[0]=".gif";
$tipos[1]=".jpg";
$tipos[2]=".jpeg";
$tipos[3]=".png";


if(isset($_FILES["userfile"])){
    print_r($_FILES);

    $upArquivo = new Upload;
    if($upArquivo->UploadImagem($_FILES["userfile"], "Img/", $tipos)){
        $nome = $upArquivo->nome;
        $tipo = $upArquivo->tipo;
        $tamanho = $upArquivo->tamanho;
    }else{
        echo"falha";
    }
}
?>
<strong>Nome do Arquivo Enviado</strong> <?php echo $nome ?><br>
<strong>tipo do Arquivo Enviado</strong>  <?php echo $tipo ?><br>
<strong>tamanho do Arquivo Enviado</strong>  <?php echo $tamanho ?><br>