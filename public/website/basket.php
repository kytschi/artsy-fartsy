<?php
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <h2><?= $DUMBDOG->page->name; ?></h2>
        <?= $DUMBDOG->page->content; ?>
        <p>Your basket is currently empty</p>
    </div>
</div>
<?php require_once("./website/footer.php"); ?>