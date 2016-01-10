<section class="content-header">
  <h1>
    Editar
  </h1>
  <ol class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>

 <section class="content">
    <?= $this->Form->create($newslettersConteudo, ['type' => 'file']) ?>
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" value="<?= $newslettersConteudo->titulo ?>" maxlength="255" required>
        </div>
        <div class="form-group">
            <label>Chamada</label>
            <input type="text" name="chamada" class="form-control" value="<?= $newslettersConteudo->chamada ?>" maxlength="255">
        </div>     
        <button type="submit" class="btn btn-success">Salvar</button>
    <?= $this->Form->end() ?>

    <br /><br />
    <div class="box box-info">
        <div class="box-head">
            <h3 style="padding: 20px">Fotos do conteúdo</h3>
        </div>

        <div class="box-body">

            <form action="./newsletters_conteudos/add" method="POST" enctype="multipart/form-data">
                <div class="form-group"> 
                    <label>Adicionar Fotos</label>
                    <input type="file" name="foto_file[]" class="form-control" multiple required>
                    <input type="hidden" name="id" value="<?= $newslettersConteudo->id ?>">
                </div>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>

            
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
            </div>
        </div>
    </div>
</section>


<?= $this->Html->script('/admin/dist/js/$newslettersConteudos.js', ['block' => true]) ?>