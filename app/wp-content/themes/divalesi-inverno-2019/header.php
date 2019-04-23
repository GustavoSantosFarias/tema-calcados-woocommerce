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
<body <?php body_class()?>>
    <header>
        <div id="mobile-nav" class="d-sm-none">
            <form action="" method="get">
                <input type="text" name="s" id="search" placeholder="Busca por produtos">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>

            <?php divalesi_header_menu(); ?>
            <?php myAccountLink(); ?>
        </div>

        <div id="dark-mask"></div>

        <div id="top" class="clearfix">
            <div>
                <i class="fas fa-phone"></i>
                TELEFONE: <span>(51) 3546-6777</span>
                <i class="fab fa-whatsapp"></i> 
                WHATSAPP: <span>(51) 99161-3239 <span class="d-none d-sm-block">(seg. a sex. 7h - 11:30 e 13h - 17h)</span></span>
            </div>
            <div class="float-right d-none d-sm-block">
                <ul>
                    <li><?php myAccountLink(); ?></li>
                    <li><a href="<?= wc_get_cart_url() ?>">Carrinho</a></li>
                    <li><a href="<?= site_url() . '/atendimento' ?>">Atendimento</a></li>
                </ul>  
            </div>
        </div>

        <div id="main-header" class="clearfix">
            <div class="container">
                <div class="logo float-left">
                    <a href="<?= site_url() ?>" title="Divalesi Inverno 2019"><img class="img-responsive" src="<?= THEME_ASSETS_URI . 'images/logo-divalesi.png' ?>" alt="Divalesi Inverno 2019"></a>
                </div>

                <div class="d-none d-sm-block">
                    <?php divalesi_header_menu(); ?>
                </div>

                <div id="mobile-nav-icon" class="d-sm-none d-md-none d-lg-none float-right clearfix">
                    <div class="cart-icon-mobile float-left">
                        <a href="<?= wc_get_cart_url() ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <div><?= WC()->cart->get_cart_contents_count() ?></div>
                        </a>
                    </div>
                    <div class="burguer-menu">
                        <span></span>
                    </div>
                </div>
            </div>  
        </div>
    </header>