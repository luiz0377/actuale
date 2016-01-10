<section class="content-header">
  <h1>
    Adicionar Categoria
  </h1>
  <ol class="breadcrumb">
    <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>


<section class="content">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" required maxlength="255">
        </div>
        <div class="form-group">
            <label>Chamada</label>
            <input type="text" name="texto" class="form-control" maxlength="255">
        </div>     
        <div class="form-group">
            <label>Fotos</label>
            <input type="file" name="url_file[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Salvar</button>
    </form>
</section>


