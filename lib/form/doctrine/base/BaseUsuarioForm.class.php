<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'tipo_usuario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoUsuario'), 'add_empty' => true)),
      'referal_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Referal'), 'add_empty' => true)),
      'endereco'        => new sfWidgetFormTextarea(),
      'estado'          => new sfWidgetFormInputText(),
      'cidade'          => new sfWidgetFormInputText(),
      'cep'             => new sfWidgetFormInputText(),
      'telefone'        => new sfWidgetFormInputText(),
      'referal_code'    => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'tipo_usuario_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoUsuario'), 'required' => false)),
      'referal_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Referal'), 'required' => false)),
      'endereco'        => new sfValidatorString(array('required' => false)),
      'estado'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cidade'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cep'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telefone'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'referal_code'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
