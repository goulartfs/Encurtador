<?php if ($ad) { ?>
    <iframe id="adFrame" width="100%" height="500" scrolling="auto" src="<?php print $ad->getUrlCampanha() ?>" frameborder="0" seamless></iframe>
<?php } ?>
<script>
    var tempo = new Number();
// Tempo em segundos
    tempo = 5;

    function startCountdown() {
        if ((tempo - 1) >= 0) {

            var min = parseInt(tempo / 60);
            var seg = tempo % 60;

            if (min < 10) {
                min = "0" + min;
                min = min.substr(0, 2);
            }
            if (seg <= 9) {
                seg = "0" + seg;
            }

            horaImprimivel = '00:' + min + ':' + seg;
            horaImprimivel = seg + ' segundos';
            $(".timecron").html(horaImprimivel);
            setTimeout('startCountdown()', 1500);
            tempo--;
        } else {
            $(".button-area").html('<a href="<?php print $url->getOriginalUrl() ?>"><button class="btn btn-success timecron" type="button">Fechar propaganda</button></a>');
        }

    }

    startCountdown();
</script>