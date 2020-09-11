<?php $view('header'); ?>

<h2>Editar usuário</h2>

<form method="POST" action="<?= $base ?>/usuario/edit/<?=$usuario['id']?>">
    <label for="">Nome:<br>
        <input type="text" name="nome" value="<?=$usuario['nome']?>">
    </label><br><br>

    <label for="">Email:<br>
        <input type="email" name="email" value="<?=$usuario['email']?>">
    </label><br><br>

    <input type="submit" value="Alterar">
</form>

<?= $view('footer') ?>