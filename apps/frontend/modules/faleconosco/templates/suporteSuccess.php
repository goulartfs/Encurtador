<div class="row">
    <div class="span7">
        <form class="form-horizontal" action="<?php print url_for('@suporte') ?>" method="post">
            <fieldset>
                <!--        <legend>Suporte</legend>-->
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
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="span5">

    </div>
</div>