<form id="process-payment" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display: none;">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="business" value="T2KT85N6YNYD8">
    <input type="hidden" name="lc" value="US">
    <input type="hidden" name="custom" value="<?php print $data['custom'] ?>"> 
    <input type="hidden" name="item_name" value="<?php print $data['item_name'] ?>">
    <input type="hidden" name="amount" value="<?php print number_format($data['amount'], 2) ?>">
    <input type="hidden" name="currency_code" value="BRL">
    <input type="hidden" name="button_subtype" value="services">
    <input type="hidden" name="no_note" value="1">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="rm" value="1">
    <input type="hidden" name="return" value="<?php print URL_BASE; ?>/payment/success/ref/<?php print $data['ref'] ?>">
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHosted">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<div class="well well-large">
    <h1>Aguarde, você será redirecionado para o pagamento.</h1>
</div>
<script>
    setTimeout('$("#process-payment").submit()', 5000);
</script>