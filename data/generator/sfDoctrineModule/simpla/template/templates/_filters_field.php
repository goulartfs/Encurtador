[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <p class="[?php echo $class ?]">
    [?php echo $form[$name]->renderLabel($label) ?]

    [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]
    
    [?php echo $form[$name]->renderError(array('class' => 'input-notification error')) ?]

    [?php if ($help || $help = $form[$name]->renderHelp()): ?]
      <br/><small>[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</small>
    [?php endif; ?]
  </p>
[?php endif; ?]