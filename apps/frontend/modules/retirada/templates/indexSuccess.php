<h1 class="head_page">Resgate</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<div class="row">
    <div class="span12">
        <!--<div class="well">-->
        <div class="row">
            <div class="span4">
                <h3>Todo ganho disponível</h3>
                <div class="">
                    <h4>
                        R$ <?php print $ganhos ?>
                    </h4>
                    <h5>TOTAL</h5>
                </div>
            </div>
            <div class="span4">
            </div>
            <div class="span4 text-right">
                <h3>Último resgate</h3>
                <div>
                    <h4>
                        R$ <?php print $ganhos ?>
                    </h4>
                    <h5>TOTAL</h5>
                </div>
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
    <div class="span4">
        <form class="pull-left well alert-success" action="<?php print url_for('@retirada_select') ?>" method="post">
            <h5>Resgatar todo ganho disponível</h5>
            <?php include_partial('commom/form', array('form' => $form)) ?>
            <span class="help-block">Selecione como deseja efetuar o resgate</span>
            <button type="submit" class="btn btn-block btn-primary">Solicitar Resgate</button>
        </form>
    </div>
    <div class="span8">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
            Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.
        </p>

    </div>
    <div class="span12">
        <h5>Lorem ipsum dolor sit amet</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
    </div>
</div>