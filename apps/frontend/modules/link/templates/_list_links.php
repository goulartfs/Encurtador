<section class="links row">
<!--    <aside class="span2">-->
<!--        <h3>Links</h3>-->
<!--        <h4>Procurar Links</h4>-->
<!--        <div class='bloco'></div>-->
<!--    </aside>-->
    <table class="span12">
        <thead>
        <tr>
            <td colspan="6"><?php print $pager->getNbResults() ?> Links encurtados encontrados</td>
        </tr>
        <tr>
            <td>#</td>
            <td>Url Original</td>
            <td>Url Encurtada</td>
            <td>Ganho Disponível</td>
            <td>Visualizações Total</td>
            <td>Ganhos Totais</td>
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
                <td class="full-line"><a class="tip" href="<?php print $url->getFullUrl() ?>" title=""
                                         data-content="<?php print $url->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?>"
                                         data-placement="right" data-toggle="popover" data-trigger="hover"
                                         data-original-title="Criado em"><?php print $url->getShortUrl() ?></a></td>
                <td><?php print "R$ " . $url->getGanhosDisponivel() . "<br><em>" . $url->getTotalDisponivel() . " views</em>" ?></td>
                <td><?php print $url->getTotal() ?></td>
                <td><?php print "R$ " . $url->getGanhos() ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<!--    <div class="row">-->
        <table class="span12">
<!--            <tr>-->
<!--                <td>Deleted Links</td>-->
<!--                <td><span class="icon-chevron-left"></span></td>-->
<!--                <td>R$</td>-->
<!--            </tr>-->
            <tr>
                <td>Total</td>
                <td><span class="icon-chevron-left"></span></td>
                <td></td>
                <td></td>
                <td></td>
                <td>R$ <?php print number_format($ganhos, 2, ',', '.') ?></td>
            </tr>
        </table>
<!--    </div>-->
</section>
<script>
    $('.tip').popover();
</script>