<?php

class SuporteForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            'nome' => new sfWidgetFormInputText(array(), array('class' => 'input-xxlarge', 'placeholder' => 'Seu nome')),
            'email' => new sfWidgetFormInputText(array(), array('class' => 'input-xxlarge', 'placeholder' => 'Seu email')),
            'assunto' => new sfWidgetFormInputText(array(), array('class' => 'input-xxlarge', 'placeholder' => 'Assunto da mensagem')),
            'mensagem' => new sfWidgetFormTextarea(array(), array('class' => 'input-xxlarge', 'placeholder' => 'Sua mensagem')),
        ));

        $this->setValidators(array(
            'nome' => new sfValidatorString(array('required' => true)),
            'email' => new sfValidatorString(array('required' => true)),
            'assunto' => new sfValidatorString(array('required' => true)),
            'mensagem' => new sfValidatorString(array('required' => true)),
        ));

        $this->widgetSchema->setNameFormat('suporte[%s]');
    }

}