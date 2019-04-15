<?php
include 'contato.class.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
    $contato = new Contato();

    $contato->ExcluirRegistro($id);
}
header("Location: index.php");