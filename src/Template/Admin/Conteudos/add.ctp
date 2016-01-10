<section class="content-header">
  <h1>
    Adicionar Conteúdos
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
            <input type="text" name="chamada" class="form-control" maxlength="255">
        </div>   

       <div class="form-group">
          <label for="sel1">Categoria</label>
          <select name="categoria_id" class="form-control" id="sel1">
            
            <?php foreach ($categorias as $key => $value) : ?>
            
             <option value="<?= $value->id ?>"><?=$value['titulo']?></option> 

            <?php endforeach ?> 
           
            </select>
                
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
           <textarea class="textarea" name="conteudo" placeholder="Insira um texto" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        </div> 

        <!--<div class="form-group">
            <label>Fotos</label>
            <input type="file" name="url_file[]" class="form-control" multiple>
        </div>-->

        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Salvar</button>
    </form>
</section>


