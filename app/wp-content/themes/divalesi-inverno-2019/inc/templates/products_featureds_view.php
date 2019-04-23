<li>
    <a href="<?= $link ?>" title="<?= $title ?>">
        <div class="product-image">
            <img class="img-fluid" src="<?= $image ?>" alt="<?= $title ?>">
            <img class="img-fluid d-none" src="<?= $gallery_image ?>" alt="<?= $title ?>">
        </div>

        <div class="product-info">
            <h4 class="primary-title"><?= $title ?></h4>
            <h6 class="primary-title"> 
                <span class="in-installment-times">6x</span> de
                <span class="in-installment-price secondary-title"><?= inInstallmentPrice($regular_price) ?></span> ou
                <span class="full-price secondary-title"><?= wc_price($regular_price) ?></span> á vista
            </h6>
        </div>
    </a>
</li>