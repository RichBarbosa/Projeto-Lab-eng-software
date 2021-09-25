<?php
if(!isset($_SESSION)){
    session_start();
}require_once('classes\Usuario.php');
require_once('classes\Musica.php');
$con = new Usuario();
$cat = new Musica();

$id = $_SESSION['nome'];
if(!empty( $_SESSION['nome'])){ 
    if(!empty($_POST['autoria'])){
        $autoria = $_POST['autoria'];

         if(!empty($_POST['favoritarAut'])){
            $favCat = $_POST['favoritarAut'];
            $genero = $cat->getGeneroByAutoria($autoria);
            $_SESSION['autoria'] = $autoria;
                try{
                    $cat->inserirAutoriaFavorita($favCat, $id, $genero);
                    header('Location: autoriaEscolhida.php');

           }catch(Exception $e){
                  } 
          }else if (!empty($_POST['nmAut'])){
            $_SESSION['autoria'] = $autoria;
            $favCat = $_POST['nmAut'];
              try{
                $cat->deletarAutoriaFavorita($favCat, $id);
                header('Location: autoriaEscolhida.php');
              }catch(Exception $e){
  
              }
          }
       
    
 }else {
     header('Location: tema_categoria copy.php');
 } 
  
}else{ 
 header('Location: perfl.php');
}
?>