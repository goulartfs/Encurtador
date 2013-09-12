<?php

class HomeForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            'url' => new sfWidgetFormInputText(array(), array('class' => 'input-xxlarge', 'placeholder' => 'http://')),
        ));

        $this->setValidators(array(
            'url' => new sfValidatorUrl(array(
                'required' => true
                    ), array(
                'required' => 'Campo não pode estar vazio.',
                'invalid' => 'Url inválida, verifique se há "http://" no início.'
                    )),
        ));

        $this->widgetSchema->setNameFormat('home[%s]');
    }

}