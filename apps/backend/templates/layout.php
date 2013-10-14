<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt_BR" lang="pt_BR">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <!--[if lte IE 7]><?php echo stylesheet_tag('/simpla/css/ie.css') ?><![endif]-->
        <?php include_javascripts() ?>
    </head>
    <body>
        <div id="body-wrapper">
            <div id="sidebar"><div id="sidebar-wrapper">
                    <h1 id="sidebar-title"><a href="<?php echo url_for('@homepage') ?>"><img src="/simpla/images/logo_adm.jpg" alt="Paineiras" /></a></h1>

                    <div id="profile-links">
                        <a href="/">Ir para o site</a> | <a href="<?php echo url_for('', array()) ?>" title="Logout">Logout</a>
                    </div>        
                    <ul id="main-nav">
                        <li><a href="<?php echo url_for('url/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('url')))
                        echo 'current' ?>">Links</a></li>
                        <li><a href="<?php echo url_for('campanha/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('campanha')))
                        echo 'current' ?>">Campanhas</a></li>
                        <li><a href="<?php echo url_for('orcamento/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('orcamento')))
                        echo 'current' ?>">Orçamentos</a></li>
                        <li><a href="<?php echo url_for('resgate/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('resgate')))
                        echo 'current' ?>">Resgates</a></li>
                        <li><a href="<?php echo url_for('conta/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('conta')))
                        echo 'current' ?>">Carteira</a></li>
                        <li><a href="<?php echo url_for('configuracao/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('configuracao')))
                        echo 'current' ?>">Configurações</a></li>
                        <li><a href="<?php echo url_for('sf_guard_user/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('sf_guard_user')))
                        echo 'current' ?>">Logins</a></li>
                        <li><a href="<?php echo url_for('usuario/index') ?>" class="nav-top-item no-submenu <?php if (in_array($sf_context->getModuleName(), array('usuario')))
                        echo 'current' ?>">Usuários</a></li>
                    </ul>
                </div></div>

            <div id="main-content">
                <?php echo $sf_content ?>

                <div id="footer">
                    <small>&#169;</small>
                </div>
            </div>
        </div>
    </body>
</html>
