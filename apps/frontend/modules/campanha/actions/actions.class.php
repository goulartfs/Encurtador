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
                $ad = $this->form->save();
                
                $ad->setAuthKey(md5(uniqid()));
                $ad->save();
                
                $data = array(
                    'custom'=>$ad->getAuthKey(),
                    'amount'=>$ad->getOrcamento()->getValor(),
                    'item_name'=>$ad->getOrcamento()->getDescricao(),
                    'ref'=>'campanha',
                );
                
                $this->getUser()->setAttribute('payment_data', $data);
                $this->redirect('payment/paypal');
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

                $this->redirect('@campanha_edit?id=' . $ad->getId());
            }
        }
    }

}
