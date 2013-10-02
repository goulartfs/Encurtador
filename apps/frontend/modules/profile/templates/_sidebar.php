<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('account'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/account') ?>">Informações pessoais</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('links'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/links') ?>">Links encurtados</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('ads'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/ads') ?>">Campanhas</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('wallet', 'addcredit'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/wallet') ?>">Carteira</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('changepass'))) ? 'active' : false; ?>"><a href="#">Trocar</a></li>
        </ul>
    </div>
</div>