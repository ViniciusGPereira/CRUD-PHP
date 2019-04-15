<?php
include 'contato.class.php';

if(isset($_POST['nome']) && !empty($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $contato = new Contato();

    $contato->adicionar($email, $nome);
}
header("Location: index.php");
//
