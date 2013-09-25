<?php

/**
 * login actions.
 *
 * @package    Encurtador
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Login');
    }

    public function executeIndex(sfWebRequest $request) {

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
    
    public function executeBemvindo(sfWebRequest $request){
        $this->getUser()->setFlash('title-page', 'Bem vindo!');
        
        $user = $this->getUser();
        if (!$user->isAuthenticated()) {
            $user->setFlash('error', 'Por favor, efetue o login. Obrigado.');
            return $this->redirect('login/index');
        }
    }

}
