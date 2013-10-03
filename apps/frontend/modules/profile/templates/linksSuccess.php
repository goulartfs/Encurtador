<form action="<?php print url_for('profile/links') ?>" method="post" class="well text-center">
    <div class="input-append no-margin">
        <label for="encurtador_url" class="text-left">Encurte sua URL aqui:</label>
        <?php print $form['url']->render(array('class' => 'span7')); ?>
        <?php print $form->renderHiddenFields() ?>
        <button class="btn btn-primary" type="submit">Encurtar!&nbsp;&nbsp;&nbsp;<i class="icon-resize-small icon-white"></i></button>
    </div>
    <div class="text-right">
        <br/>
        <a class="text-success" href="<?php print url_for('profile/mass') ?>">Ir para o encurtador em massa</a>
        <i class="icon-share-alt"></i>
    </div>
</form>
<?php if ($sf_user->hasFlash('notice')) { ?>
    <p class="well well-small alert-info">
        <?php print $sf_user->getFlash('notice'); ?>
    </p>
<?php } ?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Url Original</th>
            <th>Url Encurtada</th>
            <th>Visualizações</th>
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
                <td><?php print $url->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>