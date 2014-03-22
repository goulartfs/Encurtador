<div class="navbar">
    <div class="navbar-inner">
        <!--<a class="brand" href="#">Publisher</a>-->
        <ul class="nav">
            <li class="<?php print (in_array($sf_context->getActionName(), array('list'))) ? 'active' : false; ?>"><a href="<?php print url_for('@link') ?>"><img alt="Home" src="/images/home.png"></a></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('referencia'))) ? 'active' : false; ?>"><a href="<?php print url_for('@referencia') ?>"><img src="/images/referencias.png" alt="Referências"></a></li>
            <li class="dropdown <?php print (in_array($sf_context->getActionName(), array('pageScript', 'mass'))) ? 'active' : false; ?>">
                <a class="dropdown-toggle"
                   data-toggle="dropdown"
                   href="#">
                    <img src="/images/ferramentas.png" alt="Ferramentas">
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php print url_for('@link_mass') ?>">Encurtador em massa</a></li>
                    <li><a href="<?php print url_for('@link_script') ?>">Script de Página</a></li>
                </ul>
            </li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('retirada'))) ? 'active' : false; ?>"><a href="<?php print url_for('@retirada') ?>"><img src="/images/resgate.png" alt="Resgate"></a></li>
            <li class="<?php print (in_array($sf_context->getModuleName(), array('faleconosco'))) ? 'active' : false; ?>"><a href="<?php print url_for('@suporte') ?>"><img src="/images/suporte.png" alt="Suporte"></a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>