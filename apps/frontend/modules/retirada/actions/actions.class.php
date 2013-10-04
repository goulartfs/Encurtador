<?php

/**
 * retirada actions.
 *
 * @package    Encurtador
 * @subpackage retirada
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class retiradaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->setLayout('profile');
        
        $this->ganhos = Url::getGanhosDoUsuario($this->getUser()->getGuardUser());
    }

}
