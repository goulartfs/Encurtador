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
        $this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array('model' => 'sfGuardUser', 'add_empty' => false));
        $this->widgetSchema['end_date'] = new sfWidgetFormInputText(array(), array('disabled'=>'disabled'));
        $this->widgetSchema['is_finished'] = new sfWidgetFormInputCheckbox(array(), array('disabled'=>'disabled'));
        unset($this['created_at'], $this['updated_at']);
    }

}
