<?php

/**
 * faleconosco actions.
 *
 * @package    Encurtador
 * @subpackage faleconosco
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faleconoscoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function preExecute() {
        parent::preExecute();

        $this->getUser()->setFlash('title-page', 'Fale Conosco');
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeSuporte(sfWebRequest $request) {
        $this->getUser()->setFlash('title-page', 'Suporte');

        $this->form = new SuporteForm();

        if ($request->getMethod() == "POST") {

            $this->form->bind($request->getParameter('suporte'));

            if ($this->form->isValid()) {
                $fields = $this->form->getValues();

                ob_start();
                foreach ($fields as $chave => $field) {
                    print ucfirst($chave) . ': ' . $field . "\n";
                }
                $body = ob_get_clean();

                $mensagem = $this->getMailer()->compose();
                $mensagem->setFrom($this->form->getValue('email'), $this->form->getValue('nome'));
                $mensagem->setSubject("Contato Site - " . $this->form->getValue('assunto'));
                $mensagem->addTo('goulartfs@gmail.com', 'Filipe');
                $mensagem->addTo('contato@cliquesbr.com.br', 'Thiago');
                $mensagem->setBody($body, 'text/plain');

                $this->getMailer()->send($mensagem);

                $this->getUser()->setFlash('notice', 'Email enviado com sucesso. Obrigado.');

                $this->redirect('fale-conosco/suporte');
            }
        }
    }

}
