<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#">Advertiser</a>
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('account'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/account') ?>">Informações pessoais</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('campanha'))) ? 'active' : false; ?>"><a href="<?php print url_for('@campanha') ?>">Campanhas</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('carteira'))) ? 'active' : false; ?>"><a href="<?php print url_for('@carteira') ?>">Carteira</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('faleconosco'))) ? 'active' : false; ?>"><a href="<?php print url_for('@suporte') ?>">Suporte</a></li>
        </ul>
        <div class="pull-right">
            <a href="<?php print url_for('@profile_change?profile=publisher') ?>"><button class="btn btn-warning" type="button">Publisher</button></a>
        </div>
    </div>
</div>