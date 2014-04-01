<h3>Seus Referenciados</h3>
<p>
    O programa de referência do AdPllus é uma ótima maneira de ganhar ainda mais dinheiro com seus links curtos! divulgue para os amigos,colégas, conhecidos e receba 15% dos ganhos deles para toda a vida!
</p>
<p class="lead">
    Código de referência:
    <textarea id="copyarea" class="span12 alert-success">
        <?php print url_for('@register_referal?referal_code=' . $referal_code, true) ?>
    </textarea>
</p>
<section class="dados">
    <div class="container">
        <div class="row">
            <div class="span4">
                <!--                        <span>0</span>-->
                <!--                        <h3>Visualisações de Novembro</h3>-->
            </div>
            <div class="span3">
                <!--                        <span>R$ 0000000</span>-->
                <!--                        <h3>EARNINGNS November</h3>-->
            </div>
            <div class="span5">
                <span>R$ <?php print number_format($ganhos, 2, ',', '.') ?></span>

                <h3>Ganhos disponível para resgate</h3>
            </div>
        </div>
    </div>
</section>
<div class="row">
    <div class="span12 links">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Cliques</th>
                <th>Ganhos Disponível</th>
                <th>Ganhos Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($referencias as $referencia) { ?>
                <tr>
                    <td><?php print $referencia->getSfGuardUser(); ?></td>
                    <td><?php print number_format($referencia->getSfGuardUser()->getTotalAcesso(), 0, ',', '.'); ?></td>
                    <td><?php print "R$ " . number_format($referencia->getSfGuardUser()->getGanhoReferenciaDisponivel(), 2, ',', '.'); ?></td>
                    <td><?php print "R$ " . number_format($referencia->getSfGuardUser()->getGanhoReferenciaTotal(), 2, ',', '.'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table class="table">
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
    <!--    <div class="span2">-->
    <!--        <div class=" help-block">-->
    <!--            <table class="table no-margin">-->
    <!--                <thead>-->
    <!--                    <tr>-->
    <!--                        <th>Ganhos disponível para resgate</th>-->
    <!--                    </tr>-->
    <!--                </thead>-->
    <!--                <tbody>-->
    <!--                    <tr>-->
    <!--                        <td>-->
    <!--                            <p class="text-right lead">R$ -->
    <?php //print number_format($ganhos, 2, ',', '.') ?><!--</p>-->
    <!--                        </td>-->
    <!--                    </tr>-->
    <!--                </tbody>-->
    <!--            </table>-->
    <!--        </div>-->
    <!--    </div>-->
</div>
<script>
    $("#copyarea").focus(function () {
        var $this = $(this);
        $this.select();

        // Work around Chrome's little problem
        $this.mouseup(function () {
            // Prevent further mouseup intervention
            $this.unbind("mouseup");
            return false;
        });
    });
</script>