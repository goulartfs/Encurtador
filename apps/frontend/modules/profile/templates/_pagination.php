<?php if ($pager->haveToPaginate()): ?>
    <div class="pagination">
        <ul>
            <li class="<?php print ($pager->getPreviousPage() == $sf_request->getParameter('page', 1)) ? "disabled" : false; ?>"><a href="<?php echo url_for($route) ?>?page=<?php echo $pager->getPreviousPage() ?>">«</a></li>
            <?php foreach ($pager->getLinks() as $page): ?>
                <?php if ($page == $pager->getPage()): ?>
                    <li class="active"><a href="#"><?php echo $page ?></a></li>
                    <?php else: ?>
                    <li><a href="<?php echo url_for($route, true) ?>?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
            <li class="<?php print ($pager->getNextPage() == $sf_request->getParameter('page')) ? "disabled" : false; ?>"><a href="<?php echo url_for($route) ?>?page=<?php echo $pager->getNextPage() ?>">»</a></li>
        </ul>
    </div>
<?php endif; ?>