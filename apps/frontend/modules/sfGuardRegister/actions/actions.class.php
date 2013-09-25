<?php

/**
 * sfGuardRegister actions.
 *
 * @package    Encurtador
 * @subpackage sfGuardRegister
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardRegisterActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Crie sua conta');
    }
    
    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            $this->getUser()->setFlash('notice', 'Você já está cadastrado e logado!');
            $this->redirect('@homepage');
        }

        $this->form = new sfGuardRegisterForm();

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $user = $this->form->save();
                $this->getUser()->signIn($user);

                $this->redirect('login/bem-vindo');
            } else{
                $this->getUser()->setFlash('error', 'Ocorreram erros. Por favor verifique o formulário.');
            }
        }
    }

}
