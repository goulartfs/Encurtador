<?php if (isset($url)) { ?>
    <p class="alert alert-success">
        Parabéns, você encurtou seu link: <?php print link_to($url->getFullUrl(), $url->getFullUrl()); ?>
    </p>
<?php } ?>
<div class="row">
    <div class="span8">
        
    </div>
    <div class="span4 qtd-cliques text-right">
        <img src="/images/quantidade_cliques.png" alt="Quantidade de Cliques" />
        <h2 class="pull-right"><?php print $cliques ? $cliques : 0 ?></h2>
    </div>
</div>