<div class="navbar">
    <div class="navbar-inner">
        <!--<a class="brand" href="#">Advertiser</a>-->
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('list')) && in_array($sf_context->getModuleName(), array('campanha'))) ? 'active' : false; ?>"><a href="<?php print url_for('@campanha') ?>">Home</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('newad'))) ? 'active' : false; ?>"><a href="<?php print url_for('@campanha_new') ?>">Criar Campanha</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('carteira'))) ? 'active' : false; ?>"><a href="<?php print url_for('@carteira') ?>">Carteira</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('referencia'))) ? 'active' : false; ?>"><a href="<?php print url_for('@referencia') ?>">Referências</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('faleconosco'))) ? 'active' : false; ?>"><a href="<?php print url_for('@suporte') ?>">Suporte</a></li>
        </ul>
        <div class="pull-right">
            <a href="<?php print url_for('@profile_change?profile=publisher') ?>"><button class="btn btn-warning" type="button">Publisher</button></a>
        </div>
    </div>
</div>