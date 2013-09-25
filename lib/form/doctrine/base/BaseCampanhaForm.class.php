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
      'id'           => new sfWidgetFormInputHidden(),
      'usuario_id'   => new sfWidgetFormInputText(),
      'orcamento'    => new sfWidgetFormInputText(),
      'titulo'       => new sfWidgetFormInputText(),
      'descricao'    => new sfWidgetFormTextarea(),
      'url_campanha' => new sfWidgetFormTextarea(),
      'is_active'    => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'   => new sfValidatorInteger(array('required' => false)),
      'orcamento'    => new sfValidatorNumber(array('required' => false)),
      'titulo'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'descricao'    => new sfValidatorString(array('required' => false)),
      'url_campanha' => new sfValidatorString(array('required' => false)),
      'is_active'    => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
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
