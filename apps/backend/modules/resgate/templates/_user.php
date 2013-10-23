<a class="dialog" title="Clique para mais informações" href="#dialog-<?php print $resgate->getId() ?>"><?php print $resgate->getSfGuardUser(); ?></a>
<div id="dialog-<?php print $resgate->getId() ?>" title="<?php print $resgate->getSfGuardUser(); ?>" style="display:none;">
    <h3>Dados Bancários</h3>
    <p>
        <?php
        if ($resgate->getSfGuardUser()->getDadoBancario()->count()) {
            ?>
            <strong>Banco</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getBanco() ?><br>
            <strong>Agência</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getAgencia() ?><br>
            <strong>Tipo Conta</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getTipoConta() ?><br>
            <strong>Operação</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getOperacao() ?><br>
            <strong>Nº da Conta</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getContaNumero() ?><br>
            <strong>Favorecido</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getFavorecido() ?><br>
            <strong>CPF</strong>: <?php print $resgate->getSfGuardUser()->getDadoBancario()->getFirst()->getCpf() ?><br>
            <?php
        } else {
            print "Não informado.";
        }
        ?>
    </p>
    <h3>Paypal</h3>
    <p>
        <?php
        if (Doctrine::getTable('Paypal')->findOneByUserId($resgate->getUserId())) {
            ?>
            <strong>Email</strong>: <?php print $resgate->getSfGuardUser()->getPaypal()->getFirst()->getEmail() ?><br>
            <?php
        } else {
            print "Não informado.";
        }
        ?>
    </p>
</div>