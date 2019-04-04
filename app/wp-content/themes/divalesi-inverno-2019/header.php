<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo the_title()?></title>
    <link rel="stylesheet" href="<?= THEME_ASSETS_DIR . 'css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?= assetsVersion(THEME_ASSETS_DIR."css/main.min.css") ?>">
    <?php wp_head(); ?>
</head>
<body class="<?php body_class()?>">