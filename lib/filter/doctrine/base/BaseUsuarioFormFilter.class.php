<?php

/**
 * Usuario filter form base class.
 *
 * @package    Encurtador
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'tipo_usuario_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoUsuario'), 'add_empty' => true)),
      'referal_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Referal'), 'add_empty' => true)),
      'endereco'        => new sfWidgetFormFilterInput(),
      'estado'          => new sfWidgetFormFilterInput(),
      'cidade'          => new sfWidgetFormFilterInput(),
      'cep'             => new sfWidgetFormFilterInput(),
      'telefone'        => new sfWidgetFormFilterInput(),
      'referal_code'    => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'tipo_usuario_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoUsuario'), 'column' => 'id')),
      'referal_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Referal'), 'column' => 'id')),
      'endereco'        => new sfValidatorPass(array('required' => false)),
      'estado'          => new sfValidatorPass(array('required' => false)),
      'cidade'          => new sfValidatorPass(array('required' => false)),
      'cep'             => new sfValidatorPass(array('required' => false)),
      'telefone'        => new sfValidatorPass(array('required' => false)),
      'referal_code'    => new sfValidatorPass(array('required' => false)),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'user_id'         => 'ForeignKey',
      'tipo_usuario_id' => 'ForeignKey',
      'referal_id'      => 'ForeignKey',
      'endereco'        => 'Text',
      'estado'          => 'Text',
      'cidade'          => 'Text',
      'cep'             => 'Text',
      'telefone'        => 'Text',
      'referal_code'    => 'Text',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
