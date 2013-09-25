[?php use_helper('I18N', 'Date') ?]

<h2>[?php echo <?php echo $this->getI18NString('list.title') ?> ?]</h2>

[?php include_partial('<?php echo $this->getModuleName() ?>/topo', array('helper' => $helper)) ?]

<ul class="sf_admin_actions">
  [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
</ul>

<div class="content-box [?php echo $this->getModuleName() ?]">
	<div class="content-box-header">
		<h3>&nbsp;</h3>
		
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Lista</a></li>
			
			<?php if ($this->configuration->hasFilterForm()): ?>
			<li><a href="#tab2">Filtrar resultados</a></li>
			<?php endif; ?>
		</ul>
		
		<div class="clear"></div>
	</div>
	
	<div class="content-box-content">
		<div class="tab-content default-tab" id="tab1">
		  
		  [?php include_partial('<?php echo $this->getModuleName() ?>/flashes') ?]
		  
      <?php if ($this->configuration->getValue('list.batch_actions')): ?>
      <form action="[?php echo url_for('<?php echo $this->getUrlForAction('collection') ?>', array('action' => 'batch')) ?]" method="post">
      <?php endif; ?>
    
      [?php include_partial('<?php echo $this->getModuleName() ?>/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?]
        
			<?php if ($this->configuration->getValue('list.batch_actions')): ?>
      </form>
      <?php endif; ?>
		</div>
		
		<?php if ($this->configuration->hasFilterForm()): ?>
      <div class="tab-content" id="tab2">
        [?php include_partial('<?php echo $this->getModuleName() ?>/filters', array('form' => $filters, 'configuration' => $configuration)) ?]
      </div>
    <?php endif; ?>
	</div>
</div>

<ul class="sf_admin_actions">
  [?php include_partial('<?php echo $this->getModuleName() ?>/list_actions', array('helper' => $helper)) ?]
</ul>