<?php
$file = null;
if ($files = $DUMBDOG->filesByTag('home')) {
    $file = reset($files);
}
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <h2>Artsy-Fartsy</h2>
        <?= $DUMBDOG->page->content; ?>
    </div>
    <h3>My work</h3>
    <div class="tiles">
        <?php
        if ($products = $DUMBDOG->products()) {
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
                                By <a href="<?= str_replace(" ", "-", strtolower($product->meta_author)); ?>"><?= $product->meta_author; ?></a>
                            </p>
                            <p style="padding-top: 20px">
                                <a href="<?= $product->url;?>" class="button">View</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="row">
                <p class="h4">No products yet.</p>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<?php require_once("./website/footer.php"); ?>