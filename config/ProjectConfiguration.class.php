<?php

require_once dirname(__FILE__) . '/../lib/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    public function setup() {

        date_default_timezone_set('America/Sao_Paulo');
        define("URL_BASE", "http://" . $_SERVER['HTTP_HOST']);

        sfConfig::set('bancos', array(
            'Bradesco' => 'Bradesco',
            'HSBC' => 'HSBC',
            'Itaú' => 'Itaú',
            'Santander' => 'Santander',
            'Caixa Econômica' => 'Caixa Econômica',
            'Banco do Brasil' => 'Banco do Brasil'
        ));

        $this->enablePlugins('sfDoctrinePlugin');
        $this->enablePlugins('sfDoctrineGuardPlugin');
    }

}
