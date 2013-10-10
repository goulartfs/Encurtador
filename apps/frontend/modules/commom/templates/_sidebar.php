<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="#"><?php print $sf_user->getGuardUser()->getUsuario()->getTipoUsuario() ?></a>
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('account'))) ? 'active' : false; ?>"><a href="<?php print url_for('profile/account') ?>">Informações pessoais</a></li>
            <li class="divider-vertical"></li>
            <li class="dropdown <?php print (in_array($sf_context->getModuleName(), array('link'))) ? 'active' : false; ?>">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="#">
                    Links
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php print url_for('@link') ?>">Listar Links</a></li>
                    <li><a href="<?php print url_for('@link_mass') ?>">Encurtador em massa</a></li>
                </ul>
            </li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('campanha'))) ? 'active' : false; ?>"><a href="<?php print url_for('@campanha') ?>">Campanhas</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('carteira'))) ? 'active' : false; ?>"><a href="<?php print url_for('@carteira') ?>">Carteira</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('retirada'))) ? 'active' : false; ?>"><a href="<?php print url_for('@retirada') ?>">Resgate</a></li>
            <li class="divider-vertical"></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('faleconosco'))) ? 'active' : false; ?>"><a href="<?php print url_for('@suporte') ?>">Suporte</a></li>
        </ul>
    </div>
</div>