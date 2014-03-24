<h2>Relate sua experiência!</h2>
<p>Aproveite e deixe uma mensagem relatando sua experiência e nos ajude a melhorar cada vez mais nossos
    serviços.</p>
<form action="<?php print url_for('@relato') ?>" enctype="multipart/form-data" method="post">
    <table>
        <?php print $form ?>
        <tr>
            <td></td>
            <td>
                <button class="btn" type="submit">Enviar</button>
            </td>
        </tr>
    </table>
</form>