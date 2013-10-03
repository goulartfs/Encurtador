<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#"><?php print $sf_user->getGuardUser()->getUsuario()->getTipoUsuario() ?></a>
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('account'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/account') ?>">Informações pessoais</a></li>
            <li class="divider-vertical"></li>
            <li class="dropdown <?php print (in_array($sf_context->getActionName(), array('links', 'mass'))) ? 'active' : false; ?>">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="#">
                    Links
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php print url_for('profile/links') ?>">Listar Links</a></li>
                    <li><a href="<?php print url_for('profile/mass') ?>">Encurtador em massa</a></li>
                </ul>
            </li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('ads'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/ads') ?>">Campanhas</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('wallet', 'addcredit'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/wallet') ?>">Carteira</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('changepass'))) ? 'active' : false; ?>"><a href="#">Trocar</a></li>
        </ul>
    </div>
</div>