<?php

/**
 * Usuario form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsuarioForm extends BaseUsuarioForm
{
  public function configure()
  {
      $subForm = new sfForm();
      $form = new sfGuardUserCustomForm(sfContext::getInstance()->getUser()->getGuardUser());
      $subForm->embedForm('sfGuardUser', $form);
      $this->embedForm('subform', $subForm);
      
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['password_atual'] = new sfWidgetFormInputPassword(array('label'=>'Senha Atual'));
      $this->widgetSchema['tipo_usuario_id'] = new sfWidgetFormInputHidden();
      $this->setDefault('user_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());
      
      $this->validatorSchema['password_atual'] = new sfValidatorString(array('required'=>false));
      
      unset($this['created_at'], $this['updated_at']);
  }
}
