<section class="content-header">
  <h1>
    Editar
  </h1>
  <ol class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

 <section class="content">
    <?= $this->Form->create($conteudo, ['type' => 'file']) ?>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" value="<?= $conteudo->titulo ?>" maxlength="255" required>
        </div>
        <div class="form-group">
            <label>Chamada</label>
            <input type="text" name="chamada" class="form-control" value="<?= $conteudo->chamada ?>" maxlength="255">
        </div>     
        <button type="submit" class="btn btn-success">Salvar</button>
    <?= $this->Form->end() ?>

    <br /><br />
    <div class="box box-info">
        <div class="box-head">
            <h3 style="padding: 20px">Fotos do conteúdo</h3>
        </div>

        <div class="box-body">

            <form action="./conteudos_fotos/add" method="POST" enctype="multipart/form-data">
                <div class="form-group"> 
                    <label>Adicionar Fotos</label>
                    <input type="file" name="foto_file[]" class="form-control" multiple required>
                    <input type="hidden" name="conteudo_id" value="<?= $conteudo->id ?>">
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>

            <br /><br />
            <div class="row">
                <?php foreach($fotos as $f): ?>
                    <div class="col-md-3">
                        <div class="box box-success">

                            <form method="POST">

                                <div class="box-header with-border">
                                    <h3 class="box-title"></h3>
                                    <div class="pull-left">
                                        <?php if($conteudo->fotocapa != $f->url): ?>
                                        <input type="radio" name="fotocapa" class="setCapa" value="<?= $f->id ?>-<?= $conteudo->id ?>">&larr; Capa
                                        <?php else: ?>
                                        <input type="radio" name="fotocapa" class="setCapa" value="<?= $f->id ?>-<?= $conteudo->id ?>" checked>&larr; Capa
                                        <?php endif; ?>
                                    </div>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool delFoto" value="<?= $f->id ?>" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /.box-tools -->
                                </div><!-- /.box-header -->

                            </form>

                            <div class="box-body">
                                <img src="<?= $f->url ?>" style="width: 100%"/>

                                <form action="./conteudos_fotos/legLink" method="POST" class="legLink">
                                    <div class="form-group">
                                        <labe>Legenda</labe>
                                        <input type="text" class="form-control" placeholder="legenda" name="legenda" value="<?= $f->legenda ?>">
                                    </div>
                                    <div class="form-group">
                                        <labe>Link</labe>
                                        <input type="text" class="form-control" placeholder="http://" name="link" value="<?= $f->link ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="<?= $f->id ?>">
                                        <button type="submit" class="btn btn-success pull-right">Salvar!</button>
                                    </div> 
                                </form>

                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<?= $this->Html->script('/admin/dist/js/conteudos.js', ['block' => true]) ?>