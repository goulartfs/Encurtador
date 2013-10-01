<form class="form-horizontal" action="<?php print url_for('@edit_ad?id=' . $form['id']->getValue()) ?>" method="post">
    <fieldset>
        <legend>Editar Campanha</legend>
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

        <?php
        foreach ($form as $field) {
            if ($field->isHidden())
                continue;
            ?>
            <div class="control-group">
                <?php print $field->renderLabel($field->renderLabelName(), array('class' => 'control-label')) ?>
                <div class="controls">
                    <?php echo $field->renderError() ?>
                    <?php echo $field->render(array('class' => 'text-input input-xlarge')) ?>
                </div>
            </div>
            <?php
        }
        ?>
        <?php print $form->renderHiddenFields() ?>


        <div class="control-group">
            <div class="controls">
                <a class="btn" href="<?php print url_for('profile/ads') ?>">Voltar para lista</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </fieldset>
</form>