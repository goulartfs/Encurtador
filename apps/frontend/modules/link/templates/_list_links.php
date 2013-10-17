<div class="thumbnail">
    <table class="table table-striped">
        <thead>
            <tr>
                <th colspan="6"><?php print $pager->getNbResults() ?> Links encurtados encontrados</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Url Original</th>
                <th>Url Encurtada</th>
                <th>Ganho Disponível</th>
                <th>Visualizações Total</th>
                <th>Ganhos Totais</th>
                <!--<th>Criada em</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urls as $url) { ?>
                <tr>
                    <td>
                        <ul>
                            <li>
                                <?php print link_to1('Editar', '@link_edit?id=' . $url->getId()) ?>
                            </li>
                        </ul>
                    </td>
                    <td><?php print $url->getOriginalUrl() ?></td>
                    <td class="full-line"><a class="tip" href="<?php print $url->getFullUrl() ?>" title="" data-content="<?php print $url->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?>" data-placement="right" data-toggle="popover" data-trigger="hover" data-original-title="Criado em"><?php print $url->getShortUrl() ?></a></td>
                    <td><?php print "R$ " . $url->getGanhosDisponivel() . "<br><em>" . $url->getTotalDisponivel() . " views</em>" ?></td>
                    <td><?php print $url->getTotal() ?></td>
                    <td><?php print "R$ " . $url->getGanhos() ?></td>
                    <!--<td><?php print $url->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?></td>-->
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    $('.tip').popover();
</script>