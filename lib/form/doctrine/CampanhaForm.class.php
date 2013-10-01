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
        $this->widgetSchema['usuario_id'] = new sfWidgetFormInputHidden();
        $this->setDefault('usuario_id', sfContext::getInstance()->getUser()->getGuardUser()->getId());
        
        unset($this['created_at'], $this['updated_at']);
    }

}
