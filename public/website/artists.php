<?php
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <h2><?= $DUMBDOG->page->name; ?></h2>
        <?= $DUMBDOG->page->content; ?>
        <p>&nbsp;</p>
        <?php
        if ($categories = $DUMBDOG->pages(["children" => $DUMBDOG->page->id])) {
            foreach ($categories as $page) {
                ?>
                <div class="row">
                    <div class="col">
                        <p class="h2">
                            <?= $page->name; ?>
                        </p>
                        <?= $page->content; ?>
                        <p class="tile-buttons">
                            <a href="<?= $page->url;?>" class="button">View</a>
                        </p>
                    </div>
                    <div class="image-box">
                        <div class="image">
                        <?php
                        if ($files = $DUMBDOG->filesByTag(strtolower($page->name))) {
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
                <?php
            }
        } else {
            ?>
            <div class="row">
                <p class="h4">No artists yet.</p>
            </div>
            <?php
        }
        ?>
    </div>
</div>
<?php require_once("./website/footer.php"); ?>