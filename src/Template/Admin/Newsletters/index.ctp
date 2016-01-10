<section class="content-header">
  <h1>
    Gerenciar newsletters
  </h1>
  <ol class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

<section class="content">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nome') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
        
            <?php foreach ($newsletters as  $newsletters): ?>
            <tr>
                <td><?= $this->Number->format($newsletters->id) ?></td>
                <td><?= h($newsletters->nome) ?></td>
                <td><?= h($newsletters->email) ?></td>
                <td class="actions">
                    <a href="newsletters/edit/<?= $newsletters->id ?>">Editar</a> 
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsletters->id], ['confirm' => __('Você deseja deletar # {0}?', $newsletters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
