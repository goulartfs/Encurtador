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
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Retirada');
        $this->setLayout('profile');
        $this->ganhos = Url::getGanhosDoUsuario($this->getUser()->getGuardUser());
    }

    public function executeIndex(sfWebRequest $request) {
        $this->form = new MeioResgateForm();
    }

    public function executeChooseRetirada(sfWebRequest $request) {
        $this->form = new MeioResgateForm();
        if ($request->getMethod() == 'POST') {
            $this->form->bind($request->getParameter('meio_resgate'));

            if ($this->form->isValid()) {
                $meio = $this->form->getValue('meio_resgate');
//                die($meio);
                $this->getUser()->setAttribute('meio_pagamento', $meio);
                switch ($meio) {
                    case 1:
                        $this->forward('retirada', 'deposito');
                        break;
                    case 2:
                        $this->forward('retirada', 'paypal');
                        break;
                    case 3:
                        $this->forward('retirada', 'carteira');
                        break;
                    default:
                        $this->getUser()->setAttribute('meio_pagamento', null);
                        throw new sfError404Exception('Meio de Resgate não encontrado.');
                        break;
                }
            } else {
                $this->redirect('@retirada');
            }
        }
    }

    public function executeDeposito(sfWebRequest $request) {

        if (!$this->getUser()->hasAttribute('meio_pagamento', null)) {
            $this->getUser()->setFlash('error', 'Meio de pagamento não escolhido.');
            $this->redirect('@retirada');
        }

        $dado_usuario = Doctrine::getTable('DadoBancario')->findOneByUserId($this->getUser()->getGuardUser()->getId());

        if (!$dado_usuario) {
            $dado_usuario = new DadoBancario();
            $dado_usuario->setUserId($this->getUser()->getGuardUser()->getId());
        }

        $this->form = new DadoBancarioForm($dado_usuario);

        if ($request->getMethod() == 'POST' && $request->getParameter('dado_bancario')) {

            if ($dado_usuario->isNew())
                $this->form = new DadoBancarioForm();

            $post = $request->getParameter('dado_bancario');
            $post['user_id'] = $this->getUser()->getGuardUser()->getId();

            $this->form->bind($post);

            if ($this->form->isValid()) {
                $this->form->save();
                $this->getUser()->setFlash('notice', 'Dados bancarários atualizados.');
                $this->redirect('@retirada_confirm');
            }
        }
    }

    public function executePaypal(sfWebRequest $request) {

        if (!$this->getUser()->hasAttribute('meio_pagamento', null)) {
            $this->getUser()->setFlash('error', 'Meio de pagamento não escolhido.');
            $this->redirect('@retirada');
        }

        $dado_usuario = Doctrine::getTable('DadoBancario')->findOneByUserId($this->getUser()->getGuardUser()->getId());
        $this->form = new PaypalForm($dado_usuario);
    }

    public function executeCarteira(sfWebRequest $request) {

        if (!$this->getUser()->hasAttribute('meio_pagamento', null)) {
            $this->getUser()->setFlash('error', 'Meio de pagamento não escolhido.');
            $this->redirect('@retirada');
        }
    }

    public function executeConfirm(sfWebRequest $request) {
        if (!$this->getUser()->hasAttribute('meio_pagamento', null)) {
            $this->getUser()->setFlash('error', 'Meio de pagamento não escolhido.');
            $this->redirect('@retirada');
        }

        $meio = $this->getUser()->getAttribute('meio_pagamento');

        $this->tipo_resgate = Doctrine::getTable('TipoResgate')->findOneById($meio);
        $this->dado_bancario = Doctrine::getTable('DadoBancario')->findOneByUserId($this->getUser()->getGuardUser()->getId());
        $this->paypal = Doctrine::getTable('Paypal')->findOneByUserId($this->getUser()->getGuardUser()->getId());

        switch ($meio) {
            case 1:
                $this->form = new DadoBancarioForm($this->dado_bancario);
                break;
            case 2:
                $this->form = new PaypalForm($this->paypal);
                break;
            case 3:
//                $this->forward('retirada', 'carteira');
                break;
        }

        $this->resgate = new Resgate();
        $this->resgate->setUserId($this->getUser()->getGuardUser()->getId());
        $this->resgate->setTipoResgateId($this->tipo_resgate->getId());
        $this->resgate->setStatusId(1);
        $this->resgate->setValor($this->ganhos);
        $this->resgate->setAuthkey(md5(uniqid("")));
        $this->resgate->setIsConfirmed(0);
        $this->resgate->save();

        $urls = Doctrine::getTable('Url')->findByUserId($this->getUser()->getGuardUser()->getId());
        if ($urls->count()) {
            foreach ($urls as $url) {
                if ($url->getUrlControle()->count()) {
                    foreach ($url->getUrlControle() as $urlControle) {
                        $urlControle->setResgateId($this->resgate->getId());
                        $urlControle->setIsRescued(1);
                        $urlControle->save();
                    }
                }
            }
        }

        $this->getUser()->setAttribute('meio_pagamento', null);
    }

    public function executeFinish(sfWebRequest $request) {
        $resgate = Doctrine::getTable('Resgate')->findOneByAuthkey($request->getParameter('authkey'));
        $this->forward404If(!$resgate);

        $resgate->setIsConfirmed(1);
        $resgate->save();
    }

}
