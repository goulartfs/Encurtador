<?php

/**
 * UrlControle filter form base class.
 *
 * @package    Encurtador
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUrlControleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'url_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Url'), 'add_empty' => true)),
      'resgate_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Resgate'), 'add_empty' => true)),
      'ipuser'                  => new sfWidgetFormFilterInput(),
      'is_rescued'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_processed'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'data_processado'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'is_referal_rescued'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'data_referal_processado' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'url_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Url'), 'column' => 'id')),
      'resgate_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Resgate'), 'column' => 'id')),
      'ipuser'                  => new sfValidatorPass(array('required' => false)),
      'is_rescued'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_processed'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'data_processado'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'is_referal_rescued'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'data_referal_processado' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('url_controle_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UrlControle';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'url_id'                  => 'ForeignKey',
      'resgate_id'              => 'ForeignKey',
      'ipuser'                  => 'Text',
      'is_rescued'              => 'Boolean',
      'is_processed'            => 'Boolean',
      'data_processado'         => 'Date',
      'is_referal_rescued'      => 'Boolean',
      'data_referal_processado' => 'Date',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
