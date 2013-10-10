<?php

/**
 * profile actions.
 *
 * @package    Encurtador
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Perfil');
        $this->setLayout('profile');
    }

    public function executeIndex(sfWebRequest $request) {
        $this->forward('profile', 'account');
    }

    public function executeAccount(sfWebRequest $request) {

        $usuario = Doctrine::getTable('Usuario')->findOneByUserId($this->getUser()->getGuardUser()->getId());
        $this->form = new UsuarioForm($usuario);

        if ($request->getMethod() == 'POST') {
            $param = $request->getParameter('usuario');
            $param['subform']['sfGuardUser']['is_active'] = 1;
            $this->form->bind($param);
            if ($this->form->isValid()) {
                $this->form->save();

                $this->getUser()->setFlash('notice', 'Cadastro atualizado com sucesso.');
                $this->redirect('@profile');
            } else {
                $this->getUser()->setFlash('error', 'Verifique as informações e tente novamente.');
            }
        }
    }
    
    public function executeChangeProfile(sfWebRequest $request) {
        $this->getUser()->setAttribute('profile', $request->getParameter('profile'));
        $this->redirect('@homepage');
    }
}
