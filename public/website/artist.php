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
            </div>
            <div class="image-box">
                <div class="image">
                <?php
                if ($files = $DUMBDOG->filesByTag(strtolower($DUMBDOG->page->name))) {
                    $file = reset($files);
                    ?>
                    <img src="<?= $file->thumbnail; ?>">
                    <?php
                } else {
                    ?>
                    <img src="<?= $DUMBDOG->site->theme_folder; ?>/default.jpg">
                    <?php
                }
                ?>
                </div>
            </div>
        </div>        
    </div>
    <h3>My work</h3>
    <div class="tiles">
        <?php
        if ($products = $DUMBDOG->products()) {
            require_once("./website/shared/art.php");
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