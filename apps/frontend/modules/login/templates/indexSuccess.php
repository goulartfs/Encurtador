<div class="span12">
    <fieldset>
        <legend>Entre na sua conta...</legend>
        <form action="<?php echo url_for('login/index') ?>" method="post" class="form-horizontal">
            <?php if ($sf_user->hasFlash('error')): ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div><?php echo $sf_user->getFlash('error') ?></div>
                </div>
            <?php endif; ?>
            <div class="control-group">
                <label class="control-label" for="username">Usuário</label>
                <div class="controls">
                    <?php echo $form['username']->render(array('id' => 'username', 'class' => 'text-input', 'placeholder' => 'Usuário')) ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Senha</label>
                <div class="controls">
                    <?php echo $form['password']->render(array('id' => 'password', 'class' => 'text-input', 'placeholder' => 'Senha')) ?>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <?php echo $form['remember'] ?> Lembrar senha
                    </label>
                    <?php echo $form->renderHiddenFields() ?>
                    <button type="submit" class="btn">Entrar</button>
                </div>
            </div>
        </form>
    </fieldset>
    <p>
        Precisa de uma conta? <a href="<?php print url_for('@sf_guard_register') ?>">Faça seu cadastro agora!</a>
    </p>
</div>