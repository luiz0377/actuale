<section class="content-header">
<h1>
    Gerenciar Vídeos
</h1>

<div class="pull-right"><?= $this->Html->link(__('Novo Vídeo'), ['action' => 'add']) ?></div>
<section class="content">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('url') ?></th>

                <th class="actions"><?= __('Acões') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos as $video): ?>
            <tr>
                <td><?= h($video->titulo)?></td>
                <td><a href="http://youtube.com/watch?v=<?= h($video->url)?>" target="_blank"><?= h($video->url)?></a></td>
                <td class="actions">
                    <a href="videos/edit/<?= $video->id ?>" class="btn btn-info">Editar</a> 
                    <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $video->id], ['confirm' => __('Deseja deletar o vídeo # {0}?', $video->titulo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Element('paginacao') ?>
 </section>