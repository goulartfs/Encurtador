<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of components
 *
 * @author Filipe
 */
class mainComponents extends sfComponents {
    
    public function executeForm(sfWebRequest $request){
        $this->form = new EncurtadorForm();
    }

    public function executeHomeRegister(sfWebRequest $request){
        $this->form = new sfGuardRegisterForm();
    }

    public function executeHomeLogin(sfWebRequest $request){
        $this->form = new sfGuardFormSignin();
    }
}

?>
