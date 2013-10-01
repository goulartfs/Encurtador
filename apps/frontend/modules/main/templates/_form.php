<form action="<?php print url_for('@homepage') ?>" method="post">
    <?php print $form['url']->renderError() ?>
    <div class="display-fields">
        <?php print $form['url'] ?>
        <?php echo $form->renderHiddenFields() ?>
        <button class="" type="submit"><img src="/images/bt_encurtar.png" /></button>
        <p>
            <small>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br/>
                Ut pretium, eros vel auctor dictum.
            </small>
        </p>
    </div>
</form>