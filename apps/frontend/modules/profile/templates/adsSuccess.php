<h2>Campanhas</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Orçamento</th>
            <th>Url da Campanha</th>
            <th>Ativada?</th>
            <th>Total</th>
            <th>Criada em</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ads as $ad) { ?>
            <tr>
                <td><a class="btn" title="Editar campanha" href="<?php print url_for('@edit_ad?id=' . $ad->getId()) ?>"><i class="icon-pencil"></i></a></td>
                <td><?php print $ad->getTitulo() ?></td>
                <td><?php print $ad->getOrcamento() ?></td>
                <td><?php print $ad->getUrlCampanha() ?></td>
                <td><i class="<?php print ($ad->getIsActive())?'icon-ok':'' ?>"></i></td>
                <td><?php print $ad->getTotal() ?></td>
                <td><?php print $ad->getDateTimeObject('created_at')->format('d/m/Y h:i:s') ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="text-left">
    <a class="btn btn-success" href="<?php print url_for('profile/new-ad') ?>"><i class="icon-plus icon-white"></i>  Nova Campanha</a>
</div>