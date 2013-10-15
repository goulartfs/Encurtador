<?php

/**
 * main actions.
 *
 * @package    Encurtador
 * @subpackage main
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if ($this->getUser()->isAuthenticated()) {
            if (!$this->getUser()->hasAttribute('profile_preference')) {
                if ($this->getUser()->getGuardUser()->getUsuario()->getTipoUsuario()->getId() == 1)
                    $this->redirect('@link');
                if ($this->getUser()->getGuardUser()->getUsuario()->getTipoUsuario()->getId() == 2)
                    $this->redirect('@campanha');
            } else {
                if ($this->getUser()->getAttribute('profile_preference') == 'publisher')
                    $this->redirect('@link');
                if ($this->getUser()->getAttribute('profile_preference') == 'advertiser')
                    $this->redirect('@campanha');
            }
        }

        $this->form = new EncurtadorForm();
        $this->urls = null;
        
        $total = Doctrine_Query::create()
                ->from("UrlControle u")
                ->groupBy("u.url_id, date_format( created_at, '%d/%m/%Y' ) , u.ipuser")
                ->execute();

        $this->cliques = $total->count();

        if ($request->getMethod() == 'POST') {

            $this->form->bind($request->getParameter('encurtador'));
            if ($this->form->isValid()) {

                $this->url = $this->form->process();

                if ($this->getUser()->isAuthenticated()) {
                    $this->redirect('profile/links');
                }
            }
        }

        $this->setLayout('layout');
    }

    public function executeResolve(sfWebRequest $request) {
        $this->setLayout('link');

        $this->forward404If(!$request->getParameter('url_id'));
        $url = Doctrine::getTable('Url')->findOneByShortUrl($request->getParameter('url_id'));
        $this->forward404If(!$url);

        $this->ad = Doctrine::getTable('Campanha')->createQuery('c')
                        ->where('c.is_active = 1')
                        ->addWhere('c.is_payment_processed = 1')
                        ->addWhere('c.is_finished <> 1')
                        ->orderBy('RAND()')
                        ->execute()->getFirst();

        $url_controle = new UrlControle();
        $url_controle->setIpuser($_SERVER['REMOTE_ADDR']);
        $url_controle->setUrlId($url->getId());
        $url_controle->save();

        if ($this->ad) {
            $ad_controle = new CampanhaControle();
            $ad_controle->setIpViewer($_SERVER['REMOTE_ADDR']);
            $ad_controle->setCampanhaId($this->ad->getId());
            $ad_controle->save();
        }

        $this->url = $url;
    }

    public function executeLogout(sfWebRequest $request) {
        $this->getUser()->signOut();
        $this->getUser()->setFlash('notice', 'Obrigado');
        $this->redirect('@sf_guard_signin');
    }

}
