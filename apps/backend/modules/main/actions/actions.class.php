<?php

/**
 * main actions.
 *
 * @package    Encurtador
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeLogin(sfWebRequest $request) {
        $this->setLayout('login');

        $this->form = new sfGuardFormSignin();

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('signin'));
            if ($this->form->isValid()) {
                $values = $this->form->getValues();
                $this->getUser()->signin($values['user']);

                return $this->redirect('@homepage');
            } else {
                $user->setFlash('error', 'Login ou senha inválidos');
            }
        }
    }

}
