<h3>Seus Referenciados</h3>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<p class="lead">
    Código de referência:
    <textarea id="copyarea" class="span12 alert-success">
        <?php print url_for('@register_referal?referal_code=' . $referal_code, true) ?>
    </textarea>
</p>
<table class="table">
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
                <td><?php print $referencia->getSfGuardUser()->getTotalAcesso(); ?></td>
                <td><?php print "R$ " . number_format($referencia->getSfGuardUser()->getGanhoReferenciaDisponivel(), 2, ',', '.'); ?></td>
                <td><?php print "R$ " . number_format($referencia->getSfGuardUser()->getGanhoReferenciaTotal(), 2, ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $("#copyarea").focus(function() {
    var $this = $(this);
    $this.select();

    // Work around Chrome's little problem
    $this.mouseup(function() {
        // Prevent further mouseup intervention
        $this.unbind("mouseup");
        return false;
    });
});
</script>