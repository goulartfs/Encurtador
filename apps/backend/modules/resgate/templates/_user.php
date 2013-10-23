<a class="dialog" title="Clique para mais informações" href="#dialog-<?php print $resgate->getId() ?>"><?php print $resgate->getSfGuardUser(); ?></a>
<div id="dialog-<?php print $resgate->getId() ?>" title="<?php print $resgate->getSfGuardUser(); ?>" style="display:none;">
    <h3>Dados Bancários</h3>
    <p>
        <?php
        if ($resgate->getSfGuardUser()->getDadoBancario()->count()) {
            ?>
            <strong>Banco</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getBanco() ?><br>
            <strong>Agência</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getAgencia() ?><br>
            <strong>Tipo Conta</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getTipoConta() ?><br>
            <strong>Operação</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getOperacao() ?><br>
            <strong>Nº da Conta</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getContaNumero() ?><br>
            <strong>Favorecido</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFavorevido() ?><br>
            <strong>CPF</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getCpf() ?><br>
            <?php
        } else {
            print "Não informado.";
        }
        ?>
    </p>
    <h3>Paypal</h3>
    <p>
        <?php
        if ($resgate->getSfGuardUser()->getPaypal()->count()) {
            ?>
            <strong>Email</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getPaypal()->getEmail() ?><br>
            <?php
        } else {
            print "Não informado.";
        }
        ?>
    </p>
</div>