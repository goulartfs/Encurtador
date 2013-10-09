<?php

/**
 * link actions.
 *
 * @package    Encurtador
 * @subpackage link
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class linkActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Links');
        $this->setLayout('profile');
    }
    
    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeList(sfWebRequest $request) {
        $this->getUser()->setFlash('title-page', 'Links');

        $this->form = new EncurtadorForm();

        $urls = Doctrine_Query::create()
                ->from('Url u')
                ->where('u.user_id = ?', $this->getUser()->getGuardUser()->getId())
                ->orderBy('u.created_at desc');

        $this->pager = new sfDoctrinePager('Url');
        $this->pager->setQuery($urls);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

        $this->ganhos = Url::getGanhosDoUsuario($this->getUser()->getGuardUser());
        $this->views = Url::getTotalAcessoByUser($this->getUser()->getGuardUser());

        if ($request->getMethod() == 'POST') {
            $this->form->bind($request->getParameter('encurtador'));

            if ($this->form->isValid()) {
                $url = $this->form->process();

                $gen_url = "<a href='{$url->getFullUrl()}'>{$url->getShortUrl()}</a>";

                $this->getUser()->setFlash('notice', "<strong>Endereço encurtado com sucesso: </strong>" . $gen_url);

                $this->redirect('link/list');
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
                $this->redirect('link/list');
            }
        }
    }

}
