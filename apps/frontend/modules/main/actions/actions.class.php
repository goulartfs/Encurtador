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
        
        if($this->getUser()->isAuthenticated()){
            if($this->getUser()->getGuardUser()->getUsuario()->getTipoUsuario()->getId() == 1)
                $this->redirect('@link');
            if($this->getUser()->getGuardUser()->getUsuario()->getTipoUsuario()->getId() == 2)
                $this->redirect('@campanha');
        }

        $this->form = new EncurtadorForm();
        $encurtados = $this->getRequest()->getCookie('encurtados');

        $url_ids = str_replace('-', ',', $encurtados);
        $this->urls = null;

        if (!empty($url_ids) && !$this->getUser()->isAuthenticated()) {
            $this->urls = Doctrine::getTable('Url')->createQuery('u')
                    ->where('u.id in (' . $url_ids . ')')
                    ->execute();
        }

        if ($request->getMethod() == 'POST') {

            $this->form->bind($request->getParameter('encurtador'));
            if ($this->form->isValid()) {

                $url = $this->form->process();

                if (!empty($encurtados)) {
                    $encurtados .= '-';
                }

                $encurtados .= $url->getId();

                if (!$this->getUser()->isAuthenticated()) {
                    $this->getResponse()->setCookie('encurtados', $encurtados);
                }

                $gen_url = "<a href='{$url->getFullUrl()}'>{$url->getShortUrl()}</a>";
                $this->getUser()->setFlash('notice', "<strong>Endereço encurtado com sucesso: </strong>" . $gen_url);

                if (!$this->getUser()->isAuthenticated()) {
                    $this->redirect('@homepage');
                } else{
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

}
