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
                <th>Visualizações</th>
                <th>Ganho Disponível</th>
                <th>Ganhos Totais</th>
                <th>Criada em</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urls as $url) { ?>
                <tr>
                    <td><?php print $url->getId() ?></td>
                    <td><?php print $url->getOriginalUrl() ?></td>
                    <td><a href="<?php print $url->getFullUrl() ?>"><?php print $url->getShortUrl() ?></a></td>
                    <td><?php print $url->getTotal() ?></td>
                    <td><?php print "R$ " . $url->getGanhosDisponivel() ?></td>
                    <td><?php print "R$ " . $url->getGanhos() ?></td>
                    <td><?php print $url->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>