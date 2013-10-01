<div class="span12">
    <!--    <div class="hero-unit">
            <h1>Parabéns!</h1>
            <p>Aqui está a sua url encurtada.</p>-->
    <p class="alert alert-success">Ir para <a href="<?php print $url->getOriginalUrl() ?>"><?php print $url->getOriginalUrl(); ?></a></p>
    <!--</div>-->
</div>
<?php if ($ad) { ?>
<iframe width="100%" height="800" scrolling="auto" src="<?php print $ad->getUrlCampanha() ?>" frameborder="0" seamless></iframe>
<?php } ?>