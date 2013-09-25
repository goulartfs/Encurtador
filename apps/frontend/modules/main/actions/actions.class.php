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

        $this->form = new HomeForm();
        $encurtados = $this->getRequest()->getCookie('encurtados');
        
        $url_ids = str_replace('-', ',', $encurtados);
        
        $this->urls = Doctrine::getTable('Url')->createQuery('u')
                ->where('u.id in ('.$url_ids.')')
                ->execute();

        if ($request->getMethod() == 'POST') {

            $this->form->bind($request->getParameter('home'));
            if ($this->form->isValid()) {
                $url_id = Util::generateUniqueId();

                $url = new Url();
                $url->setOriginalUrl($this->form->getValue('url'));
                $url->setShortUrl($url_id);
                $url->save();

                if (!empty($encurtados)) {
                    $encurtados .= '-';
                }
                $encurtados .= $url->getId();

                $this->getResponse()->setCookie('encurtados', $encurtados);

                $this->getUser()->setFlash('notice', $url_id);

                $this->redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $this->setLayout('layout');
    }

    public function executeResolve(sfWebRequest $request) {
        $this->forward404If(!$request->getParameter('url_id'));
        $url = Doctrine::getTable('Url')->findOneByShortUrl($request->getParameter('url_id'));
        $this->forward404If(!$url);

        $this->url = $url;
    }

}
