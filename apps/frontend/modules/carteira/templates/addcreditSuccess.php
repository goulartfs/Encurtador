<h1></h1>
<form class="form-horizontal" action="<?php print url_for('@carteira_new') ?>" method="post">
<fieldset>
    <legend>Adicionar créditos na carteira</legend>
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
            <button type="submit" class="btn btn-primary">Pagar com Paypal</button>
        </div>
    </div>
</fieldset>
</form>