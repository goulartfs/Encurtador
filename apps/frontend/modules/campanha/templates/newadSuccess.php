<div class="row">
    <div class="span12">
        <div class="alert alert-info">
            <i class="icon-info-sign"></i>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    </div>
    <div class="span9">
        <form class="form-horizontal" action="<?php print url_for('@campanha_new') ?>" method="post">
            <fieldset>
                <legend>Nova Campanha</legend>
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
                        <strong>Termos e condições</strong>
                        <label class="checkbox">
                            <input type="checkbox" name="termos" />
                            Eu concordo com os termos e condições
                        </label>
                        <strong>Disclaimer</strong>
                        <label class="checkbox">
                            <input type="checkbox" name="termos" />
                            Lorem ipsum dolor sit amet...
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary">Criar campanha e prosseguir com o pagamento</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="span3">
        <?php include_component('carteira', 'saldo'); ?>
    </div>
</div>