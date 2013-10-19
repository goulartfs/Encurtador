<form action="<?php print url_for('@homepage') ?>" method="post">
    <?php print $form['url']->renderError() ?>
    <div class="display-fields">
        <?php print $form['url']->render(array('class'=>'input-block-level span10')) ?>
        <?php echo $form->renderHiddenFields() ?>
        <button class="" type="submit"><img src="/images/bt_encurtar.png" /></button>
        <p>
            <small>
                Registre-se em nosso site e comece encurtar seus links.
            </small>
        </p>
    </div>
</form>