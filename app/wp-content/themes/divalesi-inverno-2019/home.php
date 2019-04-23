<?php 
/* Template Name: Home */ 

get_header();

?> 
<div class="container">
    <?php do_action("invento_carousel"); ?>

    <section id="outstanding-conditions">
        <div class="main-condition">
            <h4 class="standard-title">FRETE GRÁTIS PARA COMPRAS ACIMA DE R$ 399,00.</h4>
        </div>

        <h1 class="secondary-title">LOJA VIRTUAL DE SAPATOS FEMININOS</h1>
    </section>

    <?php do_action("content_home") ?>
</div>

<?php get_footer(); ?>
