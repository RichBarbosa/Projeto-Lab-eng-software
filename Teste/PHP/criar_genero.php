<?php
if(!isset($_SESSION)){
  session_start();
}include('classes\Usuario.php');
include('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();
$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
  if(!empty($_POST)){
    $cat = $_POST['nome'];
    if($mus->validarGenero($cat) == true ){
        $_SESSION['gen'] = $cat;
        header('Location: novo_genero.php');
    }else{ 
      try{
        $mus->criarGenero($cat);
        header('Location: novo_genero.php');

      }catch(Exception $e){
        header('Location: erro.html');
        die(); 
      }
    }
 }else {
     header('Location: novo_genero.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>