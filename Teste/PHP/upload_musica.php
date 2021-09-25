
<?php
if(!isset($_SESSION)){
  session_start();
}
include('classes\Usuario.php');
include('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();
$id = $_SESSION['nome'];
  if(isset($_POST)){
    $linkS = null;
    $linkY = null;
    $letraT = null;
        $nome = $_POST['nome'];
        if (!empty($_POST['streaming'])) {
        $linkS = $_POST['streaming'];
        }
        if (!empty($_POST['youtube'])) {
        $linkY = $_POST['youtube'];  
        }
        $letraO = $_POST['letraO']; 
        
        $genero = $_POST['autoria'];
        $autoria = $mus->getAutoriaByGenero($genero);
    try{
     $mus-> inserirMusica($nome, $letraO, $letraT, $autoria, $genero,  $linkY, $linkS, $id);
     header('Location: escolher_autoria.php');

    }catch(Exception $e){
      
    }
    
 }else {
 } 
  
?>