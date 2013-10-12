<form class="form-horizontal" action="<?php print url_for('@campanha_edit?id=' . $form['id']->getValue()) ?>" method="post">
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

            <div class="control-group">
                <?php print $form['titulo']->renderLabel($form['titulo']->renderLabelName(), array('class' => 'control-label')) ?>
                <div class="controls">
                    <?php echo $form['titulo']->renderError() ?>
                    <?php echo $form['titulo']->render(array('class' => 'text-input input-xlarge')) ?>
                </div>
            </div>
            <div class="control-group">
                <?php print $form['url_campanha']->renderLabel($form['url_campanha']->renderLabelName(), array('class' => 'control-label')) ?>
                <div class="controls">
                    <?php echo $form['url_campanha']->renderError() ?>
                    <?php echo $form['url_campanha']->render(array('class' => 'text-input input-xlarge')) ?>
                </div>
            </div>
            <div class="control-group">
                <?php print $form['maximo_orcamento_diario']->renderLabel($form['maximo_orcamento_diario']->renderLabelName(), array('class' => 'control-label')) ?>
                <div class="controls">
                    <?php echo $form['maximo_orcamento_diario']->renderError() ?>
                    <?php echo $form['maximo_orcamento_diario']->render(array('class' => 'text-input input-xlarge')) ?>
                </div>
            </div>
        <?php print $form->renderHiddenFields() ?>


        <div class="control-group">
            <div class="controls">
                <a class="btn" href="<?php print url_for('@campanha') ?>">Voltar para lista</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </fieldset>
</form>