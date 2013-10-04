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
<div class="row">
    <div class="span9">
        <?php include_partial('profile/list_links', array('urls' => $pager->getResults(), 'pager' => $pager)) ?>
        <?php include_partial('profile/pagination', array('pager'=>$pager, 'route'=>'profile/links')) ?>
    </div>
    <div class="span3">
        <div class="thumbnail help-block">
            <table class="table no-margin">
                <thead>
                    <tr>
                        <th>Ganhos Totais</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p class="text-right lead">R$ <?php print $ganhos; ?></p>
                            <a class="btn btn-block btn-primary" href="#">Resgatar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="thumbnail help-block">
            <table class="table no-margin">
                <thead>
                    <tr>
                        <th>Visualização Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <p class="text-right lead"><?php print $views; ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
