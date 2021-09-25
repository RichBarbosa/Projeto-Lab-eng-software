<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Musica.php');
$con = new Usuario();
$mus = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST)){
        $idMusica = $_POST['excluir'];
        $autoria = $mus->getAutoriaById($idMusica);
        $nome = $mus->getNome($idMusica);
       
        try{
            for($i = 1; $i <= 6; $i++){
                if ($nome == $mus->getnomeDestaqueM($i)) {
                  $mus->atualizarDestaquesM("destaque a ser defindo", "destaque a ser definido", 0, $i);
                }
              }
            $mus->deletarMusica($idMusica);
            $mus->deletarTodasMusicaFavorita($nome, $autoria);
            
            header('Location: gerenciar_musica.php');
        }catch(Exception $e){

        }
    
 }else {
     header('Location: gerenciar_musica.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>