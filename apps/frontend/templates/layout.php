<!DOCTYPE html>
<html lang="en">
    <head>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <link href='http://fonts.googleapis.com/css?family=Oxygen:400,700' rel='stylesheet' type='text/css'>
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
    </head>

    <body class="home">
        <?php include_partial('commom/headerHome') ?>
        <?php include_partial('commom/porques') ?>
        <div id="content">
            <?php print $sf_content; ?>
        </div>
        <?php include_partial('commom/footer') ?>
    </body>
</html>
