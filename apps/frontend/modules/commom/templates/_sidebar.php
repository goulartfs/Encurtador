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
<div class="alert alert-info">
    Temos algumas novidades para você. <a href="#myModal" role="button" data-toggle="modal"><strong>Clique aqui</strong></a> para mais informações.
</div>
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">O que vem por aí?</h3>
    </div>
    <div class="modal-body">
        <h4>Lorem ipsum dolor</h4>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        </p>
        <h4>Lorem ipsum dolor</h4>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        </p>
        <h4>Lorem ipsum dolor</h4>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        </p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Fechar</button>
    </div>
</div>