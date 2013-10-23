<script>
    function startCountdown(){if(tempo-1>=0){var e=parseInt(tempo/60);var t=tempo%60;if(e<10){e="0"+e;e=e.substr(0,2)}if(t<=9){t="0"+t}horaImprimivel="00:"+e+":"+t;horaImprimivel=t+" segundos";$(".timecron").html(horaImprimivel);setTimeout("startCountdown()",1500);tempo--}else{<?php if ($control) { ?>
                $.post("<?php print url_for('@confirm_resolve?idl=' . $ad->getId() . '&idc=' . $url->getId()) ?>",function(){$(".button-area").html('<a href="<?php print $url->getOriginalUrl() ?>"><button class="btn btn-success timecron" type="button">Fechar propaganda</button></a>');});
<?php } else { ?>
                $(".button-area").html('<a href="<?php print $url->getOriginalUrl() ?>"><button class="btn btn-success timecron" type="button">Fechar propaganda</button></a>');
<?php } ?>}}var tempo=new Number;tempo=5
</script>
<?php if ($ad) { ?>
    <iframe onload="startCountdown();" id="adFrame" width="100%" height="500" scrolling="auto" src="<?php print $ad->getUrlCampanha() ?>" frameborder="0" seamless></iframe>
<?php } ?>