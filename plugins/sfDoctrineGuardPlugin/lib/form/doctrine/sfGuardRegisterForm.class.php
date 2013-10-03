<?php

/**
 * sfGuardRegisterForm for registering new users
 *
 * @package    sfDoctrineGuardPlugin
 * @subpackage form
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: BasesfGuardChangeUserPasswordForm.class.php 23536 2009-11-02 21:41:21Z Kris.Wallsmith $
 */
class sfGuardRegisterForm extends BasesfGuardRegisterForm {

    /**
     * @see sfForm
     */
    public function configure() {
        $this->widgetSchema['tipo_usuario'] = new sfWidgetFormDoctrineChoice(array('model' => 'TipoUsuario', 'add_empty' => false));
        $this->validatorSchema['tipo_usuario'] = new sfValidatorDoctrineChoice(array('model' => 'TipoUsuario', 'required' => false));
    }

}
