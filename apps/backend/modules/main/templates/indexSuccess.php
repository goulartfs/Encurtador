<style>
    h1{
        color: #222222;
        margin-bottom: 15px;
    }
    table{
    }

    table td, table th{
        border-radius: 3px;
        padding: 10px;
        border: 1px solid #cdcdcd;
    }
</style>
<section class='numeros'>
        <h1>
            Resumo das estatísticas do site.
        </h1>
        <table>
            <tr>
                <th><h2>Total de Links</h2></th>
                <th><h2>Total de Cliques</h2></th>
                <th><h2>Total de Hoje</h2></th>
            </tr>
            <tr>
                <td><h3><?php print $links_all ? number_format($links_all, 0, ',', '.') : 0 ?></h3></td>
                <td><h3><?php print $cliques_all ? number_format($cliques_all, 0, ',', '.') : 0 ?></h3></td>
                <td><h3><?php print $cliques ? number_format($cliques, 0, ',', '.') : 0 ?></h3></td>
            </tr>
        </table>
</section>