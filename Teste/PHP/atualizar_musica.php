
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
        $nome = $_POST['nome'];
        $idMusica = $_POST['idMusica'];
        $linkY = $_POST['youtube'];
        $linkS = $_POST['streaming'];
        $letraO = $_POST['letraO']; 
        $letraT = $_POST['letraT'];
        $autoria = $mus->getAutoriaById($idMusica);
        $_SESSION['musica'] = $idMusica;
    try{
     $mus-> atualizarMusica($nome, $letraO, $letraT, $linkY, $linkS, $id, $idMusica);
     $mus->renomearMusicaFavorita($nome, $autoria);
     header('Location: Letra.php');

    }catch(Exception $e){
      
    }
    
 }else {
 } 
  
?>