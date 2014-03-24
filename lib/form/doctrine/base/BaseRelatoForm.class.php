<?php

/**
 * Relato form base class.
 *
 * @method Relato getObject() Returns the current form's model object
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRelatoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nome'        => new sfWidgetFormInputText(),
      'site'        => new sfWidgetFormInputText(),
      'imagem'      => new sfWidgetFormInputText(),
      'texto'       => new sfWidgetFormTextarea(),
      'is_approved' => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nome'        => new sfValidatorPass(array('required' => false)),
      'site'        => new sfValidatorPass(array('required' => false)),
      'imagem'      => new sfValidatorPass(array('required' => false)),
      'texto'       => new sfValidatorString(array('required' => false)),
      'is_approved' => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('relato[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Relato';
  }

}
