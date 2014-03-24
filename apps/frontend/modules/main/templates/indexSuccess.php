<section class='servicos'>
    <div class="container">
        <div class="row">
            <div class="span4 redes-sociais">
                <img src="/images/redes_sociais.png" alt="">
                <h2>Redes Sociais</h2>
                <p>Se você tem um site com 1 ou 10.000 mil links e deseja mudar para o Adplus, você tem um script
                    simples, para realizar esta tarefa</p>
            </div>
            <div class="span4 sites-blogs">
                <img src="/images/sites_blogs.png" alt="">
                <h2>Sites e Blogs</h2>
                <p>Integração de sistema antifraude com rastreamento de ip geolocalizado a fim de minimizarmos acessos
                    inválidos ou tentativas via scripts e/ou macros</p>
            </div>
            <div class="span4 afiliados">
                <img src="/images/sis_afiliados.png" alt="">
                <h2>Sistema de Afiliados</h2>
                <p>Um novo sistema de afiliados, iremos pagar para você 10% de tudo que o seu afiliado vier a
                    lucrar.</p>
            </div>
        </div>
    </div>
</section>
<?php if ($relatos->count()) { ?>
    <section class='anuncios-relatos'>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h2>Relatos de Usuários</h2>
                </div>
                <?php
                foreach ($relatos as $relato) {
                    ?>
                    <div class="span6 relatos">
                        <div class="img thumbnail"><img
                                src="<?php print ($relato->getImagem()) ? '/uploads/' . $relato->getImagem() : 'http://placehold.it/140x100&text=Foto'; ?>"/>
                        </div>
                        <div class="text">
                            <h4><?php print $relato->getNome() ?></h4>
                            <h4><?php print $relato->getSite() ?></h4>
                            <p>"<?php print $relato->getTexto() ?>"</p>
                        </div>
                    </div>
                <?php
                }
                ?>
<!--                <div class="span12 text-right">-->
<!--                    <button><img src="/images/right_arrow.png" alt="">Ver todos</button>-->
<!--                </div>-->
            </div>
        </div>
    </section>
<?php } ?>