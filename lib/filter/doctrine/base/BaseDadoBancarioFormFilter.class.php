<?php

/**
 * DadoBancario filter form base class.
 *
 * @package    Encurtador
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDadoBancarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'banco'        => new sfWidgetFormFilterInput(),
      'agencia'      => new sfWidgetFormFilterInput(),
      'tipo_conta'   => new sfWidgetFormFilterInput(),
      'operacao'     => new sfWidgetFormFilterInput(),
      'conta_numero' => new sfWidgetFormFilterInput(),
      'favorecido'   => new sfWidgetFormFilterInput(),
      'cpf'          => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'banco'        => new sfValidatorPass(array('required' => false)),
      'agencia'      => new sfValidatorPass(array('required' => false)),
      'tipo_conta'   => new sfValidatorPass(array('required' => false)),
      'operacao'     => new sfValidatorPass(array('required' => false)),
      'conta_numero' => new sfValidatorPass(array('required' => false)),
      'favorecido'   => new sfValidatorPass(array('required' => false)),
      'cpf'          => new sfValidatorPass(array('required' => false)),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('dado_bancario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DadoBancario';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'user_id'      => 'ForeignKey',
      'banco'        => 'Text',
      'agencia'      => 'Text',
      'tipo_conta'   => 'Text',
      'operacao'     => 'Text',
      'conta_numero' => 'Text',
      'favorecido'   => 'Text',
      'cpf'          => 'Text',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
