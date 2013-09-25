<?php

/**
 * sobrenos actions.
 *
 * @package    Encurtador
 * @subpackage sobrenos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sobrenosActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Sobre nós');
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

}
