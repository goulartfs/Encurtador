<?php

/**
 * Campanha form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CampanhaForm extends BaseCampanhaForm {

    static $payments = array(
        'paypal' => 'Paypal',
        'carteira' => 'Carteira CliqueBR'
    );

    public function configure() {
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['url_campanha'] = new sfWidgetFormInputText();
        $this->widgetSchema['orcamento_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Orcamento'), 'add_empty' => false));
        $this->widgetSchema['payment_method'] = new sfWidgetFormChoice(array('choices'=>  self::$payments));

        $this->setDefault('user_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());
        
        $this->widgetSchema->setLabel('titulo', 'Nome Website');
        $this->widgetSchema->setLabel('url_campanha', 'URL do site');
        $this->widgetSchema->setLabel('orcamento_id', 'Orçamento');
        $this->widgetSchema->setLabel('maximo_orcamento_diario', 'Max. Orçamento diário');
        $this->widgetSchema->setLabel('payment_method', 'Escolha o seu método de pagamento');
        
        $this->widgetSchema->setHelp('titulo', '(Apenas para uso interno)');
        $this->widgetSchema->setHelp('url_campanha', '(Devem estar em conformidade com as nossas regras)');
        $this->widgetSchema->setHelp('maximo_orcamento_diario', '(Digite 0 para orçamento ilimitado)');
        $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('%help%');

        $this->validatorSchema['url_campanha'] = new sfValidatorUrl(array(
            'required' => true
                ), array(
            'required' => 'Campo não pode estar vazio.',
            'invalid' => 'Url inválida, verifique se há "http://" no início.'
        ));
        
        $this->validatorSchema['payment_method'] = new sfValidatorChoice(array('choices'=>  array_keys(self::$payments)));

        unset($this['auth_key'], $this['is_payment_processed'], $this['paypal_id'], $this['status_transacao_id'], $this['is_active'], $this['is_finished'], $this['end_date'],$this['created_at'], $this['updated_at']);
    }

}
