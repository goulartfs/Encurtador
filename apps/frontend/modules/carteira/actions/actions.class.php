<?php

/**
 * carteira actions.
 *
 * @package    Encurtador
 * @subpackage carteira
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class carteiraActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Carteira');
        $this->setLayout('profile');
    }
    
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeList(sfWebRequest $request) {
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
                $this->redirect('@carteira');
            }
        }
    }

}
