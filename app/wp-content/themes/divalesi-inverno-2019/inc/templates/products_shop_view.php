<li <?php wc_product_class(); ?>>
    <a href="<?= $link ?>">
        <img src="<?= $image ?>" alt="<?= $title ?>" class="img-fluid">
        <div>
            <h3><?= $title ?></h3>
            <h5><?= wc_price($regular_price) ?></h5>
        </div>
    </a>
</li>   