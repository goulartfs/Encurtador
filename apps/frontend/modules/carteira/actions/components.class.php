<?php

class CarteiraComponents extends sfComponents {
    
    public function executeSaldo(){
        $this->conta = $this->getUser()->getGuardUser()->getConta();
    }
}