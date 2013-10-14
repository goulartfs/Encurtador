<?php

require_once dirname(__FILE__) . '/../lib/campanhaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/campanhaGeneratorHelper.class.php';

/**
 * campanha actions.
 *
 * @package    Encurtador
 * @subpackage campanha
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class campanhaActions extends autoCampanhaActions {

    public function executeLiberar(sfWebRequest $request) {
        $campanha = Doctrine::getTable('Campanha')->findOneById($request->getParameter('id'));
        $campanha->setStatusTransacaoId(6);
        $campanha->save();
        
        $this->getUser()->setFlash('notice', 'Campanha liberada com sucesso!');
        $this->redirect('campanha/index');
    }

}
