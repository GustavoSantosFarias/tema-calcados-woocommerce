<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo the_title()?></title>
    <link rel="stylesheet" href="<?= THEME_ASSETS_URI . 'css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= assetsVersion(THEME_ASSETS_DIR."css/main.min.css") ?>">
    <script src="<?= THEME_ASSETS_URI . "js/plugins/jquery.min.js" ?>"></script>
</head>
<body <?php body_class("hind")?>>
    <header>
        <div id="mobile-nav" class="d-sm-none">
            <form action="" method="get">
                <input type="text" name="s" id="search" placeholder="Busca por produtos">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <?php divalesi_menu("header-menu"); ?>
            <?php myAccountLink(); ?>
        </div>

        <div id="dark-mask"></div>

        <div id="top" class="clearfix">
            <div class="container">
                <div>
                    <i class="fas fa-phone"></i>
                    TELEFONE: <span>(51) 3546-6777</span>
                    <i class="fab fa-whatsapp"></i> 
                    WHATSAPP: <span>(51) 99161-3239 <span class="d-none d-sm-inline">(seg. a sex. 7h - 11:30 e 13h - 17h)</span></span>
                </div>
                <div class="float-right d-none d-sm-block">
                    <ul>
                        <li class="standard-titles-light"><?php myAccountLink(); ?></li>
                        <li class="standard-titles-light"><a href="<?= wc_get_cart_url() ?>">Carrinho</a></li>
                        <li class="standard-titles-light"><a href="<?= site_url() . '/atendimento' ?>">Atendimento</a></li>
                    </ul>  
                </div>
            </div>
        </div>

        <div id="main-header" class="clearfix">
            <div class="container">
                <div class="row">
                    <div class="logo col-8 col-lg-3">
                        <a href="<?= site_url() ?>" title="Divalesi Inverno 2019"><img class="img-responsive" src="<?= THEME_ASSETS_URI . 'images/logo-divalesi.png' ?>" alt="Divalesi Inverno 2019"></a>
                    </div>

                    <div class="d-none d-sm-block col-7">
                        <?php divalesi_menu("header-menu"); ?>
                    </div>

                    <div class="d-none d-sm-block col-2">
                        <button><i class="fas fa-search"></i></button>
                        <a href="<?= wc_get_cart_url() ?>">
                            <span class="cart-icon">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="cart-total-amount"><?= WC()->cart->get_cart_contents_count() ?></span>
                            </span>
                        </a>
                        <span class="cart-price"><?= WC()->cart->get_cart_total() ?></span>
                    </div>

                    <div id="mobile-nav-icon" class="d-sm-none d-md-none d-lg-none col-4 clearfix">
                        <div class="burguer-menu float-right">
                            <span></span>
                        </div>
                        <div class="cart-icon-mobile float-right">
                            <a href="<?= wc_get_cart_url() ?>">
                                <i class="fas fa-shopping-cart"></i>
                                <div class="cart-total-amount"><?= WC()->cart->get_cart_contents_count() ?></div>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>  
        </div>
    </header>