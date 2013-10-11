<h1></h1>
<!--<form class="form-horizontal" action="<?php print url_for('@carteira_new') ?>" method="post">-->
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
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="T2KT85N6YNYD8">
        <input type="hidden" name="lc" value="US">
        <input type="hidden" name="custom" value="<?php print md5(uniqid()) ?>"> 
        <input type="hidden" name="item_name" value="Product name here">
        <input type="hidden" name="amount" value="1.00">
        <input type="hidden" name="currency_code" value="BRL">
        <input type="hidden" name="button_subtype" value="services">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="rm" value="1">
        <input type="hidden" name="return" value="http://localhost:9001/payment/success">
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>


    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-primary">Criar</button>
        </div>
    </div>
</fieldset>
<!--</form>-->