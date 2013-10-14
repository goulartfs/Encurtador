<?php

if ($campanha->getStatusTransacaoId() == 5) {
    print link_to('Liberar', 'campanha/liberar?id=' . $campanha->getId());
} else{
    print '-';
}
?>
