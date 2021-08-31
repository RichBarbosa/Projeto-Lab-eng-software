<?php 
include_once("PHP\classes\Upload.php");


if(isset($_FILES['arquivo'])){
  $up = new Upload($_FILES['arquivo']);
  $caminho = $up ->uploadImagem("img/");
}
 
?>
<form action="teste.php" method="post"enctype="multipart/form-data">
  <input type="file" name="arquivo">
  <input type="submit" value="enviar">
</form>