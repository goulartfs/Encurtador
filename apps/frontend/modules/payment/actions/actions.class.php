<?php

/**
 * payment actions.
 *
 * @package    Encurtador
 * @subpackage payment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paymentActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->setLayout('profile');
    }

    public function executePaypal(sfWebRequest $request) {
        $this->forward404If(!$this->getUser()->getAttribute('payment_data'), "Informação de pagamento não existe.");
        $this->data = $this->getUser()->getAttribute('payment_data');

        if ($this->data['ref'] == 'campanha') {
            $campanha = Doctrine::getTable('Campanha')->findOneByAuthKey($this->data['custom']);
            $this->forward404If(!$campanha, 'Dados de campanha inexistente.');

            $campanha->setStatusTransacaoId(2);
            $campanha->save();
        }
        
        if ($this->data['ref'] == 'carteira') {
            $transacao = Doctrine::getTable('ContaTransacao')->findOneByAuthKey($this->data['custom']);
            $this->forward404If(!$transacao, "Transação inexistente.");
        }

        $this->getUser()->setAttribute('payment_data', NULL);
        $this->setLayout('profile');
    }

    public function executeSuccess(sfWebRequest $request) {
        $status = $request->getParameter('st');
        $auth_key = $request->getParameter('cm');
        $paypal_id = $request->getParameter('tx');

        if ($request->getParameter('ref') == 'campanha') {
            $campanha = Doctrine::getTable('Campanha')->findOneByAuthKey($auth_key);
            $this->forward404If(!$campanha, "Dados de campanha inexistente.");

            $campanha->setStatusTransacaoId(($status == 'Completed') ? 5 : 4);
            $campanha->setIsPaymentProcessed(($status == 'Completed') ? 1 : 0);
            $campanha->setPaypalId($paypal_id);
            $campanha->save();
        }

        if ($request->getParameter('ref') == 'carteira') {
            $transacao = Doctrine::getTable('ContaTransacao')->findOneByAuthKey($auth_key);
            $this->forward404If(!$transacao, "Transação inexistente.");

            if (!$transacao->getIsProcessed()) {
                $operacao = new ContaOperacao();
                $operacao->setTipoOperacaoId(1);
                $operacao->setValor($transacao->getValor());
                $operacao->setContaId($transacao->getContaId());
                $operacao->save();
                $operacao->processar();

                $transacao->setIsProcessed(1);
                $transacao->save();
            }
        }

        if ($status == 'Completed')
            $this->getUser()->setFlash('notice', 'Transação realizada com sucesso.');
        else
            $this->getUser()->setFlash('error', 'Ocorreram falhas com o pagamento. Nossa equipe entrará em contato.');

        $this->redirect('@' . $request->getParameter('ref'));
    }

}
