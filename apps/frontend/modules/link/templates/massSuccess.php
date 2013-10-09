<form class="form-horizontal" action="<?php print url_for('@link_mass') ?>" method="post">
    <fieldset>
        <legend>Encurtador Massivo</legend>
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

        <?php include_partial('commom/form', array('form' => $form)) ?>
        <div class="control-group">
            <div class="controls">
                <div class="btn-group">
                    <a href="<?php print url_for('@link') ?>"><button class="btn" type="button"><i class="icon-arrow-left"></i>&nbsp;Voltar para lista</button></a>
                    <button type="submit" class="btn btn-primary">Encurtar todos&nbsp;<i class="icon-resize-small icon-white"></i></button>
                </div>
            </div>
        </div>
    </fieldset>
</form>