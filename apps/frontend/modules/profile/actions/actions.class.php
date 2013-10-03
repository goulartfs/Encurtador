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
                $this->redirect('profile/account');
            } else {
                $this->getUser()->setFlash('error', 'Verifique as informações e tente novamente.');
            }
        }
    }

    public function executeLinks(sfWebRequest $request) {
        $this->getUser()->setFlash('title-page', 'Links');

        $this->form = new EncurtadorForm();

        $this->urls = Doctrine::getTable('Url')->createQuery('u')
                ->where('u.usuario_id = ?', $this->getUser()->getGuardUser()->getId())
                ->orderBy('u.created_at desc')
                ->execute();

        if ($request->getMethod() == 'POST') {
            $this->form->bind($request->getParameter('encurtador'));

            if ($this->form->isValid()) {
                $url = $this->form->process();

                $gen_url = "<a href='{$url->getFullUrl()}'>{$url->getShortUrl()}</a>";

                $this->getUser()->setFlash('notice', "<strong>Endereço encurtado com sucesso: </strong>" . $gen_url);

                $this->redirect('profile/links');
            }
        }
    }

    public function executeAds(sfWebRequest $request) {
        $this->getUser()->setFlash('title-page', 'Campanhas');

        $this->ads = Doctrine::getTable('Campanha')->createQuery('c')
                ->where('c.usuario_id = ?', $this->getUser()->getGuardUser()->getId())
                ->orderBy('c.created_at desc')
                ->execute();
    }

    public function executeNewad(sfWebRequest $request) {
        $this->form = new CampanhaForm();
        if ($request->getMethod() == 'POST') {
            $this->form->bind($request->getParameter('campanha'));

            if ($this->form->isValid()) {
                $ad = $this->form->save();
                $this->getUser()->setFlash('notice', 'Campanha cadastrada com sucesso.');

                $this->redirect('@edit_ad?id=' . $ad->getId());
            }
        }
    }

    public function executeEditad(sfWebRequest $request) {
        $this->forward404If(!$request->getParameter('id'), 'Parametro não encontrado');
        $campanha = Doctrine::getTable('Campanha')->findOneById($request->getParameter('id'));
        $this->forward404If(!$campanha, 'Campanha não encontrada');

        $this->form = new CampanhaForm($campanha);

        if ($request->getMethod() == 'POST') {
            $this->form->bind($request->getParameter('campanha'));

            if ($this->form->isValid()) {
                $ad = $this->form->save();
                $this->getUser()->setFlash('notice', 'Campanha atualizada com sucesso.');

                $this->redirect('@edit_ad?id=' . $ad->getId());
            }
        }
    }

    public function executeWallet(sfWebRequest $request) {
        $this->conta = $this->getUser()->getGuardUser()->getConta();
        $this->operacoes = $this->conta->getContaOperacao();
    }

    public function executeAddcredit(sfWebRequest $request) {

        $operacao = new ContaOperacao();
        $operacao->setTipoOperacaoId(1);
        $operacao->setContaId($this->getUser()->getGuardUser()->getConta()->getId());
        $this->form = new ContaOperacaoForm($operacao);

        if ($request->getMethod() == 'POST') {
//            print_r($request->getParameter('conta_operacao'));
            $this->form->bind($request->getParameter('conta_operacao'));

            if ($this->form->isValid()) {

                $operacao = $this->form->save();
                $operacao->processar();

                $this->getUser()->setFlash('notice', 'Transação realizada com sucesso');
                $this->redirect('profile/wallet');
            }
        }
    }

    public function executeMass(sfWebRequest $request) {
        $this->form = new EncurtadorMassivoForm();
        
        if ($request->getMethod() == 'POST') {

            $this->form->bind($request->getParameter('encurtador'));

            if ($this->form->isValid()) {

                $this->form->process();

                $this->getUser()->setFlash('notice', 'Links encurtador com sucesso.');
                $this->redirect('profile/links');
            }
        }
    }

}
