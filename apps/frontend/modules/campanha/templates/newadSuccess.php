<div class="row">
    <div class="span12">
        <div class="alert alert-info">
            <i class="icon-info-sign"></i>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    </div>
    </div>
<section class="dados">
    <div class="container">
        <div class="row">
            <div class="span4">
            </div>
            <div class="span3">
            </div>
            <div class="span5">
                <?php include_component('carteira', 'saldo') ?>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="span12">
        <form class="form-horizontal" action="<?php print url_for('@campanha_new') ?>" method="post">
            <fieldset>
                <legend>Nova Campanha</legend>
                <?php include_partial('commom/infoArea'); ?>
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
</div>