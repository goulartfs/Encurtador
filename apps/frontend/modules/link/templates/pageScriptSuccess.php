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
    <strong>caso deseje preservar os links referentes ao seu site</strong>, favor informar os endereços na variável de exclusão "<strong>var sites_para_exclusao</strong>".
    <br/><br/>
    <em>Exemplo</em>:<br/>
    Para excluir do encurtamento os links referentes aos sites, <strong>Facebook</strong>, <strong>Twitter</strong>, <strong>etc</strong>.
    <br/><br/>
    <em>Utilizar</em>:<br/>
    <code>var sites_para_exclusao = ["facebook","twitter","etc"];</code><br/>
    Conforme script abaixo.
</div>
<p class="well well-small">
    Caso você utilize os serviços do Blogger e esteja enfrentando problemas, adicione esta linha antes de incluir nosso script para adicionar o <strong>jQuery</strong> ao seu site:<br/>
        <code>&lt;script src="http://code.jquery.com/jquery-1.9.1.js"&gt;&lt;/script&gt;</code>
</p>
<p class="lead">
    Copie abaixo o script e cole no seu site para um encurtamento automático e rápido!
</p>
<div id="load-script">
    <textarea id="copyarea" class="span12 alert-success" style="height: 160px; text-align: left; font-size: 10pt; font-family: Courier;">
<script type="text/javascript">
    var sites_para_exclusao = ["site1","site2","site3"];
    jQuery(function(){sites_excluded="";jQuery.each(sites_para_exclusao,function(e,t){sites_excluded+="a[href*="+t+"],"});var e=jQuery("a[href*=http]:not("+sites_excluded+"a[href*=Adpllus])");for(var t=0;t<e.length;t++){newHref=e[t].href;e[t].href="<?php print URL_BASE ?>/s?u=<?php print $sf_user->getGuardUser()->getUsuario()->getReferalCode() ?>&h="+newHref}})
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
