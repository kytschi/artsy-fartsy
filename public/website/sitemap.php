<?php
$pages = $DUMBDOG->pages();
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <h2><?= $DUMBDOG->page->name; ?></h2>
        <?php
        foreach ($pages as $item) {
            ?>
            <p><a href="<?= $item->url; ?>"><?= $item->name; ?></a></p>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<?php require_once("./website/footer.php"); ?>