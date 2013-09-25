[?php use_helper('I18N', 'Date') ?]

<h2>[?php echo <?php echo $this->getI18NString('new.title') ?> ?]</h2>

<div class="content-box">
	
	<div class="content-box-content">
		[?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
		
    [?php include_partial('<?php echo $this->getModuleName() ?>/form', array('<?php echo $this->getSingularName() ?>' => $<?php echo $this->getSingularName() ?>, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?]
	</div>
</div>