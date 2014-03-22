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

        if ($request->getMethod() == 'POST') {

            $this->form->bind($request->getParameter('encurtador'));
            if ($this->form->isValid()) {

                $this->url = $this->form->process();
                $this->url->setIpuser($_SERVER['REMOTE_ADDR']);
                $this->url->save();

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

        $jsonObject = json_decode(file_get_contents('http://geo.4ready.com.br/json/' . $_SERVER['REMOTE_ADDR']));
        
        $this->control = false;
        $this->getUser()->setAttribute('ipuser', null);
        if ($jsonObject->country_code == 'BR') {
            if ($this->ad && $jsonObject->ip != $url->getIpuser()) {
        $this->getUser()->setAttribute('ipuser', $jsonObject->ip);
        $this->control = true;
            }
        }

        $this->url = $url;
    }

    public function executeResolveScript(sfWebRequest $request) {
        $this->setLayout('link');
        $this->forward404If(!$request->getParameter('u'));

        if (strpos($request->getParameter('h'), 'cliquesbr.com.br') !== false) {
            $this->redirect($request->getParameter('h'));
        }

        $this->ad = Doctrine::getTable('Campanha')->createQuery('c')
                        ->where('c.is_active = 1')
                        ->addWhere('c.is_payment_processed = 1')
                        ->addWhere('c.is_finished <> 1')
                        ->orderBy('RAND()')
                        ->execute()->getFirst();

        $usuario = Doctrine::getTable('Usuario')->findOneByReferalCode($request->getParameter('u'));
        if ($usuario) {
            $url = Doctrine::getTable('Url')->createQuery('u')
                            ->where('u.original_url = ?', $request->getParameter('h'))
                            ->addWhere('u.user_id = ?', $usuario->getSfGuardUser()->getId())
                            ->execute()->getFirst();
            if (!$url) {
                $url = new Url();
                $url->setOriginalUrl($request->getParameter('h'));
                $url->setShortUrl(Encurtador::generateUniqueId());
                $url->setUserId($usuario->getSfGuardUser()->getId());
                $url->save();
            } else {
                $this->redirect(sfContext::getInstance()->getController()->genUrl('@resolve_url?url_id=' . $url->getShortUrl()));
            }
        }

        $jsonObject = json_decode(file_get_contents('http://geo.4ready.com.br/json/' . $_SERVER['REMOTE_ADDR']));
        
        $this->control = false;
        $this->getUser()->setAttribute('ipuser', null);
        if ($jsonObject->country_code == 'BR') {
            if ($this->ad && $jsonObject->ip != $url->getIpuser()) {
        $this->getUser()->setAttribute('ipuser', $jsonObject->ip);
        $this->control = true;
            }
        }

        $this->url = $url;
        $this->setTemplate('resolve');
    }

    public function executeLogout(sfWebRequest $request) {
        $this->getUser()->signOut();
        $this->getUser()->setFlash('notice', 'Obrigado');
        $this->redirect('@sf_guard_signin');
    }

    public function executeConfirmResolve(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod('post'));

        $this->setLayout(false);

        $url_controle = new UrlControle();
        $url_controle->setIpuser($this->getUser()->getAttribute('ipuser', null));
        $url_controle->setUrlId($request->getParameter('idl'));
        $url_controle->save();

        $ad_controle = new CampanhaControle();
        $ad_controle->setIpViewer($this->getUser()->getAttribute('ipuser', null));
        $ad_controle->setCampanhaId($request->getParameter('idc'));
        $ad_controle->save();
    }
    
    public function executeError404(sfWebRequest $request) {
        $this->getUser()->setFlash('title-page', 'Error404!');
        $this->message = $this->getUser()->getFlash('404message', "Página não encontrada!");
    }
}
