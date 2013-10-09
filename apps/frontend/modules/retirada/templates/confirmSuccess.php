<h1 class="head_page">Confirmação de Resgate</h1>
<div class="row">
    <?php if ($sf_user->hasFlash('error') || $sf_user->hasFlash('notice')): ?>
        <div class="span12">
            <?php if ($sf_user->hasFlash('error')): ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div><?php echo $sf_user->getFlash('error') ?></div>
                </div>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('notice')): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div><?php echo $sf_user->getFlash('notice') ?></div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="span4">
        <h3>Valor do Resgate</h3>
        <div class="">
            <h4>
                R$ <?php print $ganhos ?>
            </h4>
            <h5>TOTAL</h5>
        </div>
    </div>
    <div class="span4">
        <h3>Dados do Resgate</h3>
        <p>
            <strong>Meio de Resgate</strong>: <?php print $tipo_resgate->getTipo(); ?>
        </p>
        <p>
            <?php
            if ($tipo_resgate->getId() == 1 || $tipo_resgate->getId() == 2) {
                foreach ($form as $field) {
                    if ($field->isHidden())
                        continue;
                    ?>
                    <strong><?php print $field->renderLabelName() ?></strong>: <?php print $field->getValue() ?><br/>
                    <?php
                }
            } else {
                ?>
                    Os ganhos de links serão creditados na sua carteira virtual CliqueBR.
                <?php
            }
            ?>
        </p>
    </div>
    <div class="span4">
        <a href="<?php print url_for('@retirada_finish?authkey=' . $resgate->getAuthkey()) ?>"><button class="btn btn-success" type="button">Estou ciente, desejo finalizar o resgate.</button></a>
    </div>
</div>