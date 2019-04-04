<aside>
    <pre>
        <?php 
            $attribute_taxonomies = wc_get_attribute_taxonomies();
            print_r($attribute_taxonomies);
        ?>
    </pre>
    <div>
        <h4>Tamanhos</h4>
        <ul>
            <?php foreach ($_filters as $filter) : ?>
                    <li><a href="<?= filterUrl($filter) ?>"><?= $filter ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>