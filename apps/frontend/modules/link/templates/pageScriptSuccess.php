<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
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
<div class="alert alert-danger">
    É necessário que seu site utilize <strong>jQuery</strong>, o não cumprimento desse requisito acarretará em falha na execução do script.
</div>
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