<?php

class EncurtadorMassivoForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            'url' => new sfWidgetFormTextarea(array(), array('class' => 'input-xxlarge span9', 'placeholder' => 'http://www.exemplo1.com, http://www.exemplo2.com, http://www.exemplo3.com')),
        ));

        $this->setValidators(array(
            'url' => new sfValidatorString(array(
                'required' => true
                    ), array(
                'required' => 'Campo não pode estar vazio.',
                'invalid' => 'Url inválida, verifique se há "http://" no início.'
                    )),
        ));

        $this->getWidgetSchema()->setHelp('url', 'Separar links por vírgula (,)');
        $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('%help%');

        $this->widgetSchema->setNameFormat('encurtador[%s]');
    }

    public function process() {

        $urls = explode(',', $this->getValue('url'));

        foreach ($urls as $url) {
            if(!$url)
                continue;
            $encurtador = new Encurtador($url);
            $encurtador->doShrink();
        }
    }

}