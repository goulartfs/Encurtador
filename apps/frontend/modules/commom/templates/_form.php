<?php
foreach ($form as $field) {
    if ($field->isHidden())
        continue;
    ?>
    <div class="control-group">
        <?php print $field->renderLabel($field->renderLabelName(), array('class' => 'control-label')) ?>
        <div class="controls">
            <?php echo $field->renderError() ?>
            <?php echo $field->render(array('class' => 'text-input input-xlarge')) ?>
            <?php if ($field->renderHelp()) { ?>
                <span class="help-block"><?php print $field->renderHelp() ?></span>
            <?php } ?>
        </div>
    </div>
    <?php
}
?>
<?php print $form->renderHiddenFields() ?>

