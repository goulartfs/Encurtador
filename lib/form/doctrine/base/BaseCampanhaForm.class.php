<?php

/**
 * Campanha form base class.
 *
 * @method Campanha getObject() Returns the current form's model object
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCampanhaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'user_id'                 => new sfWidgetFormInputText(),
      'titulo'                  => new sfWidgetFormInputText(),
      'url_campanha'            => new sfWidgetFormTextarea(),
      'orcamento_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Orcamento'), 'add_empty' => true)),
      'maximo_orcamento_diario' => new sfWidgetFormInputText(),
      'auth_key'                => new sfWidgetFormInputText(),
      'payment_method'          => new sfWidgetFormInputText(),
      'paypal_id'               => new sfWidgetFormInputText(),
      'is_payment_processed'    => new sfWidgetFormInputCheckbox(),
      'status_transacao_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StatusTransacao'), 'add_empty' => true)),
      'is_active'               => new sfWidgetFormInputCheckbox(),
      'is_finished'             => new sfWidgetFormInputCheckbox(),
      'end_date'                => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'                 => new sfValidatorInteger(array('required' => false)),
      'titulo'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'url_campanha'            => new sfValidatorString(array('required' => false)),
      'orcamento_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Orcamento'), 'required' => false)),
      'maximo_orcamento_diario' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'auth_key'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'payment_method'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'paypal_id'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_payment_processed'    => new sfValidatorBoolean(array('required' => false)),
      'status_transacao_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('StatusTransacao'), 'required' => false)),
      'is_active'               => new sfValidatorBoolean(array('required' => false)),
      'is_finished'             => new sfValidatorBoolean(array('required' => false)),
      'end_date'                => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('campanha[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Campanha';
  }

}
