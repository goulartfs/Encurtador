<div class="thumbnail">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="7"><?php print $pager->getNbResults() ?> Campanhas encontradas</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Título</th>
                <th>Orçamento</th>
                <th>Url da Campanha</th>
                <th>Ativada?</th>
                <th>Total</th>
                <th>Finalizada?</th>
                <th>Finalizada em</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ads as $ad) { ?>
                <tr>
                    <td><a class="btn" title="Editar campanha" href="<?php print url_for('@campanha_edit?id=' . $ad->getId()) ?>"><i class="icon-pencil"></i></a></td>
                    <td><span class="label <?php print $ad->getStatusTransacao()->getLabel() ?>"><?php print $ad->getStatusTransacao() ?></span></td>
                    <td><?php print $ad->getTitulo() ?></td>
                    <td><?php print $ad->getOrcamento()->getQuantidade() ?></td>
                    <td><?php print $ad->getUrlCampanha() ?></td>
                    <td><i class="<?php print ($ad->getIsActive()) ? 'icon-ok' : ''  ?>"></i></td>
                    <td><?php print $ad->getTotal() ?></td>
                    <td><?php print $ad->getIsFinished() ?></td>
                    <td><?php print ($ad->getEndDate())?$ad->getDateTimeObject('end_date')->format('d/m/Y h:i:s'):null; ?></td>
                    <td><?php print $ad->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>