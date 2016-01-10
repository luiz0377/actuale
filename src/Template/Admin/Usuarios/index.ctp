<section class="content-header">
<h1>
    Gerenciar Usuários
</h1>

<div class="pull-right"><?= $this->Html->link(__('Novo Usuario'), ['action' => 'add']) ?></div>
<section class="content">
    <table class="table table-condensed">
        <thead>
            <tr>    
                <th><?= $this->Paginator->sort('login') ?></th>

                <th class="actions"><?= __('Acões') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= h($usuario->login)?></td>
                <td class="actions">
                    <a href="usuarios/edit/<?= $usuario->id ?>" class="btn btn-info">Editar</a> 
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $usuario->id], ['confirm' => __('Deseja deletar o usuário # {0}?', $usuario->login)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Element('paginacao') ?>
 </section>