<?php

class MeioResgateForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            'meio_resgate' => new sfWidgetFormDoctrineChoice(array('model' => 'TipoResgate', 'add_empty' => false)),
        ));

        $this->setValidators(array(
            'meio_resgate' => new sfValidatorDoctrineChoice(array('model' => 'TipoResgate', 'required' => true)),
        ));

        $this->widgetSchema->setNameFormat('meio_resgate[%s]');
    }

}