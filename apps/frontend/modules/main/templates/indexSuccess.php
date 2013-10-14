<div class="span12">
    <?php if (false && $urls) { ?>
        <table class="table table-striped table-condensed">
            <thead>
                <tr>
                    <th>Url Original</th>
                    <th>Url Encurtada</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($urls->count()) { ?>
                    <?php foreach ($urls as $url) { ?>
                        <tr>
                            <td><a href="<?php print $url->getOriginalUrl() ?>" target="_blank"><?php print $url->getOriginalUrl() ?></a></td>
                            <td><a href="<?php print URL_BASE . url_for('@resolve_url?url_id=' . $url->getShortUrl()) ?>"><?php print str_replace(array('http://', 'https://'), '', URL_BASE . url_for('@resolve_url?url_id=' . $url->getShortUrl())) ?></a></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    <?php if(isset($url)){ ?>
    <p class="alert alert-success">
        Parabéns, você encurtou seu link: <?php print link_to($url->getFullUrl(), $url->getFullUrl()); ?>
    </p>
    <?php } ?>
</div>