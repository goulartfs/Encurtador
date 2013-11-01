<textarea id="copyarea" class="span12 alert-success" style="height: 220px; text-align: left; font-size: 10pt; font-family: Courier;">
<script type="text/javascript">
    jQuery(function(){
        var paragraphs = jQuery("a[href*=http]:not(a[href*=<?php print $url_site; ?>])");
        for (var i = 0; i < paragraphs.length; i++)
        {
            newHref = paragraphs[i].href;
            paragraphs[i].href = '<?php print URL_BASE ?>/s?u=<?php print $sf_user->getGuardUser()->getUsuario()->getReferalCode() ?>&h=' + newHref;
        }
    });
</script>
</textarea>