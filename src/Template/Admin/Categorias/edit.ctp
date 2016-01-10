<section class="content-header">
  <h1>
    Editar
  </h1>
  <ol class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>


<section class="content">
    <?= $this->Form->create($categoria, ['type' => 'file']) ?>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" value="<?= $categoria->titulo ?>" maxlength="255" required>
        </div>
        <div class="form-group">
            <label>Chamada</label>
            <input type="text" name="texto" class="form-control" value="<?= $categoria->texto ?>" maxlength="255">
        </div>     
        <button type="submit" class="btn btn-success">Salvar</button>
    <?= $this->Form->end() ?>

    <br /><br />
    <div class="box box-info">
        <div class="box-head">
            <h3 style="padding: 20px">Fotos da categoria</h3>
        </div>

        <div class="box-body">

            <form action="./categorias_fotos/add" method="POST" enctype="multipart/form-data">
                <div class="form-group"> 
                    <label>Adicionar Fotos</label>
                    <input type="file" name="foto_file[]" class="form-control" multiple required>
                    <input type="hidden" name="categoria_id" value="<?= $categoria->id ?>">
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>

            <br /><br />
            <div class="row">
                <form method="POST">
                <?php foreach($fotos as $f): ?>
                    <div class="col-md-3">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                                <div class="pull-left">
                                    <?php if($categoria->fotocapa != $f->url): ?>
                                    <input type="radio" name="fotocapa" class="setCapa" value="<?= $f->id ?>-<?= $categoria->id ?>">&larr; Capa
                                    <?php else: ?>
                                    <input type="radio" name="fotocapa" class="setCapa" value="<?= $f->id ?>-<?= $categoria->id ?>" checked>&larr; Capa
                                    <?php endif; ?>
                                </div>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool delFoto" value="<?= $f->id ?>" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <img src="<?= $f->url ?>" style="width: 100%"/>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                <?php endforeach; ?>
                <form>
            </div>
        </div>
    </div>
</section>


<?= $this->Html->script('/admin/dist/js/categorias.js', ['block' => true]) ?>