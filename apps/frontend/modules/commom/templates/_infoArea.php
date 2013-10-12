<?php if ($sf_user->hasFlash('error') && $sf_user->getFlash('error')): ?>
    <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div><?php echo $sf_user->getFlash('error') ?></div>
    </div>
<?php endif; ?>
<?php if ($sf_user->hasFlash('notice') && $sf_user->getFlash('notice')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <div><?php echo $sf_user->getFlash('notice') ?></div>
    </div>
<?php endif; ?>