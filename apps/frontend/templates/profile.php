<!DOCTYPE html>
<html lang="en">
    <head>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>

    <body class="interna">
        <?php include_partial('commom/header') ?>
        <?php
            if(has_slot('encurtador-form')){
            ?>
                <div id="encurtador">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <?php print get_slot('encurtador-form'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        ?>
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <?php print $sf_content; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include_partial('commom/footer') ?>
    </body>
</html>
