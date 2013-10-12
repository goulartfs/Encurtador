<h1>Sua Conta (<?php print $sf_user->getGuardUser()->getUsername() ?>)</h1>
<div class="row">
    <div class="span9">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th colspan="2">Transações recentes</th>
                </tr>
                <tr>
                    <th>Operação</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($operacoes as $operacao) { ?>
                    <tr>
                        <td><?php print $operacao->getTipoOperacao() ?></td>
                        <td><?php print $operacao->getValor() ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="span3">
        <?php include_component('carteira', 'saldo') ?>
    </div>
</div>