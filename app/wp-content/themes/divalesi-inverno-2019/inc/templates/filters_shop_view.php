<aside>
    <div>
        <h4>Tamanhos</h4>
        <ul>
            <?php foreach ($_filters as $filter) : ?>
                    <li><a href="<?= filterUrl($filter) ?>"><?= $filter ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>