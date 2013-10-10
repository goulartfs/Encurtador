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
        <script language="JavaScript" type="text/javascript">
            window.onresize = AjustarIFrame;

            function AjustarIFrame()
            {
                //Identifica navegador
                var TamanhoTopo;
                TamanhoTopo = 113;

                if (navigator.appName.indexOf("Microsoft") != -1)
                {
                    document.getElementById('adFrame').height = document.documentElement.clientHeight - TamanhoTopo;
                }
                else
                {
                    document.getElementById('adFrame').height = window.innerHeight - TamanhoTopo;
                }
            }
        </script> 
    </head>

    <body class="link" onload="JavaScript:AjustarIFrame();">
        <?php include_partial('commom/headerLink') ?>
        <div id="content">
            <?php print $sf_content; ?>
        </div>
    </body>
</html>
