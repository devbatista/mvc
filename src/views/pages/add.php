<?php $view('header'); ?>

<h2>Adicionar novo usuário</h2>

<form method="POST" action="<?= $base ?>/novo">
    <label for="">Nome:<br>
        <input type="text" name="nome">
    </label><br><br>

    <label for="">Email:<br>
        <input type="email" name="email">
    </label><br><br>

    <input type="submit" value="enviar">
</form>

<?= $view('footer') ?>