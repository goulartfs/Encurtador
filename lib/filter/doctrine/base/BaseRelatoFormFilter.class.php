<?php

/**
 * Relato filter form base class.
 *
 * @package    Encurtador
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRelatoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nome'        => new sfWidgetFormFilterInput(),
      'site'        => new sfWidgetFormFilterInput(),
      'imagem'      => new sfWidgetFormFilterInput(),
      'texto'       => new sfWidgetFormFilterInput(),
      'is_approved' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nome'        => new sfValidatorPass(array('required' => false)),
      'site'        => new sfValidatorPass(array('required' => false)),
      'imagem'      => new sfValidatorPass(array('required' => false)),
      'texto'       => new sfValidatorPass(array('required' => false)),
      'is_approved' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('relato_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Relato';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'nome'        => 'Text',
      'site'        => 'Text',
      'imagem'      => 'Text',
      'texto'       => 'Text',
      'is_approved' => 'Boolean',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
