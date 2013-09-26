<div class="row">
    <div class="span4">
        <a href="<?php print url_for('@homepage') ?>" title="CliqueBR"><img src="/images/logo.png" alt="Logo CliqueBR"/></a>
    </div>
    <div class="span8 text-right login-area">
        <?php if (!$sf_user->isAuthenticated()) { ?>
            <p>
                Já tem uma conta?
                <a href="<?php print url_for('login/index') ?>">
                    <img src="/images/bt_login.png" />
                </a>
            </p>
        <?php } else { ?>
            <p>
                Olá, <a class="username" href="<?php print url_for('@profile') ?>"><?php print ucfirst($sf_user->getGuardUser()->getFirstName()) ?></a>. Seja bem vindo!
                <br/>
                <a href="<?php print url_for('@sf_guard_signout') ?>">Deslogar</a>
            </p>
        <?php } ?>
    </div>
</div>