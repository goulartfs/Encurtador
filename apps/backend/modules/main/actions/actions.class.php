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
        $total = Doctrine::getTable('UrlControle')->createQuery('u')
            ->select('count(*) as total')
            ->where("date_format(u.created_at, '%d/%m/%Y') = date_format(now(), '%d/%m/%Y')")
            ->groupBy("date_format( created_at, '%d/%m/%Y')")
            ->execute()->getFirst();

        if ($total) {
            $total = $total->toArray();
        }

        $this->cliques = ($total['total']) ? $total['total'] : 0;

        $total = Doctrine::getTable('UrlControle')->createQuery('u')
            ->select('count(*) as total')
            ->execute()->getFirst();
        if ($total) {
            $total = $total->toArray();
        }

        $this->cliques_all = ($total['total']) ? $total['total'] : 0;

        $total = Doctrine::getTable('Url')->createQuery('u')
            ->select('count(*) as total')
            ->execute()->getFirst();
        if ($total) {
            $total = $total->toArray();
        }

        $this->links_all = ($total['total']) ? $total['total'] : 0;
    }

    public function executeLogin(sfWebRequest $request) {
        $this->setLayout('login');

        $this->form = new sfGuardFormSignin();

        $user = $this->getUser();
        if ($user->isAuthenticated()) {
            return $this->redirect('@homepage');
        }

        if ($request->isMethod('post')) {
            $this->form->bind($request->getParameter('signin'));
            if ($this->form->isValid()) {
                $values = $this->form->getValues();
                $this->getUser()->signin($values['user']);

                return $this->redirect('@homepage');
            } else {
                $user->setFlash('error', 'Login ou senha inválidos');
            }
        }
    }

}
