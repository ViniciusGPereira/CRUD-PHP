<?php
include 'contato.class.php';

$contato = new Contato();
$usuarios = $contato->getAll();
?>
<style>
    .table,
    .campos{
        max-width: 600px;
    }
    
</style>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<div class="container">
<table class="table table-bordered">

<thead class="thead-light">
    <tr>
        <th >ID</th>
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>OPÇÕES</th>
    </tr>
</thead>

<?php foreach($usuarios as $usr): ?>
<tbody>
    <tr>
        <td><?php echo $usr['id'];?></td>
        <td><?php echo $usr['nome'];?></td>
        <td><?php echo $usr['email'];?></td>
        <td><a href="excluir.php?id=<?php echo $usr['id'];?>">Excluir</a> - <a href="editar.php?id=<?php echo $usr['id'];?>">Editar</a></td>
    </tr>
</tbody>
<?php endforeach;?>
</table>

<br><br>

<form method="POST" action="adicionar.php">
    <div class="campos">
        <label for="nome">Nome</label>
        <input class="form-control" required type="text" name="nome">

        <label for="email">E-mail</label>
        <input class="form-control" required type="email" name="email">

        <br>
        <input style="width: 600px" type="submit" class="btn btn-dark" value="Adicionar">
    </div>
    
</form>
</div>
