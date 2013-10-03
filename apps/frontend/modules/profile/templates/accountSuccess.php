<form class="form-horizontal" action="<?php print url_for('profile/account') ?>" method="post">
    <fieldset>
        <legend>Informações pessoais</legend>
        <?php if ($sf_user->hasFlash('error')): ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div><?php echo $sf_user->getFlash('error') ?></div>
            </div>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('notice')): ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div><?php echo $sf_user->getFlash('notice') ?></div>
            </div>
        <?php endif; ?>
        
        <div class="control-group">
            <label class="control-label" for="username">Usuário</label>
            <div class="controls">
                <input type="text" value="<?php print $sf_user->getGuardUser()->getUsername() ?>" disabled />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="tipo_usuario">Tipo de usuário</label>
            <div class="controls">
                
                <input type="text" value="<?php print $sf_user->getGuardUser()->getUsuario()->getTipoUsuario() ?>" disabled />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="first_name"><?php echo $form['subform']['sfGuardUser']['first_name']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['subform']['sfGuardUser']['first_name']->renderError() ?>
                <?php echo $form['subform']['sfGuardUser']['first_name']->render(array('id' => 'first_name', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="last_name"><?php echo $form['subform']['sfGuardUser']['last_name']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['subform']['sfGuardUser']['last_name']->renderError() ?>
                <?php echo $form['subform']['sfGuardUser']['last_name']->render(array('id' => 'last_name', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="email_address"><?php echo $form['subform']['sfGuardUser']['email_address']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['subform']['sfGuardUser']['email_address']->renderError() ?>
                <?php echo $form['subform']['sfGuardUser']['email_address']->render(array('id' => 'email_address', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="estado"><?php echo $form['estado']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['estado']->renderError() ?>
                <?php echo $form['estado']->render(array('id' => 'estado', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cidade"><?php echo $form['cidade']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['cidade']->renderError() ?>
                <?php echo $form['cidade']->render(array('id' => 'cidade', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="cep"><?php echo $form['cep']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['cep']->renderError() ?>
                <?php echo $form['cep']->render(array('id' => 'cep', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="endereco"><?php echo $form['endereco']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['endereco']->renderError() ?>
                <?php echo $form['endereco']->render(array('id' => 'endereco', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="telefone"><?php echo $form['telefone']->renderLabelName() ?></label>
            <div class="controls">
                <?php echo $form['telefone']->renderError() ?>
                <?php echo $form['telefone']->render(array('id' => 'telefone', 'class' => 'text-input input-xlarge', 'placeholder' => '')) ?>
            </div>
        </div>
        
        <div class="control-group">
            <div class="controls">
                <?php echo $form->renderHiddenFields() ?>
                <button type="submit" class="btn btn-large btn-primary">Atualizar</button>
            </div>
        </div>
    </fieldset>
</form>