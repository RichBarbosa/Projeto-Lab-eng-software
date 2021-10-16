<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('classes\Usuario.php');
require_once('classes\Imagem.php');
require_once('classes\Gif.php');
require_once('classes\Musica.php');
require_once('classes\NSFW.php');



$con = new Usuario();
$cat = new Imagem();
$gif = new Gif();
$mus = new Musica();
$nsfw = new NSFW();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome']) && $con->getAdmin($id)){ 
    if(!empty($_POST['idImagem'])){
        $idImagem = $_POST['idImagem'];
        $categoria = $_POST['categoria'];
        try{
            
            $cat->moverImagem($categoria, $idImagem);
            header('Location: gerenciar_imagens.php');
        }catch(Exception $e){

        }
 }else if (!empty($_POST['idGif'])) {
        $idImagem = $_POST['idGif'];
        $categoria = $_POST['categoria'];
    try{
        $gif->moverGif($categoria, $idImagem);
        header('Location: gerenciar_gifs.php');
    }catch(Exception $e){

    }
 }else if(!empty($_POST['idJImagem'])){
    $idImagem = $_POST['idJImagem'];
    $categoria = $_POST['categoria'];
    try{
        $cat->moverImagemJogo($categoria, $idImagem);
        header('Location: gerenciar_imagens_jogo.php');
    }catch(Exception $e){

    }
 }else if(!empty($_POST['idJGif'])){
    $idImagem = $_POST['idJGif'];
    $categoria = $_POST['categoria'];
    try{
        $gif->moverGifJogo($categoria, $idImagem);
        header('Location: gerenciar_gifs_jogo.php');
    }catch(Exception $e){

    } 
}
else if(!empty($_POST['idMusica'])){
    $idMusica = $_POST['idMusica'];
    $autoria = $_POST['categoria'];
    $genero = $mus->getGeneroByAutoria($autoria);
    $nome = $mus->getNome($idMusica);
    try{
        $mus->moverMusica($autoria, $genero, $idMusica);
        $mus->MoverMusicaFavorita($autoria, $genero, $nome);
        header('Location: gerenciar_musica.php');
    }catch(Exception $e){

    } 
}
else if(!empty($_POST['artista'])){
    $autoria = $_POST['artista'];
    $IdGenero = $_POST['categoria'];
    $genero = $mus->getGeneroByIdGenero($IdGenero);
    try{
        $mus->MoverAutoria($autoria, $genero);
        $mus->MoverAutoriaMusica($autoria, $genero);
        $mus->MoverAutoriaMusicaFavorita($autoria, $genero);
        header('Location: gerenciar_artista.php');
    }catch(Exception $e){

    } 
}else if(!empty($_POST['idNSFW'])){
    $idImagem = $_POST['idNSFW'];
    $categoria = $_POST['categoria'];
    try{
        
        $nsfw->moverImagem($categoria, $idImagem);
        header('Location: ger_NSFW.php');
    }catch(Exception $e){

    }
}
else {
     header('Location: ../index.php');
 } 
  
}else{ 
 header('Location: ../index.php');
}
?>