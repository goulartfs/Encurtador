<h1>Sua Conta (<?php print $sf_user->getGuardUser()->getUsername() ?>)</h1>
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
    <div class="span12 links">
        <table class="table">
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
        <table class="table">
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
</div>