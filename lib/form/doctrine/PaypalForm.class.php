<?php

/**
 * Paypal form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PaypalForm extends BasePaypalForm
{
  public function configure()
  {
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      unset($this['created_at'], $this['updated_at']);
  }
}
