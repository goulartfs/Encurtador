<div class="navbar">
    <div class="navbar-inner">
        <!--<a class="brand" href="#">Publisher</a>-->
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('list'))) ? 'active' : false; ?>"><a href="<?php print url_for('@link') ?>">Home</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('referencia'))) ? 'active' : false; ?>"><a href="<?php print url_for('@referencia') ?>">Referências</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('mass'))) ? 'active' : false; ?>"><a href="<?php print url_for('@link_mass') ?>">Ferramentas</a></li>
<!--            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('account'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/account') ?>">Informações pessoais</a></li>-->
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('retirada'))) ? 'active' : false; ?>"><a href="<?php print url_for('@retirada') ?>">Resgate</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('faleconosco'))) ? 'active' : false; ?>"><a href="<?php print url_for('@suporte') ?>">Suporte</a></li>
        </ul>
        <div class="pull-right">
            <a href="<?php print url_for('@profile_change?profile=advertiser') ?>"><button class="btn btn-warning" type="button">Advertiser</button></a>
        </div>
    </div>
</div>