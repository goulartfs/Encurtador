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
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Saldo da carteira</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p class="text-right lead">R$ <?php print $conta->getSaldo() ? $conta->getSaldo() : 0.00 ?></p>
                        <a class="btn btn-block btn-success" href="<?php print url_for('profile/add-credit') ?>">Adicionar Créditos</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th colspan="2" class="text-right">Consolidado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Seus links encurtados:</td>
                    <td><p class="text-right">R$ 0,00</p></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a class="btn btn-block btn-small" href="<?php print url_for('profile/links') ?>">Seus links encurtados</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>