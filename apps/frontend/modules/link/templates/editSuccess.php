<form class="form-horizontal" action="<?php print url_for('@link_edit?id=' . $form['id']->getValue()) ?>" method="post">
    <fieldset>
        <legend>Editar Link</legend>
        <?php if ($sf_user->hasFlash('error')): ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div><?php echo $sf_user->getFlash('error') ?></div>
            </div>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div><?php echo $sf_user->getFlash('notice') ?></div>
            </div>
        <?php endif; ?>

            <div class="control-group">
                <?php print $form['original_url']->renderLabel("Link", array('class' => 'control-label')) ?>
                <div class="controls">
                    <?php echo $form['original_url']->renderError() ?>
                    <?php echo $form['original_url']->render(array('class' => 'text-input input-xlarge')) ?>
                </div>
            </div>
        <?php print $form->renderHiddenFields() ?>


        <div class="control-group">
            <div class="controls">
                <a class="btn" href="<?php print url_for('@link') ?>">Voltar para lista</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </fieldset>
</form>