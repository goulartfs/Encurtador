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

        $this->getUser()->setFlash('title-page', 'Resgate');
        $this->setLayout('profile');
        if ($this->getContext()->getActionName() != 'info') {
            $this->ganho_link = Url::getGanhosDisponivelDoUsuario($this->getUser()->getGuardUser());
            $this->ganhos_referencia = $this->getUser()->getGuardUser()->getTodoGanhoReferenciaDisponivel();
            $this->ganhos = $this->ganho_link + $this->ganhos_referencia;
        }
    }

    public function executeIndex(sfWebRequest $request) {
        $this->form = new MeioResgateForm();

        $resgate = Doctrine_Query::create()
                ->from('Resgate r')
                ->where('r.user_id = ?', $this->getUser()->getGuardUser()->getId())
                ->orderBy('r.created_at desc');

        $this->pager = new sfDoctrinePager('Resgate');
        $this->pager->setQuery($resgate);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
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

        $dado_usuario = Doctrine::getTable('Paypal')->findOneByUserId($this->getUser()->getGuardUser()->getId());

        if (!$dado_usuario) {
            $dado_usuario = new Paypal();
            $dado_usuario->setUserId($this->getUser()->getGuardUser()->getId());
        }

        $this->form = new PaypalForm($dado_usuario);

        if ($request->getMethod() == 'POST' && $request->getParameter('paypal')) {

            if ($dado_usuario->isNew())
                $this->form = new PaypalForm();

            $post = $request->getParameter('paypal');
            $post['user_id'] = $this->getUser()->getGuardUser()->getId();

            $this->form->bind($post);

            if ($this->form->isValid()) {
                $this->form->save();
                $this->getUser()->setFlash('notice', 'Dados de paypal atualizados.');
                $this->redirect('@retirada_confirm');
            }
        }
    }

    public function executeCarteira(sfWebRequest $request) {

        if (!$this->getUser()->hasAttribute('meio_pagamento', null)) {
            $this->getUser()->setFlash('error', 'Meio de pagamento não escolhido.');
            $this->redirect('@retirada');
        }

        $this->redirect('@retirada_confirm');
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
                $url->atualizaControleNaoResgatado($this->resgate, $url);
            }
        }

        $referencias = $this->getUser()->getGuardUser()->getReferal();
        if ($referencias->count()) {
            foreach ($referencias as $referencia) {
                $urls = Doctrine::getTable('Url')->findByUserId($referencia->getSfGuardUser()->getId());
                if ($urls->count()) {
                    foreach ($urls as $url) {
                        $url->atualizaControleReferenciaNaoResgatado($this->resgate, $url);
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

        if ($resgate->getTipoResgateId() == 3) {
            $operacao = new ContaOperacao();
            $operacao->setTipoOperacaoId(4);
            $operacao->setContaId($resgate->getSfGuardUser()->getConta()->getId());
            $operacao->setValor($resgate->getValor());
            $operacao->save();
            $operacao->processar();

            $resgate->setStatusId(4);
            $resgate->save();
        }

        $this->form = new RelatoUserForm();
    }

    public function executeInfo(sfWebRequest $request) {
        $this->setLayout('interna');
    }

}
