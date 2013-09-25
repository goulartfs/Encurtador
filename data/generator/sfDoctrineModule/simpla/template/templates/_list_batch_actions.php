<?php if ($listActions = $this->configuration->getValue('list.batch_actions')): ?>
<div class="bulk-actions align-left">
  <select name="batch_action">
    <option value="">Escolha uma ação</option>
<?php foreach ((array) $listActions as $action => $params): ?>
    <?php echo $this->addCredentialCondition('<option value="'.$action.'">[?php echo __(\''.$params['label'].'\', array(), \'sf_admin\') ?]</option>', $params) ?>
<?php endforeach; ?>
  </select>
  
  [?php $form = new BaseForm(); if ($form->isCSRFProtected()): ?]
  <input type="hidden" name="[?php echo $form->getCSRFFieldName() ?]" value="[?php echo $form->getCSRFToken() ?]" />
  [?php endif; ?]
  <input type="submit" class="button" value="executar" />

</div>
<?php endif; ?>