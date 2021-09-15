<?php
$caminho = '../imagensTeste/teste.txt';
if(file_exists($caminho)){
    if (unlink($caminho)){
        echo 'sucesso';
    }else {
        echo 'falha';
    }
}else {
    echo 'não existe';
}