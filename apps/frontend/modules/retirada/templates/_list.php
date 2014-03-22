<div class="links">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="7"><?php print $pager->getNbResults() ?> Resgates encontrados</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Meio de resgate</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Confirmado?</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resgates as $resgate) { ?>
                <tr>
                    <td></td>
                    <td><?php print $resgate->getTipoResgate() ?></td>
                    <td>R$ <?php print $resgate->getValor() ?></td>
                    <td><?php print $resgate->getStatus()->getTipo() ?></td>
                    <td><?php print ($resgate->getIsConfirmed()) ? '<i class="icon-ok">' : link_to('<button class="btn btn-small btn-success" type="button">Confirmar resgate</button>', '@retirada_finish?authkey=' . $resgate->getAuthkey())  ?></i></td>
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