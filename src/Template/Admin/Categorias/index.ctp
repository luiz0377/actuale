<section class="content-header">
  <h1>
    Gerenciar Categoria
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
                <th><?= $this->Paginator->sort('titulo') ?></th>
                <th><?= $this->Paginator->sort('texto', 'Chamada') ?></th>
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $this->Number->format($categoria->id) ?></td>
                <td><?= h($categoria->titulo) ?></td>
                <td><?= h($categoria->texto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Alterar'), ['action' => 'edit', $categoria->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <?= $this->Element('paginacao') ?>
</section>
