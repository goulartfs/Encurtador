<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p>
    O script de encurtamento de link irá varrer todos os links da sua página e substituir os links para gerar um encurtamento automático.<br/>
    Os links poderão ser visto na sua lista de links a medida em que eles forem sendo acessados, assim você terá um melhor acompanhamento dos cliques.<br/>
    Para o funcionamento correto do script deve-se atentar para as seguintes instruções:
</p>
<ol>
    <li>
        Seu site deve ter/estar utilizando <strong>jQuery</strong>;
    </li>
    <li>
        O script deve ser colocado entre as tags <code>&lt;head&gt;&lt;/head&gt;</code> ou logo antes do fechamento da tag <code>&lt;/body&gt;</code>;
    </li>
</ol>
<div class="alert alert-danger">
    <h5>Importante</h5>
    O script irá substituir todos os links do seu site fazendo com que o usuário seja redirecionado para nossos serviços,
    <strong>caso deseje preservar os links referentes ao seu site</strong>, favor utilizar o formulário abaixo informando o seu domínio.
    <br/>
    Você pode utilizar: <em>http://www.seusite.com.br</em>, <em>www.seusite.com.br</em>, <em>seusite.com.br</em>, <em>seusite</em>.
</div>
<form id="gera-script" method="post" action="<?php print url_for('@link_gerar_script') ?>" class="form-horizontal">
    <fieldset>
        <legend>Script de Página</legend>

        <div class="control-group">
            <label for="url_site" class="control-label">Url do site</label>        
            <div class="controls">
                <input type="text" id="url_site" name="url_site" placeholder="http://www.seusite.com" class="text-input input-xlarge">                    
                <span class="help-block">Essa url não será encurtada</span>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <button class="btn btn-primary" type="submit">Gerar Script</button>
            </div>
        </div>
    </fieldset>
</form>
<p class="lead">
    Copie abaixo o script e cole no seu site para um encurtamento automático e rápido!
</p>
<div id="load-script">
    <textarea id="copyarea" class="span12 alert-success" style="height: 220px; text-align: left; font-size: 10pt; font-family: Courier;">
<script type="text/javascript">
    jQuery(function(){
        var paragraphs = jQuery("a[href*=http]:not(a[href*=SEU_SITE_AQUI])");
        for (var i = 0; i < paragraphs.length; i++)
        {
            newHref = paragraphs[i].href;
            paragraphs[i].href = '<?php print URL_BASE ?>/s?u=<?php print $sf_user->getGuardUser()->getUsuario()->getReferalCode() ?>&h=' + newHref;
        }
    });
</script>
    </textarea>
</div>
<script>
    $("#copyarea").focus(function() {
        var $this = $(this);
        $this.select();

        // Work around Chrome's little problem
        $this.mouseup(function() {
            // Prevent further mouseup intervention
            $this.unbind("mouseup");
            return false;
        });
    });
    $("#gera-script").submit(function(event) {

        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $(this),
                url = $form.attr("action");

        // Send the data using post
        var posting = $.post(url, $form.serialize());

        // Put the results in a div
        posting.done(function(data) {
            var content = data;
            $("#load-script").empty().append(content);
        });
    });
</script>