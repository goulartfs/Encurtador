<h2>Campanhas</h1>
<div class="row help-block">
    <div class="span12">
        <?php include_partial('profile/list_ads', array('ads' => $pager->getResults(), 'pager' => $pager)) ?>
        <?php include_partial('profile/pagination', array('pager' => $pager, 'route' => 'profile/ads')) ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        <a class="btn btn-success" href="<?php print url_for('profile/new-ad') ?>"><i class="icon-plus icon-white"></i>  Nova Campanha</a>
    </div>
</div>