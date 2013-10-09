<?php

/**
 * DadoBancario form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DadoBancarioForm extends BaseDadoBancarioForm
{
  public function configure()
  {
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      
      $this->validatorSchema['banco'] = new sfValidatorString(array('required'=>true));
      $this->validatorSchema['agencia'] = new sfValidatorString(array('required'=>true));
      $this->validatorSchema['tipo_conta'] = new sfValidatorString(array('required'=>true));
      $this->validatorSchema['conta_numero'] = new sfValidatorString(array('required'=>true));
      $this->validatorSchema['favorecido'] = new sfValidatorString(array('required'=>true));
      $this->validatorSchema['cpf'] = new sfValidatorString(array('required'=>true));
      
      unset($this['created_at'], $this['updated_at']);
  }
}
