<section class="content-header">
    <h1>Newsletter</h1>
    <div class="pull-right"><?= $this->Html->link(__('Lista Newsletter'), ['action' => 'index']) ?></div>
</section>

<section class="content">
    <form method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome"  class="form-control" value="<?= $newsletter->nome ?>" maxlength="255">
        </div>   

        <div class="form-group">
            <label>Email</label>
            <?= $this->Form->input('email', ['class' => 'form-control', 'value' => $newsletter->email, 'label' => false, 'required']) ?>   
        </div>   

            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Salvar</button>
     </form>
</section>