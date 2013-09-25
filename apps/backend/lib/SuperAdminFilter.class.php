<?php

// $site/apps/frontend/lib/MyPreFilter.class.php
class SuperAdminFilter extends sfFilter {

    public function execute($filterChain) {

        if ($this->getContext()->getModuleName() != 'sfGuardAuth') {
            if ($this->getContext()->getUser()->isAuthenticated()) {
                if (!$this->getContext()->getUser()->getGuardUser()->getIsSuperAdmin()) {
                    $this->getContext()->getUser()->setFlash('error', 'Você não possui permissão para acessar esta área.');
                    return $this->getContext()->getController()->forward('sfGuardAuth', 'signout');
                }
            }
        }

        $filterChain->execute($filterChain);
    }

}