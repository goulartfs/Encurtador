<?php

/**
 * CampanhaControle form base class.
 *
 * @method CampanhaControle getObject() Returns the current form's model object
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCampanhaControleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'campanha_id'     => new sfWidgetFormInputText(),
      'ip_viewer'       => new sfWidgetFormInputText(),
      'is_processed'    => new sfWidgetFormInputCheckbox(),
      'data_processado' => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'campanha_id'     => new sfValidatorInteger(array('required' => false)),
      'ip_viewer'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_processed'    => new sfValidatorBoolean(array('required' => false)),
      'data_processado' => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('campanha_controle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CampanhaControle';
  }

}
