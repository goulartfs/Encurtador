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
        </div>
    </div>
    <?php
}

?>
<?php print $form->renderHiddenFields() ?>

