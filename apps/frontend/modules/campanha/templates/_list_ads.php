<div class="links">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="9"><?php print $pager->getNbResults() ?> Campanhas encontradas</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Aprovação</th>
                <th>Título</th>
                <th>Orçamento</th>
                <th>Url da Campanha</th>
                <th>Status</th>
                <th>Total</th>
                <th>Finalizada em</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ads as $ad) { ?>
                <tr>
                    <td>
                        <?php if (!$ad->getIsFinished()) { ?>
                            <ul>
                                <li>
                                    <?php if ($ad->getIsActive()) { ?>
                                        <a class="" title="Pausar campanha" href="<?php print url_for('@campanha_status?id=' . $ad->getId()) ?>">
                                            Pausar
                                        </a>
                                    <?php } else { ?>
                                        <a class="" title="Ativar campanha" href="<?php print url_for('@campanha_status?id=' . $ad->getId()) ?>">
                                            Ativar
                                        </a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <a class="" title="Editar campanha" href="<?php print url_for('@campanha_edit?id=' . $ad->getId()) ?>">
                                        Editar
                                    </a>
                                </li>
                            </ul>
                        <?php } else { ?>
                            <span class="label label-important">Encerrada</span>
                        <?php } ?>
                    </td>
                    <td><span class="label <?php print $ad->getStatusTransacao()->getLabel() ?>"><?php print $ad->getStatusTransacao() ?></span></td>
                    <td><?php print $ad->getTitulo() ?></td>
                    <td><?php print $ad->getOrcamento()->getQuantidade() ?></td>
                    <td><?php print link_to($ad->getUrlCampanha(), $ad->getUrlCampanha(), array('target'=>'_blank')) ?></td>
                    <td>
                        <?php print ($ad->getIsFinished()) ? '<span class="label label-important">Encerrada</span>' : (($ad->getIsActive()) ? '<span class="label label-success">Em exibição</span>' : '<span class="label label-warning">Pausado</span>'); ?>
                    </td>
                    <td><?php print $ad->getTotal() ?></td>
                    <td><small><?php print ($ad->getEndDate()) ? $ad->getDateTimeObject('end_date')->format('d/m/Y h:i:s') : null; ?></small></td>
                    <td><small><?php print $ad->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?></small></td>
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