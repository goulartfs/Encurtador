<?php

class EncurtadorForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            'url' => new sfWidgetFormInputText(array(), array('class' => 'input-xxlarge span9', 'placeholder' => 'Ex: http://www.exemplo.com')),
        ));

        $this->setValidators(array(
            'url' => new sfValidatorUrl(array(
                'required' => true
                    ), array(
                'required' => 'Campo não pode estar vazio.',
                'invalid' => 'Url inválida, verifique se há "http://" no início.'
                    )),
        ));

        $this->widgetSchema->setNameFormat('encurtador[%s]');
    }

    public function process() {

        $url_id = Util::generateUniqueId();

        $url = new Url();
        $url->setOriginalUrl($this->getValue('url'));
        $url->setShortUrl($url_id);
        if (sfContext::getInstance()->getUser()->isAuthenticated()) {
            $url->setUsuarioId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
        }
        $url->save();
        
        return $url;
    }

}