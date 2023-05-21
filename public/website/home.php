<?php
$file = null;
if ($files = $DUMBDOG->filesByTag('home')) {
    $file = reset($files);
}
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <h2><?= $DUMBDOG->site->name; ?></h2>
    </div>
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