<div class="row">
    <div class="span4">
        <?php include_partial('commom/logo') ?>
    </div>
    <?php if (!$sf_user->isAuthenticated()) { ?>
        <div class="span4 text-right login-area pull4">
            <div class="cadastro-login">
                <a href="#login">Login <img src="/images/right_arrow.png" alt=""></a>

                <div class="clear"></div>
            </div>
            <div class="form">
                <?php include_component('main', 'homeLogin') ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="span4 change-profile">
            <a class="<?php print ($sf_user->getAttribute('profile_preference') == 'advertiser')?'active':'' ?>" href="<?php print url_for('@profile_change?profile=advertiser') ?>">Advertiser</a>
            <a class="<?php print ($sf_user->getAttribute('profile_preference') == 'publisher')?'active':'' ?>" href="<?php print url_for('@profile_change?profile=publisher') ?>">Publisher</a>
            <div class="clearfix"></div>
        </div>
        <div class="span2">
            <div class="user">
                <p>
                    Seja bem vindo,
                    <span><?php print ucfirst($sf_user->getGuardUser()->getFirstName()) ?></span>
                    <a class="username"
                       href="<?php print url_for('@profile') ?>">Ver Cadastro</a>
                </p>
            </div>
        </div>
        <div class="span2">
            <a href="<?php print url_for('@sf_guard_signout') ?>" class="logout"><img alt=""
                                                                                      src="/images/right_arrow.png">Logout</a>
        </div>
    <?php } ?>
</div>