    <footer>
        <div class="container">
            <div class="logo text-center">
                <img src="<?= THEME_ASSETS_URI . 'images/logo-divalesi-white.png' ?>" alt="Divalesi Calçados">
            </div>

            <div class="languages-translated">
                <ul class="text-center">
                    <li><a class="secondary-title text-uppercase" href="<?= site_url() ?>/en">English</a></li>
                </ul>
            </div>

            <div class="social-link-icons">
                <ul class="text-center">
                    <li class="d-inline-block"><a class="secondary-title" target="_blank" href="https://pt-br.facebook.com/DivalesiBrasil/"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="d-inline-block"><a class="secondary-title" target="_blank" href="https://www.instagram.com/divalesi/?hl=pt-br"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="footer-menus">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <h4>ATENDIMENTO</h4>
                        <?php divalesi_menu("footer-atendimento"); ?>
                    </div>

                    <div class="col-12 col-md-3">
                        <h4>LINKS ÚTEIS</h4>
                        <?php divalesi_menu("links-uteis-footer"); ?>
                    </div>
                    
                    <div class="col-12 col-md-3">
                        <h4>NOSSAS REDES</h4>
                        <?php divalesi_menu("nossas-redes"); ?>
                    </div>

                    <div class="col-12 col-md-3">
                        <h4>SOBRE A DIVALESI</h4>
                        <p class="secondary-title">
                            Transformamos nossa paixão por moda em calçados exclusivos,
                            que acompanham com estilo e personalidade, o dia a dia da mulher brasileira.
                            Confira nossas novidades, fique por dentro do andamento dos seus pedidos e venda ainda mais, através do nosso aplicativo, disponível gratuitamente para Android e IOS.
                        </p>

                        <address>
                            <p class="secondary-title"><i class="fas fa-paper-plane"></i>Rua 7 de Setembro – 1203, Três Coroas / RS</p>
                            <p class="secondary-title"><i class="fas fa-mobile"></i>Fone: (51) 3546-6777</p>
                            <p class="secondary-title"><i class="fab fa-whatsapp"></i>(51) 9 9161-3239</p>
                        </address>

                        <div class="text-center">
                            <img class="img-fluid" src="<?= THEME_ASSETS_URI . 'images/payments-available-methods.png' ?>" alt="Métodos de pagamentos disponíveis">
                        </div>

                    </div>
                </div>   
            </div>
            
        </div>   
    </footer>
    <script src="<?= assetsVersion(THEME_ASSETS_DIR . 'js/script.js') ?>"></script>
</body>
</html>