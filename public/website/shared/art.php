<?php
foreach ($products as $product) {
    $file = null;
    if ($files = $DUMBDOG->filesByTag(strtolower($product->name))) {
        $file = reset($files);
        $file = $file->thumbnail;
    }
    ?>
    <div class="tile">
        <div class="media">
            <div class="image-box">
                <?php
                if ($file) {
                    ?>
                    <div class="image"><img src="<?= $file; ?>" alt="<?= $product->name; ?>"></div>
                    <?php
                }
                ?>
                <div class="price">&pound;<?= $product->price;?></div>
            </div>
            <div class="col">
                <p class="h4">
                    <?= $product->name; ?>
                </p>
                <p class="h5">
                    By <a href="/<?= str_replace(" ", "-", strtolower($product->meta_author)); ?>"><?= $product->meta_author; ?></a>
                </p>
                <p class="tile-buttons">
                    <a href="<?= $product->url;?>" class="button">View</a>
                    <?php
                    if ($product->stock) {
                        ?>
                        <a href="/basket?add=true&code=<?= $product->code; ?>" class="button">Purchase</a>
                        <?php
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
    <?php
}
?>