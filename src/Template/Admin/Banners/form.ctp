<section class="content-header">
  <h1>
    <strong>Adicionar Banner</strong>
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
        <div class="box box-primary">

          <div class="box-body">
              <form role="form" method="POST" enctype="multipart/form-data">

                    
                    <div class="form-group">
                      <label for="nome">Nome do Banner</label>
                      <input type="text" class="form-control" name="nome" id="nome" placeholder="nome..." value="<?= $banner->nome ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="textop">Texto Principal (opcional)</label>
                      <input type="text" class="form-control" name="textop" id="textop" placeholder="Texto Principal" value="<?= $banner->textop ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="subtexto">Sub Texto (opcional)</label>
                      <input type="text" class="form-control" name="subtexto" id="subtexto" placeholder="Subtexto" value="<?= $banner->subtexto ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="link">Link do banner (opcional)</label>
                      <input type="url" class="form-control" name="link" id="link" placeholder="http://" value="<?= $banner->link ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="link">Foto</label>
                      <?php if(!$banner->isNew()): ?>
                        <input type="file" class="form-control" name="imagem_file" id="imagem">
                      <?php else: ?>
                      <input type="file" class="form-control" name="imagem_file" id="imagem" required>
                      <?php endif; ?>
                    </div>

                    <?php if(!$banner->isNew()): ?>
                    <img src="<?= $banner->imagem ?>" class="img-responsive">
                    <br/>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar Alterações</button>
                    <?php else: ?>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Adicionar Banner</button>
                    <?php endif; ?>
            </form>
                </div> <!-- box body -->
            </div> <!-- box -->
    </div>
  </div>
</section>
