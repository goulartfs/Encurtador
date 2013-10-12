<?php

/**
 * DadoBancario form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DadoBancarioForm extends BaseDadoBancarioForm {

    static $tipo_conta = array(
        'Conta Corrente' => 'Conta Corrente',
        'Conta Poupança' => 'Conta Poupança'
    );

    public function configure() {
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['banco'] = new sfWidgetFormChoice(array('choices' => sfConfig::get('bancos')));
        $this->widgetSchema['tipo_conta'] = new sfWidgetFormChoice(array('choices' => self::$tipo_conta));

        $this->validatorSchema['banco'] = new sfValidatorChoice(array('choices' => array_keys(sfConfig::get('bancos')), 'required' => true));
        $this->validatorSchema['tipo_conta'] = new sfValidatorChoice(array('choices' => array_keys(self::$tipo_conta), 'required' => true));
        $this->validatorSchema['agencia'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['conta_numero'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['favorecido'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['cpf'] = new sfValidatorString(array('required' => true));

        $this->widgetSchema->setHelp('operacao', '(Caso selecione "Caixa Econômica" é necessário o preenchimento)');
        $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('%help%');

        unset($this['created_at'], $this['updated_at']);
    }

}
