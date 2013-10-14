<?php

/**
 * Url
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Url extends BaseUrl {

    public function getFullUrl() {
        return sfContext::getInstance()->getController()->genUrl('@resolve_url?url_id=' . $this->getShortUrl(), true);
    }

    public function getTotal() {
        $total = Doctrine_Query::create()
                ->from("UrlControle u")
                ->where('u.url_id = ?', $this->getId())
                ->groupBy("u.url_id, date_format( created_at, '%d/%m/%Y' ) , u.ipuser")
                ->execute();

        return $total->count();
    }

    public function getTotalDisponivel() {
        $total = Doctrine_Query::create()
                ->from("UrlControle u")
                ->where('u.url_id = ?', $this->getId())
                ->groupBy("u.url_id, date_format(created_at, '%d/%m/%Y' ) , ipuser")
                ->having("SUM(is_rescued) = 0");

        return $total->count();
    }

    public function getGanhos() {
        return $this->getTotal() * CustoClique::getCustoPorClique();
    }

    public function getGanhosDisponivel() {
        return $this->getTotalDisponivel() * CustoClique::getCustoPorClique();
    }

    public static function getGanhosDoUsuario(sfGuardUser $usuario) {

        $urls = Doctrine::getTable('Url')->findByUserId($usuario->getId());

        $ganhos = 0;
        foreach ($urls as $url) {
            $ganhos += $url->getGanhos();
        }

        return $ganhos;
    }

    public static function getGanhosDisponivelDoUsuario(sfGuardUser $usuario) {

        $urls = Doctrine::getTable('Url')->findByUserId($usuario->getId());

        $ganhos = 0;
        foreach ($urls as $url) {
            $ganhos += $url->getGanhosDisponivel();
        }

        return $ganhos;
    }

    public static function getTotalAcessoByUser(sfGuardUser $usuario) {
        $urls = Doctrine::getTable('Url')->findByUserId($usuario->getId());
        $views = 0;

        if ($urls->count()) {
            foreach ($urls as $url) {
                $views += $url->getTotal();
            }
        }

        return $views;
    }

    public function atualizaControleNaoResgatado(Resgate $resgate, Url $url) {
        Doctrine_Query::create()
                ->update('UrlControle')
                ->set('resgate_id', $resgate->getId())
                ->set('is_rescued', 1)
                ->where('url_id = ?', $url->getId())
                ->addWhere('is_rescued <> ?', 1)
                ->execute();
    }

}