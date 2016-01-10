<section class="content-header">
  <h1>
    <strong>Banners</strong>
  </h1>
  <ol class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="col-lg-12">
    <div class="row">
      <?= $this->Flash->render() ?>
      <div class="retorno"></div>

     <div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-info-sign"></span> Clique e arraste o banner para editar sua posição</div>
      

      <form method="POST">
        <ul id="sortable" class="list-group">
          <?php $i = 0; 
          foreach($banners as $b): ?>
          <li class="ui-state-default" id="sortable_<?= $b->id ?>">
            <p>Banner <?= $i + 1 ?></p>
            <a href="./banners/delete/<?= $b->id ?>" class="btn btn-danger"><i class="fa fa-remove"></i> Deletar</a>
            <!-- <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $b->id], ['confirm' => __('Deseja deletar o banner # {0}?', $b->nome), 'class' => 'btn btn-danger']) ?> -->
            <a href="./banners/edit/<?= $b->id ?>" class="btn btn-info" style="margin-top: 40px;"><i class="fa fa-remove"></i> &nbsp;&nbsp;&nbsp;Editar</a>
            <img src="<?= $b->imagem ?>" class="img-responsive">
          </li>
        <?php
          $i++;
         endforeach; ?>
        </ul>
      </form>
    </div>
  </div>
</section>

<?= $this->Html->script('/admin/dist/js/banners.js', ['block' => true])?>