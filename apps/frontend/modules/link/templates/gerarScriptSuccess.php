<textarea id="copyarea" class="span12 alert-success" style="height: 160px; text-align: left; font-size: 10pt; font-family: Courier;">
<script type="text/javascript">
    var sites_para_exclusao = ["<?php print $url_site ?>"];
    jQuery(function(){sites_excluded="";jQuery.each(sites_para_exclusao,function(e,t){sites_excluded+="a[href*="+t+"],"});var e=jQuery("a[href*=http]:not("+sites_excluded+"a[href*=cliquesbr])");for(var t=0;t<e.length;t++){newHref=e[t].href;e[t].href="http://localhost:9001/s?u=c81e728d9d4c2f636f067f89cc14862c&h="+newHref}})
</script></textarea>
