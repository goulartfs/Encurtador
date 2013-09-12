<?php

/**
 * Classe com funções de apoio
 *
 * @author Filipe
 */
class Util {
    /**
     * Retorna um id único de tamanho igual ao $length
     * @param int $length
     * @return string
     */
    static function generateUniqueId($length = 6){
        return substr(md5(time()), 0, $length);
    }
}

?>
