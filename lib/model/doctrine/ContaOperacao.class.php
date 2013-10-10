<?php

/**
 * ContaOperacao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ContaOperacao extends BaseContaOperacao {

    public function processar() {
        $conta = $this->getConta();

        switch ($this->getTipoOperacaoId()) {
            case 1:
                $conta->addSaldo($conta, $this);
                break;
            case 2:
                $conta->removeSaldo($conta, $this);
                break;
            case 3:
                $conta->addSaldo($conta, $this);
                break;
            case 4:
                $conta->addSaldo($conta, $this);
                break;
            default:
                throw new sfException('Tipo de operação inválida');
                break;
        }

        $conta->save();
    }

}