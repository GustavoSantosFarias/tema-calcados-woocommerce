<div class="form-check">
    <h4 class="title">Discounts Types</h4>
    <div>
        <input class="form-check-input" type="radio" name="discount-type" id="type-percent" value="percent" <?php checked($discount_type,"percent")?>>
        <label class="form-check-label" for="type-percent">Percent</label>
    </div>

    <div>
        <input class="form-check-input" type="radio" name="discount-type" id="type-value" value="value" <?php checked($discount_type,"value")?>>
        <label class="form-check-label" for="type-value">Value</label>
    </div>
</div>

<div class="form-check">
    <label class="form-check-label title" for="discount-value">Discount Value</label>
    <input class="form-control" type="number" name="discount-value" id="discount-value" value="<?php echo $discount_value?>">
</div>

<div class="form-check">
    <h4 class="title">Apply to Categories</h4>
    <label class="clickable checkbox <?php echo (isset($categories_promotion)) ? 'active' : '' ?>"></label>

    <div id="products-category" class="<?php echo (isset($categories_promotion)) ? 'active' : '' ?>">
        <h4 class="title">Categories</h4>

        <?php foreach (getCategories() as $key => $category) : ?>
                <div>
                    <input class="form-check-input" type="checkbox" name="categories[<?php echo $key?>]" id="type-value" value="<?php echo esc_attr($category->slug); ?>" <?php echo (in_array($category->slug,$categories_promotion)) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="type-value"><?php echo $category->name; ?></label>
                </div>
        <?php endforeach; ?>
    </div>
</div>