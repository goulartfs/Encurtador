<?php

/**
 * Campanha filter form base class.
 *
 * @package    Encurtador
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCampanhaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                 => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'titulo'                  => new sfWidgetFormFilterInput(),
      'url_campanha'            => new sfWidgetFormFilterInput(),
      'orcamento_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Orcamento'), 'add_empty' => true)),
      'maximo_orcamento_diario' => new sfWidgetFormFilterInput(),
      'auth_key'                => new sfWidgetFormFilterInput(),
      'payment_method'          => new sfWidgetFormFilterInput(),
      'paypal_id'               => new sfWidgetFormFilterInput(),
      'is_payment_processed'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'status_transacao_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StatusTransacao'), 'add_empty' => true)),
      'is_active'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_finished'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'end_date'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'                 => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'titulo'                  => new sfValidatorPass(array('required' => false)),
      'url_campanha'            => new sfValidatorPass(array('required' => false)),
      'orcamento_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Orcamento'), 'column' => 'id')),
      'maximo_orcamento_diario' => new sfValidatorPass(array('required' => false)),
      'auth_key'                => new sfValidatorPass(array('required' => false)),
      'payment_method'          => new sfValidatorPass(array('required' => false)),
      'paypal_id'               => new sfValidatorPass(array('required' => false)),
      'is_payment_processed'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'status_transacao_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('StatusTransacao'), 'column' => 'id')),
      'is_active'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_finished'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'end_date'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('campanha_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Campanha';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'user_id'                 => 'ForeignKey',
      'titulo'                  => 'Text',
      'url_campanha'            => 'Text',
      'orcamento_id'            => 'ForeignKey',
      'maximo_orcamento_diario' => 'Text',
      'auth_key'                => 'Text',
      'payment_method'          => 'Text',
      'paypal_id'               => 'Text',
      'is_payment_processed'    => 'Boolean',
      'status_transacao_id'     => 'ForeignKey',
      'is_active'               => 'Boolean',
      'is_finished'             => 'Boolean',
      'end_date'                => 'Date',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
