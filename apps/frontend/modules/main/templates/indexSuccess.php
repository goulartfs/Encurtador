<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
    <h1>Seja bem vindo</h1>
    <p>Encurte aqui sua URL!</p>
    <form action="<?php print url_for('@homepage') ?>" method="post">
        <fieldset>
            <legend></legend>
            <?php print $form['url']->renderError() ?>
            <div class="input-append">
                <?php print $form['url'] ?>
                <?php print $form['_csrf_token'] ?>
                <button class="btn btn-primary" type="submit">Encurta</button>
            </div>
        </fieldset>
    </form>
    <?php if ($sf_user->hasFlash('notice')) { ?>
        <?php $url_id = URL_BASE . url_for('@resolve_url?url_id=' . $sf_user->getFlash('notice')); ?>
        <p class="alert alert-success"><a href="<?php print $url_id ?>"><?php print $url_id; ?></a></p>
        <?php } ?>
</div>