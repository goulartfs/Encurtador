<?php

/**
 * termosecondicoes actions.
 *
 * @package    Encurtador
 * @subpackage termosecondicoes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class termosecondicoesActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Termos e Condições');
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

}
