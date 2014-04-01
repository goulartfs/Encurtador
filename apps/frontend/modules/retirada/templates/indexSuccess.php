<h1 class="head_page">Resgatar seus ganhos</h1>
<p>
    Os seus rendimentos chegando a um total de R$ 9,00 ou mais, você poderá solicitar a retirada, seus ganhos serão pagos em até 3 dias úteis, após o pedido de retirada. Verifique se o seu usuário Paypal, ou dados bancários estão corretos antes de confirmar.
</p>
<p>
    Atingindo o valor mínimo de R$ 9,00, aparecerá logo abaixo um menu com as opções de retirada, com isto basta escolher a qualquer momento a opção que melhor se encaixe para você.
</p>
<div class="row">
    <div class="span12">
        <div class="row">
            <div class="span4">
            </div>
            <div class="span4">
            </div>
            <div class="span4 text-right">
            </div>
        </div>
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
        <div class="row">
            <div class="span2">
                <h4>
                    R$ <?php print number_format($ganhos, 2, ',', '.') ?>
                </h4>
                <h5>TOTAL</h5>
            </div>
            <div class="span1 lead">
                =
            </div>
            <div class="span2">
                <h4>
                    R$ <?php print number_format($ganho_link, 2, ',', '.') ?>
                </h4>
                <h5>LINKS</h5>
            </div>
            <div class="span1 lead">
                +
            </div>
            <div class="span2">
                <h4>
                    R$ <?php print number_format($ganhos_referencia, 2, ',', '.') ?>
                </h4>
                <h5>REFERÊNCIA</h5>
            </div>
        </div>
    </div>
    <div class="span4">
        <?php if ($ganhos >= Configuracao::getConfig('retirada_minima')) { ?>
            <form class="pull-right well alert-success" action="<?php print url_for('@retirada_select') ?>" method="post">
                <h5>Resgatar todo ganho disponível</h5>
                <?php include_partial('commom/form', array('form' => $form)) ?>
                <span class="help-block">Selecione como deseja efetuar o resgate</span>
                <button type="submit" class="btn btn-block btn-primary">Solicitar Resgate</button>
            </form>
        <?php } ?>
    </div>
    <div class="span12">
        <hr>
        <h5>Histórico de resgates</h5>
        <?php include_partial('retirada/list', array('resgates' => $pager->getResults(), 'pager' => $pager)) ?>
        <?php include_partial('commom/pagination', array('pager' => $pager, 'route' => '@retirada')) ?>
    </div>
</div>
