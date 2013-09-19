<!-- Main hero unit for a primary marketing message or call to action -->
<!--<div class="hero-unit">
    <h1>Seja bem vindo</h1>
    <p>Encurte aqui sua URL!</p>
    <?php include_component('main', 'form') ?>
    <?php if ($sf_user->hasFlash('notice')) { ?>
        <?php $url_id = URL_BASE . url_for('@resolve_url?url_id=' . $sf_user->getFlash('notice')); ?>
        <p class="alert alert-success"><a href="<?php print $url_id ?>"><?php print $url_id; ?></a></p>
        <?php } ?>
</div>-->