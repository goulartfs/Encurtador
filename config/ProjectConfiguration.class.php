<?php

require_once dirname(__FILE__) . '/../lib/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration {

    public function setup() {
        define("URL_BASE", "http://" . $_SERVER['HTTP_HOST']);
        $this->enablePlugins('sfDoctrinePlugin');
      $this->enablePlugins('sfDoctrineGuardPlugin');
  }

}
