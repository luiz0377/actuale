<section class="content-header">
    <h1>Vídeo</h1>
    <div class="pull-right"><?= $this->Html->link(__('Lista Vídeos'), ['action' => 'index']) ?></div>
</section>

<section class="content">
    <form method="POST">
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo"  class="form-control" value="<?= $video->titulo ?>" maxlength="255">
        </div>   

        <div class="form-group">
            <label>Url</label>
            <input type="text" name="url" value="<?= $video->url ?>" class="form-control" maxlength="255">   
        </div>   

        <?php if(!$video->isNew()): ?>
        <div class="form-group">
            <iframe width="560" class="thumbnail" height="315" src="https://www.youtube.com/embed/<?= $video->url ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Salvar</button>
     </form>
</section>