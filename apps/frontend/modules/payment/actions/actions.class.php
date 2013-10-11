<?php

/**
 * payment actions.
 *
 * @package    Encurtador
 * @subpackage payment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->setLayout('profile');
    }

    public function executePaypal(sfWebRequest $request) {
        $this->forward404If(!$this->getUser()->getAttribute('payment_data'));
        
        $this->data = $this->getUser()->getAttribute('payment_data');
        
        $this->getUser()->setAttribute('payment_data', NULL);
        $this->setLayout('profile');
    }

}
