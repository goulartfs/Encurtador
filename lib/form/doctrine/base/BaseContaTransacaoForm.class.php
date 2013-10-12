<?php

/**
 * ContaTransacao form base class.
 *
 * @method ContaTransacao getObject() Returns the current form's model object
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContaTransacaoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'conta_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Conta'), 'add_empty' => true)),
      'auth_key'     => new sfWidgetFormInputText(),
      'valor'        => new sfWidgetFormInputText(),
      'is_processed' => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'conta_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Conta'), 'required' => false)),
      'auth_key'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'valor'        => new sfValidatorNumber(array('required' => false)),
      'is_processed' => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('conta_transacao[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContaTransacao';
  }

}
