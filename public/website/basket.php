<?php
if (!empty($_GET['add']) && !empty($_GET['code'])) {
    $DUMBDOG->basketAddTo($_GET['code'], 1);
    header("Location: /basket");
} elseif (!empty($_GET['remove']) && !empty($_GET['id'])) {
    $DUMBDOG->basketRemoveFrom($_GET['id']);
    header("Location: /basket");
}
require_once("./website/header.php");
?>
<div id="page">
    <div id="page-body">
        <h2><?= $DUMBDOG->page->name; ?></h2>
        <?= $DUMBDOG->page->content; ?>
        <?php
        $items = null;
        if ($basket) {
            $items = count($basket->items);
        }
        if ($items) {
            ?>
            <table id="basket">
                <thead>
                    <tr>
                        <th colspan="2"><p>Product</p></th>
                        <th width="150px"><p>Price</p></th>
                        <th width="50px">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($basket->items as $item) {
                    ?>
                    <tr>
                        <td colspan="2"><?= $item->name; ?></td>
                        <td class="price">&pound;<?= $item->price; ?></td>
                        <td>
                            <a href="/basket?remove=true&id=<?= $item->id; ?>" title="Remove from basket" class="btn-remove">&nbsp;</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>&nbsp;</td>
                        <td width="100px" class="border total">Sub-total</td>
                        <td class="border">&pound;<?= $basket->sub_total; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="border total">Tax</td>
                        <td class="border">&pound;<?= $basket->sub_total_tax; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td class="border total">Total</td>
                        <td class="border">&pound;<?= $basket->total; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
            <div>
                <p>&nbsp;</p>
                <a href="/checkout" class="button">checkout</a>
            </div>
            <?php
        } else {
            ?>
            <p>Your basket is currently empty</p><br/>
            <p><a href="/" class="button">Home</a></p>
            <?php
        }
        ?>
    </div>
</div>
<?php require_once("./website/footer.php"); ?>