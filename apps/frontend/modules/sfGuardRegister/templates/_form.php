<fieldset>
    <legend>Faça aqui o seu cadastro!</legend>
    <form action="<?php echo url_for('@sf_guard_register') ?>" method="post" class="form-horizontal">
        <?php if ($sf_user->hasFlash('error')): ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div><?php echo $sf_user->getFlash('error') ?></div>
            </div>
        <?php endif; ?>
        <div class="control-group">
            <label class="control-label" for="first_name">Nome</label>
            <div class="controls">
                <?php echo $form['first_name']->renderError() ?>
                <?php echo $form['first_name']->render(array('id' => 'first_name', 'class' => 'text-input', 'placeholder' => 'Nome')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="last_name">Sobrenome</label>
            <div class="controls">
                <?php echo $form['last_name']->renderError() ?>
                <?php echo $form['last_name']->render(array('id' => 'last_name', 'class' => 'text-input', 'placeholder' => 'Sobrenome')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <?php echo $form['email_address']->renderError() ?>
                <?php echo $form['email_address']->render(array('id' => 'email', 'class' => 'text-input', 'placeholder' => 'E-mail')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="username">Usuário</label>
            <div class="controls">
                <?php echo $form['username']->renderError() ?>
                <?php echo $form['username']->render(array('id' => 'username', 'class' => 'text-input', 'placeholder' => 'Usuário')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password">Senha</label>
            <div class="controls">
                <?php echo $form['password']->renderError() ?>
                <?php echo $form['password']->render(array('id' => 'password', 'class' => 'text-input', 'placeholder' => 'Senha')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password_again">Repita Senha</label>
            <div class="controls">
                <?php echo $form['password_again']->renderError() ?>
                <?php echo $form['password_again']->render(array('id' => 'password_again', 'class' => 'text-input', 'placeholder' => 'Repita Senha')) ?>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <?php echo $form->renderHiddenFields() ?>
                <button type="submit" class="btn">Registrar</button>
            </div>
        </div>
    </form>
</fieldset>