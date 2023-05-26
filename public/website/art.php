<?php
$file = null;
if ($files = $DUMBDOG->filesByTag('home')) {
    $file = reset($files);
}
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <div class="row">
            <div class="col">
                <h2><?= $DUMBDOG->page->name; ?></h2>
                <?= $DUMBDOG->page->content; ?>
                <p class="tile-buttons">
                    <?php
                    if ($DUMBDOG->page->stock) {
                        ?>
                        <a href="/basket?add=true&code=<?= $DUMBDOG->page->code; ?>" class="button">Purchase</a>
                        <?php
                    }
                    ?>
                </p>
            </div>
            <div class="image-box">
                <div class="image">
                    <?php
                    if ($files = $DUMBDOG->filesByTag(strtolower($DUMBDOG->page->name))) {
                        $file = reset($files);
                        ?>
                        <a href="<?= $file->filename; ?>" target="_blank">
                            <img src="<?= $file->thumbnail; ?>">
                        </a>
                        <?php
                    } else {
                        ?>
                        <img src="<?= $DUMBDOG->site->theme_folder; ?>/default.jpg">
                        <?php
                    }
                    ?>
                </div>
                <div class="price">
                    &pound;<?= $DUMBDOG->page->price;?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $products = $DUMBDOG->products([
        "where" => [
            "query" => "pages.parent_id = :parent_id AND pages.id != :id",
            "data" => [
                ":parent_id" => $DUMBDOG->page->parent_id,
                ":id" => $DUMBDOG->page->id
            ]
        ]
    ]);
    if ($products) {
        ?>
        <h3>More from this artist</h3>
        <div class="tiles">
        <?php
            require_once("./website/shared/art.php");
        ?>
        </div>
        <?php
    }
    ?>
</div>
<?php require_once("./website/footer.php"); ?>