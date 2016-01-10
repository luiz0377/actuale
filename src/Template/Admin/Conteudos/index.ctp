<section class="content-header">
  <h1>
    Gerenciar Conteúdo
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
                <th><?= $this->Paginator->sort('categoria') ?></th>
                <th><?= $this->Paginator->sort('chamada') ?></th>
                
                <th class="actions"><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($conteudos as $conteudo): ?>
            <tr>
                <td><?= $this->Number->format($conteudo->id) ?></td>
                <td><?= h($conteudo->titulo) ?></td>
                <td><?= h($conteudo->categoria->titulo) ?></td>
                <td><?= h($conteudo->chamada) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Alterar'), ['action' => 'edit', $conteudo->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->Element('paginacao') ?>
</section>
