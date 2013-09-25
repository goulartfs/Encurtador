[?php if ($field->isPartial()): ?]
  [?php include_partial('<?php echo $this->getModuleName() ?>/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php elseif ($field->isComponent()): ?]
  [?php include_component('<?php echo $this->getModuleName() ?>', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?]
[?php else: ?]
  <p class="simpla_field [?php echo $class ?][?php $form[$name]->hasError() and print ' errors' ?]">
      [?php echo $form[$name]->renderLabel($label) ?]

      [?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?]
      
      [?php echo $form[$name]->renderError(array('class' => 'input-notification error png_bg')) ?]

      [?php if ($help): ?]
        <small>[?php echo __($help, array(), '<?php echo $this->getI18nCatalogue() ?>') ?]</small>
      [?php elseif ($help = $form[$name]->renderHelp()): ?]
        <small>[?php echo $help ?]</small>
      [?php endif; ?]
  </p>
[?php endif; ?]