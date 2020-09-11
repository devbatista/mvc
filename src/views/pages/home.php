<?php $view('header'); ?>

<a href="<?= $base ?>/novo">Novo usuário</a>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td>
                    <a href="<?=$base?>/usuario/edit/<?=$usuario['id']?>">[ Editar ]</a>
                    <a href="<?=$base?>/usuario/del/<?=$usuario['id']?>" onclick="return confirm('Deseja mesmo excluir?')">[ Excluir ]</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $view('footer') ?>