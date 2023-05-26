<?php
$error_message = '';
try {
    if (isset($_POST['submit'])) {
        $required = [
            'billing_name',
            'billing_address_line_1',
            'billing_city',
            'billing_county',
            'billing_postcode',
            'billing_country',
            'shipping_name',
            'shipping_address_line_1',
            'shipping_city',
            'shipping_county',
            'shipping_postcode',
            'shipping_country'
        ];

        if (!empty($_POST['same_billing'])) {
            $_POST['shipping_name'] = $_POST['billing_name'];
            $_POST['shipping_address_line_1'] = $_POST['billing_address_line_1'];
            $_POST['shipping_city'] = $_POST['billing_city'];
            $_POST['shipping_county'] = $_POST['billing_county'];
            $_POST['shipping_postcode'] = $_POST['billing_postcode'];
            $_POST['shipping_country'] = $_POST['billing_country'];
        }

        foreach ($required as $var) {
            if (empty($_POST[$var])) {
                throw new \Exception('Missing required fields');
            }
        }

        $DUMBDOG->basketAddBilling([
            'name' => $_POST['billing_name'],
            'address_line_1' => $_POST['billing_address_line_1'],
            'address_line_2' => $_POST['billing_address_line_2'],
            'city' => $_POST['billing_city'],
            'county' => $_POST['billing_county'],
            'postcode' => $_POST['billing_postcode'],
            'country' => $_POST['billing_country']
        ]);

        $DUMBDOG->basketAddShipping([
            'name' => $_POST['shipping_name'],
            'address_line_1' => $_POST['shipping_address_line_1'],
            'address_line_2' => $_POST['shipping_address_line_2'],
            'city' => $_POST['shipping_city'],
            'county' => $_POST['shipping_county'],
            'postcode' => $_POST['shipping_postcode'],
            'country' => $_POST['shipping_country']
        ]);

        //header("Location: /checkout");
    }
} catch (\Exception $err) {
    $error_message = $err->getMessage();
}
require_once("./website/header.php");
?>
<div id="page">
    <?php
    if ($error_message) {
        ?>
        <div id="error">
            <p class="h2">Error</p>
            <p><?= $error_message; ?></p>
        </div>
        <?php
    }
    ?>
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
            <p>Required fields<span class="required">*</span></p>
            <form method="POST">
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2"><p>Billing</p></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="150px">Your name<span class="required">*</span></td>
                                    <td>
                                        <input name="billing_name" type="text" class="form-input" required="required" value="<?= !empty($_POST['billing_name']) ? $_POST['billing_name'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address line 1<span class="required">*</span></td>
                                    <td>
                                        <input name="billing_address_line_1" type="text" class="form-input" required="required" value="<?= !empty($_POST['billing_address_line_1']) ? $_POST['billing_address_line_1'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address line 2</td>
                                    <td>
                                        <input name="billing_address_line_2" type="text" class="form-input" value="<?= !empty($_POST['billing_address_line_2']) ? $_POST['billing_address_line_2'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>City<span class="required">*</span></td>
                                    <td>
                                        <input name="billing_city" type="text" class="form-input" required="required" value="<?= !empty($_POST['billing_city']) ? $_POST['billing_city'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>County<span class="required">*</span></td>
                                    <td>
                                        <input name="billing_county" type="text" class="form-input" required="required" value="<?= !empty($_POST['billing_county']) ? $_POST['billing_county'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Postcode<span class="required">*</span></td>
                                    <td>
                                        <input name="billing_postcode" type="text" class="form-input" required="required" value="<?= !empty($_POST['billing_postcode']) ? $_POST['billing_postcode'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Country<span class="required">*</span></td>
                                    <td>
                                        <input name="billing_country" type="text" class="form-input" required="required" value="<?= !empty($_POST['billing_country']) ? $_POST['billing_country'] : '';?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><p>Shipping</p></th>
                                    <th>
                                        
                                        <div class="switcher float-right"">
                                            <label>
                                                <input type="checkbox" name="same_billing" value="1"<?= !empty($_POST['same_billing']) ? ' checked="checked"' : '';?>>
                                                <span>
                                                    <small class='switcher-on'>yes</small>
                                                    <small class='switcher-off'>no</small>
                                                </span>
                                            </label>
                                        </div>
                                        <span class="float-right" style="padding-top: 10px;">
                                            Same as billing&nbsp;&nbsp;
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="150px">Your name<span class="required">*</span></td>
                                    <td>
                                        <input name="shipping_name" type="text" class="form-input" value="<?= !empty($_POST['shipping_name']) ? $_POST['shipping_name'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address line 1<span class="required">*</span></td>
                                    <td>
                                        <input name="shipping_address_line_1" type="text" class="form-input" value="<?= !empty($_POST['shipping_address_line_1']) ? $_POST['shipping_address_line_1'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address line 2</td>
                                    <td>
                                        <input name="shipping_address_line_2" type="text" class="form-input" value="<?= !empty($_POST['shipping_address_line_2']) ? $_POST['shipping_address_line_2'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>City<span class="required">*</span></td>
                                    <td>
                                        <input name="shipping_city" type="text" class="form-input" value="<?= !empty($_POST['shipping_city']) ? $_POST['shipping_city'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>County<span class="required">*</span></td>
                                    <td>
                                        <input name="shipping_county" type="text" class="form-input" value="<?= !empty($_POST['shipping_county']) ? $_POST['shipping_county'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Postcode<span class="required">*</span></td>
                                    <td>
                                        <input name="shipping_postcode" type="text" class="form-input" value="<?= !empty($_POST['shipping_postcode']) ? $_POST['shipping_postcode'] : '';?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Country<span class="required">*</span></td>
                                    <td>
                                        <input name="shipping_country" type="text" class="form-input" value="<?= !empty($_POST['shipping_country']) ? $_POST['shipping_country'] : '';?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <p>
                    <button type="submit" name="submit">Next step</button>
                </p>
            </form>
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