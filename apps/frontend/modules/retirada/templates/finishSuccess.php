<div class="hero-unit">
    <h1>Obrigado, <span class="text-warning"><?php print $sf_user->getGuardUser()->getFirstName() ?></span></h1>

    <p>
        Sua solicitação resgate foi realizada com sucesso.
    </p>

    <p>
        Seus ganhos serão pagos em até 3 dias úteis, aguarde nosso e-mail confirmando o envio de seu capital. obrigado
        por utlizar nossos serviços.
    </p>
    <br/>
    <br/>
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
</div>