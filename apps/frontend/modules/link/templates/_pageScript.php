    jQuery(function(){
        sites_excluded = '';
        jQuery.each(sites_para_exclusao, function( index, value ) {
             sites_excluded += 'a[href*='+value+'],'
        });
        var paragraphs = jQuery("a[href*=http]:not("+sites_excluded+"a[href*=adpllus])");
        for (var i = 0; i < paragraphs.length; i++)
        {
            newHref = paragraphs[i].href;
            paragraphs[i].href = '<?php print URL_BASE ?>/s?u=<?php print $sf_user->getGuardUser()->getUsuario()->getReferalCode() ?>&h=' + newHref;
        }
    });