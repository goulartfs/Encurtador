<?php

class Encurtador {

    private $url;
    private $unique_id;

    public function __construct($url) {
        $this->url = $url;
        $this->unique_id = self::generateUniqueId();
    }

    public function getUrl() {
        return $this->url;
    }

    public function getUniqueId() {
        return $this->unique_id;
    }

    /**
     * Retorna um id único de tamanho igual ao $length
     * @param int $length
     * @return string
     */
    public static function generateUniqueId($length = 6) {
        return substr(md5(uniqid("")), 0, $length);
    }

    public function doShrink() {

        $url = new Url();
        $url->setOriginalUrl(trim($this->getUrl()));
        $url->setShortUrl(self::getUniqueId());

        if (sfContext::getInstance()->getUser()->isAuthenticated()) {
            $url->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
        }

        $url->save();

        return $url;
    }

}

?>
