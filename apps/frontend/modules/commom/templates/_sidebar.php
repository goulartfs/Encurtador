<?php
if ($sf_user->getAttribute('profile') == 'publisher') {
    include_partial('commom/publisher');
} else if ($sf_user->getAttribute('profile_preference') == 'advertiser') {
    include_partial('commom/advertiser');
} else {
    include_partial('commom/publisher');
    $sf_user->setAttribute('profile_preference', 'publisher');
}
?>
<div class="alert alert-success">
    Temos novidades para você. <a href="#myModal" role="button" data-toggle="modal"><strong>Clique aqui</strong></a> para mais informações.
</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Novidades para você!</h3>
    </div>
    <div class="modal-body">
        <h4>API de Encurtamento</h4>
        <p>
            Se você tem um site com 1 ou 10.000 mil links e deseja mudar para o CliquesBR, você tem um script simples, para realizar esta tarefa. <a href="<?php print url_for('@link_script') ?>" title="Page Script CliquesBR">Clique aqui</a> para saber mais!
        </p>
        <h4>Sistema antifraude</h4>
        <p>
            Integração de sistema antifraude com rastreamento de ip geolocalizado a fim de minimizarmos acessos inválidos ou tentativas via scripts e/ou macros.
        </p>
        <h4>Afiliados</h4>
        <p>
            Um novo sistema de afiliados, iremos pagar para você 10% de tudo que o seu afiliado vier a lucrar.
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>
</div>