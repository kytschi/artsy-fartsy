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
            </div>
        </div>
    </div>
</div>
<?php require_once("./website/footer.php"); ?>