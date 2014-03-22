<form id="cadastro" action="<?php echo url_for('@sf_guard_register') ?>" method="post">
    <?php if ($sf_user->hasFlash('error')): ?>
        <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <div><?php echo $sf_user->getFlash('error') ?></div>
        </div>
    <?php endif; ?>
    <?php echo $form['first_name']->renderError() ?>
    <?php echo $form['first_name']->render(array('id' => 'first_name', 'class' => 'text-input', 'placeholder' => 'Nome')) ?>
    <label class="control-label" for="first_name">Nome</label>
    <?php echo $form['last_name']->renderError() ?>
    <?php echo $form['last_name']->render(array('id' => 'last_name', 'class' => 'text-input', 'placeholder' => 'Sobrenome')) ?>
    <label class="control-label" for="last_name">Sobrenome</label>
    <?php echo $form['email_address']->renderError() ?>
    <?php echo $form['email_address']->render(array('id' => 'email', 'class' => 'text-input', 'placeholder' => 'E-mail')) ?>
    <label class="control-label" for="email">E-mail</label>
    <?php echo $form['username']->renderError() ?>
    <?php echo $form['username']->render(array('id' => 'username', 'class' => 'text-input', 'placeholder' => 'Usuário')) ?>
    <label class="control-label" for="username">Usuário</label>
    <?php echo $form['password']->renderError() ?>
    <?php echo $form['password']->render(array('id' => 'password', 'class' => 'text-input', 'placeholder' => 'Senha')) ?>
    <label class="control-label" for="password">Senha</label>
    <?php echo $form['password_again']->renderError() ?>
    <?php echo $form['password_again']->render(array('id' => 'password_again', 'class' => 'text-input', 'placeholder' => 'Repita Senha')) ?>
    <label class="control-label" for="password_again">Repita Senha</label>
    <?php echo $form['tipo_usuario']->renderError() ?>
    <?php echo $form['tipo_usuario']->render(array('id' => 'tipo_usuario', 'class' => 'text-input')) ?>
    <?php echo $form->renderHiddenFields() ?>
    <label class="control-label" for="tipo_usuario">Tipo de usuário</label>
    <input type="submit" name='submit' value="Cadastrar Agora">
    <div class="clearfix"></div>
</form>