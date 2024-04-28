<?php
require_once 'template/header.php';
require_once 'src/common.php';
?>

    <h3 class="text-muted">Home page</h3>
    </div>

<?php
if(isset($_GET['idproduct']))
{
    $results = buy($_GET['idproduct']);
    if (count($results) > 0) {
        if (!isset($_SESSION['cart'])) { //if cart does not exist
            $_SESSION['cart'] = []; //create an empty array for the cart
        }
        $product_id = $results[0]['idproduct']; // get the first product and get the id of the product
        $price = $results[0]['price']; // get also the price
        $_SESSION['cart'][$product_id] = $price;
    }
}

if(isset($_GET['buy']))
{
    $_SESSION['cart'] = [];
    echo "Goods will be shipped to your address.";
} else {
?>

    <div class="mainarea">
        You have bought <?php echo count($_SESSION['cart']); ?> products.<br>
        <?php
            $total = 0;
            foreach ($_SESSION['cart'] as $a) {
                $total = $total + $a;
            }
        ?>
        Total for your order is <?php echo $total ?>.<br>
        <p>
            Buy the products by clicking <a href="buy.php?buy=ok">here!</a>
        </p>
    </div>

<?php
}
?>
<div class="row marketing">
    <div>
        <h4>Project Note:</h4>
        <p>All the images have been taken from Google using the specific search with Creative Commons licenses</p>

    </div>

    <?php require_once 'template/footer.php';?>



