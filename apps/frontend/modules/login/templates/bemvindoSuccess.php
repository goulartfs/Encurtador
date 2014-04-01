<div class="hero-unit">
    <h1>Bem vindo, <span class="text-warning"><?php print $sf_user->getGuardUser()->getFirstName() ?></span></h1>
    <p>
        <a class="btn btn-large btn-primary" href="<?php print url_for('@profile') ?>">Ir para o perfil</a>
    </p>
<!--    <button class="btn btn-large btn-block" type="button">Desejo encurtar meus endereços</button>
    <button class="btn btn-large btn-block btn-primary" type="button">Desejo anunciar meu site e aumentar minhas visitas</button>-->
</div>