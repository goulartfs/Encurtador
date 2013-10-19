<form class="form-signin" action="<?php echo url_for('main/login') ?>" method="post">
    <h2 class="form-signin-heading">Efetue Login</h2>
    <?php if ($sf_user->hasFlash('error')): ?>
        <div class="alert alert-error">
            <div><?php echo $sf_user->getFlash('error') ?></div>
        </div>
    <?php endif; ?>
    <?php echo $form['username']->render(array('class' => 'input-block-level', 'placeholder'=>'Username')) ?>
    <?php echo $form['password']->render(array('class' => 'input-block-level', 'placeholder'=>'Password')) ?>
    <label class="checkbox">
        <?php echo $form['remember'] ?> Lembrar senha
    </label>
    <?php echo $form->renderHiddenFields() ?>
    <button class="btn btn-block btn-large btn-primary" type="submit">Efetuar login</button>
</form>