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
                
                $user->setIsActive(0);
                $user->save();
                
                $user->criarConta();
                $user->criarUsuario($this->form->getValue('tipo_usuario'));
                
                $validacao = new ValidaUsuario();
                $validacao->setUserId($user->getId());
                $validacao->setChave(md5(uniqid("")));
                $validacao->save();
                
                $email = $this->getMailer()->compose();
                $email->setFrom('contato@cliquesbr.com.br', 'CliquesBr');
                $email->setSubject('Confirmação de Cadastro');
                $email->addTo($user->getEmailAddress(), $user->getFirstName());
                
                $link = URL_BASE . $this->getController()->genUrl('@confirm_user?id=' . $validacao->getChave());
                
                ob_start();
                print "<h1>Obrigado por se cadastrar</h1>";
                print "<p>Confirme seu cadastro: <a href='{$link}'>{$link}</a>.</p>";
                print "<p>Atenciosamente,<br/><strong>Adplus</strong></p>";
                $body = ob_get_clean();
                
                $email->setBody($body, 'text/html');
                
                $this->getMailer()->send($email);

                $this->redirect('@pos_register');
            } else{
                $this->getUser()->setFlash('error', 'Ocorreram erros. Por favor verifique o formulário.');
            }
        }
    }
    
    public function executePosregister(sfWebRequest $request){
        
    }
    
    public function executeConfirm(sfWebRequest $request){
        $validacao = Doctrine::getTable('ValidaUsuario')->findOneByChave($request->getParameter('id'));
        $this->forward404If(!$validacao, 'Chave de validação não encontrada.');
        $this->forward404If($validacao->getIsConfirmed(), 'Seu cadastro já está validado.');
        
        $validacao->setIsConfirmed(1);
        $validacao->save();
        
        $usuario = $validacao->getSfGuardUser();
        $usuario->setIsActive(1);
        $usuario->save();
        
        $this->getUser()->signIn($usuario);
        
        $this->redirect('profile/links');
    }
    
    public function executeReferal(sfWebRequest $request){
        $usuario = Doctrine::getTable('Usuario')->findOneByReferalCode($request->getParameter('referal_code'));
        $this->forward404If(!$usuario, "Código de referência inválido.");
        $this->getUser()->setAttribute('referal_id', $usuario->getSfGuardUser()->getId());
        $this->redirect('@sf_guard_register');
    }

}
