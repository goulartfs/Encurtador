<?php

/**
 * referencia actions.
 *
 * @package    Encurtador
 * @subpackage referencia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class referenciaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Referências');
        $this->setLayout('profile');
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

}
