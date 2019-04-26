<li>
    <a href="<?= $link ?>" title="<?= $title ?>">
        <div class="product-image">
            <img class="img-fluid" src="<?= $image ?>" alt="<?= $title ?>">
            <img class="img-fluid hover-image" src="<?= $gallery_image ?>" alt="<?= $title ?>">
        </div>

        <div class="product-info">
            <h4 class="primary-title"><?= $title ?></h4>
            <h6 class="primary-title"> 
                <?php salePriceProductListTemplate($price,$regular_price) ?>
                
                <span class="price"><?= wc_price($price) ?></span>
                <span class="in-installment">6x de <?= inInstallmentPrice($price) ?> sem juros</span>
            </h6>
        </div>
    </a>
</li>