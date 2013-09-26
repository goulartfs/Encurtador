<?php

/**
 * sfGuardUser form.
 *
 * @package    Encurtador
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserCustomForm extends sfGuardUserForm
{
  public function configure()
  {
      $this->widgetSchema['username'] = new sfWidgetFormInputHidden();
      $this->setDefault('is_active', '1');
//      $this->widgetSchema['groups_list'] = new sfWidgetFormInputHidden();
//    $this->widgetSchema['permissions_list'] = new sfWidgetFormInputHidden();
  }
}
