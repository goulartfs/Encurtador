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

                $this->redirect('profile/links');
            }
        }

        $this->setLayout('layout');
    }

    public function executeResolve(sfWebRequest $request) {
        $this->forward404If(!$request->getParameter('url_id'));
        $url = Doctrine::getTable('Url')->findOneByShortUrl($request->getParameter('url_id'));
        $this->forward404If(!$url);

        $ip = $_SERVER['REMOTE_ADDR'];
        $locale = @file("http://api.hostip.info/country.php?ip=" . $ip);
        print_r($locale);
        die('');

        $this->url = $url;
    }

}
