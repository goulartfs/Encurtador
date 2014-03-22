<span>R$ <?php print $conta->getSaldo() ? $conta->getSaldo() : 0.00 ?></span>
<h3>Saldo da carteira</h3>
<table align="center" style="width:140px;">
    <tr>
        <td>
            <a class="btn btn-success btn-block" href="<?php print url_for('@carteira_new') ?>">Adicionar Créditos</a>
        </td>
    </tr>
</table>
