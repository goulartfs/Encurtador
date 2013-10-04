<h2>Campanhas</h1>
<div class="row help-block">
    <div class="span12">
        <?php include_partial('profile/list_ads', array('ads' => $pager->getResults(), 'pager' => $pager)) ?>
        <?php if ($pager->haveToPaginate()): ?>
            <div class="pagination">
                <ul>
                    <li class="<?php print ($pager->getPreviousPage() == $sf_request->getParameter('page', 1)) ? "disabled" : false; ?>"><a href="<?php echo url_for('profile/ads') ?>?page=<?php echo $pager->getPreviousPage() ?>">«</a></li>
                    <?php foreach ($pager->getLinks() as $page): ?>
                        <?php if ($page == $pager->getPage()): ?>
                            <li class="active"><a href="#"><?php echo $page ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo url_for('profile/ads', true) ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <li class="<?php print ($pager->getNextPage() == $sf_request->getParameter('page')) ? "disabled" : false; ?>"><a href="<?php echo url_for('profile/ads') ?>?page=<?php echo $pager->getNextPage() ?>">»</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="row">
    <div class="span12">
        <a class="btn btn-success" href="<?php print url_for('profile/new-ad') ?>"><i class="icon-plus icon-white"></i>  Nova Campanha</a>
    </div>
</div>