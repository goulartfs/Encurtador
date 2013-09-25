[?php if ($sf_user->hasFlash('notice')): ?]
  <div class="notification information png_bg">
    <a href="#" class="close">Fechar</a>
    <div>[?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?]</div>
  </div>
[?php endif; ?]

[?php if ($sf_user->hasFlash('error')): ?]
  <div class="notification error png_bg">
    <a href="#" class="close">Fechar</a>
    <div>[?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?]</div>
  </div>
[?php endif; ?]