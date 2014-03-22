<?php slot('encurtador-form'); ?>
<form action="<?php print url_for('@link') ?>" method="post" class="text-center">
        <?php print $form['url']->render(array('class' => 'span7')); ?>
        <?php print $form->renderHiddenFields() ?>
    <input type="submit" value="Criar Link">
    <p class="text-left">
        Sunt lubaes amor neuter, brevis vigiles.
        Est camerarius vita, cesaris.
        Cum buxum nocere, omnes vitaes anhelare regius, placidus classises.
        Conclusion is the only futility, the only guarantee of density.
        The captain robs with pestilence, hoist the reef until it laughs.
    </p>
</form>
<?php end_slot(); ?>
<?php if ($sf_user->hasFlash('notice')) { ?>
    <p class="well well-small alert-info">
        <?php print $sf_user->getFlash('notice') . link_to($sf_user->getFlash('url'), $sf_user->getFlash('url')); ?>
    </p>
<?php } ?>
<div class="row">
    <div class="span12">
        <section class="dados">
            <div class="container">
                <div class="row">
                    <div class="span4">
                    </div>
                    <div class="span3">
                    </div>
                    <div class="span5">
                        <div class="row">
                            <div class="span2">
                                <span><?php print $views; ?></span>
                                <h3>Total de Views</h3>
                            </div>
                            <div class="span3">
                                <span>R$ <?php print number_format($ganhos, 2, ',', '.') ?></span>
                                <h3>Ganhos totais</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include_partial('link/list_links', array('urls' => $pager->getResults(), 'pager' => $pager, 'ganhos'=>$ganhos)) ?>
        <?php include_partial('commom/pagination', array('pager' => $pager, 'route' => '@link')) ?>
    </div>
</div>
