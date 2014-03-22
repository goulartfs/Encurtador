<form id="login" action="<?php echo url_for('login/index') ?>" method="post">
    <?php if ($sf_user->hasFlash('error')): ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div><?php echo $sf_user->getFlash('error') ?></div>
        </div>
    <?php endif; ?>
    <?php echo $form['username']->renderError() ?>
    <?php echo $form['username']->render(array('id' => 'username', 'class' => 'text-input', 'placeholder' => 'Usuário')) ?>
    <label class="control-label" for="username">Usuário</label>
    <?php echo $form['password']->renderError() ?>
    <?php echo $form['password']->render(array('id' => 'password', 'class' => 'text-input', 'placeholder' => 'Senha')) ?>
    <label class="control-label" for="password">Senha</label>
    <?php echo $form->renderHiddenFields() ?>
    <input type="submit" name='submit' value="Entrar">
    <div class="clearfix"></div>
</form>