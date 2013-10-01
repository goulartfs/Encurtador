<ul class="nav nav-pills nav-stacked">
    <li class="<?php print (in_array($sf_context->getActionName(), array('account')))?'active':false; ?>"><a href="<?php print url_for('profile/account') ?>">Informações pessoais</a></li>
    <li class="<?php print (in_array($sf_context->getActionName(), array('links')))?'active':false; ?>"><a href="<?php print url_for('profile/links') ?>">Links encurtados</a></li>
    <li class="<?php print (in_array($sf_context->getActionName(), array('changepass')))?'active':false; ?>"><a href="#">Trocar</a></li>
</ul>