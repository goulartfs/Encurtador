<table class="table table-bordered">
    <thead>
        <tr>
            <th>Saldo da carteira</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p class="text-right lead">R$ <?php print $conta->getSaldo() ? $conta->getSaldo() : 0.00  ?></p>
                <a class="btn btn-block btn-success" href="<?php print url_for('@carteira_new') ?>">Adicionar Créditos</a>
            </td>
        </tr>
    </tbody>
</table>