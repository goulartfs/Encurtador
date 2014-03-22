<header>
    <div class="container">
        <?php include_partial('commom/logo') ?>
        <div class="cadastro-login">
            <a href="#cadastro">Cadastro <img src="/images/right_arrow.png" alt=""></a>
            <a href="#login">Login <img src="/images/right_arrow.png" alt=""></a>
            <div class="clear"></div>
        </div>
        <div class="form">
            <?php include_component('main','homeRegister') ?>
            <?php include_component('main','homeLogin') ?>
        </div>
    </div>
</header>