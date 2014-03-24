<?php
if ($relato->getImagem()) {
    ?>
    <a href="/uploads/<?php print $relato->getImagem() ?>" target="_blank">Visualizar Imagem</a>
<?php
}
?>