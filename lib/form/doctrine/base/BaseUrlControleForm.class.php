<?php

/**
 * UrlControle form base class.
 *
 * @method UrlControle getObject() Returns the current form's model object
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUrlControleForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'url_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Url'), 'add_empty' => true)),
      'resgate_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Resgate'), 'add_empty' => true)),
      'ipuser'                  => new sfWidgetFormInputText(),
      'is_rescued'              => new sfWidgetFormInputCheckbox(),
      'is_processed'            => new sfWidgetFormInputCheckbox(),
      'data_processado'         => new sfWidgetFormInputText(),
      'is_referal_rescued'      => new sfWidgetFormInputCheckbox(),
      'data_referal_processado' => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'url_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Url'), 'required' => false)),
      'resgate_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Resgate'), 'required' => false)),
      'ipuser'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_rescued'              => new sfValidatorBoolean(array('required' => false)),
      'is_processed'            => new sfValidatorBoolean(array('required' => false)),
      'data_processado'         => new sfValidatorPass(array('required' => false)),
      'is_referal_rescued'      => new sfValidatorBoolean(array('required' => false)),
      'data_referal_processado' => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('url_controle[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UrlControle';
  }

}
