<?php

/**
 * campanha actions.
 *
 * @package    Encurtador
 * @subpackage campanha
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class campanhaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Campanhas');
        $this->setLayout('profile');
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeList(sfWebRequest $request) {
        $this->getUser()->setFlash('title-page', 'Campanhas');

        $ads = Doctrine_Query::create()
                ->from('Campanha c')
                ->where('c.user_id = ?', $this->getUser()->getGuardUser()->getId())
                ->orderBy('c.created_at desc');

        $this->pager = new sfDoctrinePager('Campanha');
        $this->pager->setQuery($ads);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeNewad(sfWebRequest $request) {
        $this->form = new CampanhaForm();
        if ($request->getMethod() == 'POST') {
            $this->form->bind($request->getParameter('campanha'));

            if ($this->form->isValid()) {
                if ($this->form->getValue('payment_method') == 'paypal') {
                    $ad = $this->form->save();

                    $ad->setAuthKey(md5(uniqid()));
                    $ad->setStatusTransacaoId(1);
                    $ad->save();

                    $data = array(
                        'custom' => $ad->getAuthKey(),
                        'amount' => $ad->getOrcamento()->getValor(),
                        'item_name' => $ad->getOrcamento()->getDescricao(),
                        'ref' => 'campanha',
                    );

                    $this->getUser()->setAttribute('payment_data', $data);
                    $this->redirect('payment/paypal');
                }

                if ($this->form->getValue('payment_method') == 'carteira') {
                    $values = $this->form->getValues();

                    $conta = $this->getUser()->getGuardUser()->getConta();

                    $operacao = new ContaOperacao();
                    $operacao->setContaId($conta->getId());
                    $operacao->setTipoOperacaoId(2);
                    $operacao->setValor(Doctrine::getTable('Orcamento')->findOneById($values['orcamento_id'])->getValor());

                    try {
                        $conta->removeSaldo($conta, $operacao);
                        $conta->save();
                        $operacao->save();
                        
                        $ad = $this->form->save();
                        $ad->setStatusTransacaoId(5);
                        $ad->setIsPaymentProcessed(1);
                        $ad->save();
                        
                        $this->getUser()->setFlash('notice', 'Campanha criada com sucesso.');
                        $this->redirect('@campanha');
                    } catch (sfException $e) {
                        $this->getUser()->setFlash('error', $e->getMessage());
                    }
                }
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
                
                $campanha->setTitulo($this->form->getValue('titulo'));
                $campanha->setUrlCampanha($this->form->getValue('url_campanha'));
                $campanha->setMaximoOrcamentoDiario($this->form->getValue('maximo_orcamento_diario'));
                $campanha->save();
                
                $this->getUser()->setFlash('notice', 'Campanha atualizada com sucesso.');

                $this->redirect('@campanha_edit?id=' . $campanha->getId());
            }
        }
    }
    
    public function executeStatus(sfWebRequest $request){
        $campanha = Doctrine::getTable('Campanha')->findOneById($request->getParameter('id'));
        $campanha->setIsActive((boolean) !$campanha->getIsActive());
        $campanha->save();
        
        $this->redirect('@campanha');
    }

}
