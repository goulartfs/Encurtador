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

    public function configure() {
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
        $this->setDefault('user_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());

        $this->widgetSchema['url_campanha'] = new sfWidgetFormInputText();

        $this->validatorSchema['url_campanha'] = new sfValidatorUrl(array(
            'required' => true
                ), array(
            'required' => 'Campo não pode estar vazio.',
            'invalid' => 'Url inválida, verifique se há "http://" no início.'
        ));

        unset($this['created_at'], $this['updated_at']);
    }

}
