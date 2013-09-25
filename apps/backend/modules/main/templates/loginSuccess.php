<form action="<?php echo url_for('main/login') ?>" method="post">
  <?php if ($sf_user->hasFlash('error')): ?>
  <div class="notification information png_bg">
		<div><?php echo $sf_user->getFlash('error') ?></div>
	</div>
  <?php endif; ?>
  
	<p>
		<label>Usuário</label>
		<?php echo $form['username']->render(array('class' => 'text-input')) ?>
	</p>
	<div class="clear"></div>
	<p>
		<label>Senha</label>
		<?php echo $form['password']->render(array('class' => 'text-input')) ?>
	</p>
	<div class="clear"></div>
	<p id="remember-password">
		<?php echo $form['remember'] ?> Lembrar senha
	</p>
	<div class="clear"></div>
	<p>
	  <?php echo $form->renderHiddenFields() ?>
		<input class="button" value="Login" type="submit">
	</p>
</form>