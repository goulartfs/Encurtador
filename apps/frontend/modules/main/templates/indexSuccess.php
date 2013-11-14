<?php if (isset($url)) { ?>
    <p class="alert alert-success">
        Parabéns, você encurtou seu link: <?php print link_to($url->getFullUrl(), $url->getFullUrl()); ?>
    </p>
<?php } ?>
<div class="row">
    <div class="span4 qtd-cliques text-right">
        <img src="/images/quantidade_links.png" alt="Total de links encurtados" />
        <h2 class="pull-right"><?php print $links_all ? number_format($links_all, 0, ',', '.') : 0  ?></h2>
    </div>
    <div class="span4 qtd-cliques text-right">
        <img src="/images/quantidade_cliques_all.png" alt="Quantidade de Cliques Totais" />
        <h2 class="pull-right"><?php print $cliques_all ? number_format($cliques_all, 0, ',', '.') : 0  ?></h2>
    </div>
    <div class="span4 qtd-cliques text-right">
        <img src="/images/quantidade_cliques.png" alt="Total de cliques hoje" />
        <h2 class="pull-right"><?php print $cliques ? number_format($cliques, 0, ',', '.') : 0  ?></h2>
    </div>
</div>
<div class="row">
    <div class="span12">
        <h3>Temos novidades para você!</h3>
    </div>
</div>
<?php include_partial('main/news') ?>