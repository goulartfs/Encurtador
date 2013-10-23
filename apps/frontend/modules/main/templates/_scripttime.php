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
<?php if ($control) { ?>
                $.post("<?php print url_for('@confirm_resolve?idl=' . $ad->getId() . '&idc=' . $url->getId()) ?>", function() {
                    $(".button-area").html('<a href="<?php print $url->getOriginalUrl() ?>"><button class="btn btn-success timecron" type="button">Fechar propaganda</button></a>');
                });
<?php } else { ?>
                $(".button-area").html('<a href="<?php print $url->getOriginalUrl() ?>"><button class="btn btn-success timecron" type="button">Fechar propaganda</button></a>');
<?php } ?>
        }

    }
</script>