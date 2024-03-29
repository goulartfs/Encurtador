<?php

/**
 * StatusTransacao
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class StatusTransacao extends BaseStatusTransacao {

    public function __toString() {
        parent::__toString();
        return $this->getStatus();
    }
    public function getLabel(){
        switch ($this->getId()){
            case 3:
                return "label-important";
                break;
            case 4:
                return "label-warning";
                break;
            case 5:
                return "label-success";
                break;
            default:
                return null;
                break;
        }
    }

}