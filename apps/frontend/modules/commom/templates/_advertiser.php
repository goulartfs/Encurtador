<div class="navbar">
    <div class="navbar-inner">
        <!--<a class="brand" href="#">Advertiser</a>-->
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('list')) && in_array($sf_context->getModuleName(), array('campanha'))) ? 'active' : false; ?>"><a href="<?php print url_for('@campanha') ?>"><img alt="Home" src="/images/home.png"></a></li>
            <li class="<?php print (in_array($sf_context->getActionName(), array('newad'))) ? 'active' : false; ?>"><a href="<?php print url_for('@campanha_new') ?>"><img alt="Criar Campanha" src="/images/campanha.png"></a></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('carteira'))) ? 'active' : false; ?>"><a href="<?php print url_for('@carteira') ?>"><img alt="Carteira" src="/images/carteira.png"></a></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('referencia'))) ? 'active' : false; ?>"><a href="<?php print url_for('@referencia') ?>"><img src="/images/referencias.png" alt="Referências"></a></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('faleconosco'))) ? 'active' : false; ?>"><a href="<?php print url_for('@suporte') ?>"><img src="/images/suporte.png" alt="Suporte"></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>