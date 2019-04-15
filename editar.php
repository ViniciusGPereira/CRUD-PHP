<?php
include 'contato.class.php';

$contato = new Contato();
if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = addslashes($_GET['id']);
    
    $user = $contato->getRegistro($id);

    if($user != ""){
        $nome = $user['nome'];
        $email = $user['email'];
    }else{
        $nome = "";
        $email = "";
    }
}

if(isset($_POST['nome']) && !empty($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);

    $contato->AtualizaRegistro($id, $nome, $email);

    header("Location: index.php");
}

?>
<style>
    .table,
    .campos{
        max-width: 600px;
    }
    
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <form method="POST">
        <div class="campos">
            <input type="hidden" value="<?php echo $id;?>">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">

            <label for="nome">E-mail</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
            <br>
            <input  style="width: 600px" type="submit" class="btn btn-dark" value="Atualizar">
        </div>
    </form>
</div>