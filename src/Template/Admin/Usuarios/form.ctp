<section class="content-header">
    <h1>Usuário</h1>
    <div class="pull-right"><?= $this->Html->link(__('Lista Usuarios'), ['action' => 'index']) ?></div>
</section>

<section class="content">
    <form method="POST">
        <div class="form-group">
            <label>Login</label>
            <input type="text" name="login"  class="form-control" value="<?= $usuario->login ?>" maxlength="255">
        </div>   

        <div class="form-group">
            <label>Senha</label>
            <input type="password" name="senha" value="<?= $usuario->senha ?>" class="form-control" maxlength="255">   
        </div>   

            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> Salvar</button>
     </form>
</section>