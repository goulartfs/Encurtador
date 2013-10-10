<h1 class="head_page">Resgate</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<div class="row">
    <div class="span12">
        <!--<div class="well">-->
        <div class="row">
            <div class="span4">
<!--                <h3>Todo ganho disponível</h3>
                <div class="">
                    <h4>
                        R$ <?php print $ganhos ?>
                    </h4>
                    <h5>TOTAL</h5>
                </div>-->
            </div>
            <div class="span4">
            </div>
            <div class="span4 text-right">
            </div>
        </div>
        <!--</div>-->
        <hr>
    </div>
    <?php if ($sf_user->hasFlash('error')): ?>
        <div class="span12">
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div><?php echo $sf_user->getFlash('error') ?></div>
            </div>
        </div>
    <?php endif; ?>
    <div class="span8">
        <h3>Todo ganho disponível</h3>
                <div class="">
                    <h4>
                        R$ <?php print $ganhos ?>
                    </h4>
                    <h5>TOTAL</h5>
                </div>
    </div>
    <div class="span4">
        <form class="pull-right well alert-success" action="<?php print url_for('@retirada_select') ?>" method="post">
            <h5>Resgatar todo ganho disponível</h5>
            <?php include_partial('commom/form', array('form' => $form)) ?>
            <span class="help-block">Selecione como deseja efetuar o resgate</span>
            <button type="submit" class="btn btn-block btn-primary">Solicitar Resgate</button>
        </form>
    </div>
    <div class="span12">
        <hr>
        <h5>Histórico de resgates</h5>
        <?php include_partial('retirada/list', array('resgates' => $pager->getResults(), 'pager' => $pager)) ?>
        <?php include_partial('commom/pagination', array('pager' => $pager, 'route' => '@retirada')) ?>
    </div>
</div>