<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo the_title()?></title>
    <link rel="stylesheet" href="<?= THEME_ASSETS_URI . 'css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= assetsVersion(THEME_ASSETS_DIR."css/main.min.css") ?>">
</head>
<body <?php body_class()?>>

    <header>
        <div id="mobile-nav" class="d-sm-none d-md-none d-lg-none">
            <?php divalesi_header_menu(); ?>
        </div>

        <div id="dark-mask"></div>

        <div id="top" class="d-xs-none">
            <div>
            </div>
            <div>
            </div>
        </div>

        <div id="main-header">
            <div class="logo">
                <img class="img-responsive" src="" alt="Divalesi Inverno 2019">
            </div>

            <div class="d-xs-none">
                <?php divalesi_header_menu(); ?>
            </div>

            <?php myAccountLink(); ?>
        </div>
    </header>