[?php use_stylesheets_for_form($form) ?]
[?php use_javascripts_for_form($form) ?]

<div class="simpla_admin_filter">
  [?php if ($form->hasGlobalErrors()): ?]
    [?php echo $form->renderGlobalErrors() ?]
  [?php endif; ?]

  <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter')) ?]" method="post">
    <fieldset>
      [?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?]
      [?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?]
        [?php include_partial('<?php echo $this->getModuleName() ?>/filters_field', array(
          'name'       => $name,
          'attributes' => $field->getConfig('attributes', array()),
          'label'      => $field->getConfig('label'),
          'help'       => $field->getConfig('help'),
          'form'       => $form,
          'field'      => $field,
          'class'      => 'simpla_admin_'.strtolower($field->getType()).' simpla_admin_filter_field_'.$name,
        )) ?]
      [?php endforeach; ?]
    </fieldset>
    
    [?php echo $form->renderHiddenFields() ?]
    [?php echo link_to(__('Reset', array(), 'sf_admin'), '<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?]
    <input type="submit" value="[?php echo __('Filter', array(), 'sf_admin') ?]" />
  </form>
  
  <div class="clear"></div>
</div>