<?php

/**
 * ContaOperacao form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContaOperacaoForm extends BaseContaOperacaoForm {

    public static $valores = array(
        '5' => 'R$ 5,00',
        '10' => 'R$ 10,00',
        '20' => 'R$ 20,00',
        '50' => 'R$ 50,00'
    );

    public function configure() {
        $this->widgetSchema['conta_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['tipo_operacao_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['valor'] = new sfWidgetFormChoice(array('choices' => self::$valores));
        $this->validatorSchema['valor'] = new sfValidatorChoice(array('choices' => array_keys(self::$valores)), array(
            'invalid' => 'Opção inválida.'
        ));

        unset($this['created_at'], $this['updated_at']);
    }

}
