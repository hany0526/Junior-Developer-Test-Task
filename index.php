<?php

ob_start();
$pageTitle = 'Product List';
include 'init.php';

$productService = new ProductService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get Data From The Form.
    $deleteProducts = Input::get('deleteProducts');

    if (!empty($deleteProducts) && $deleteProducts != []) {
        foreach ($deleteProducts as $product_id) {
            $productService->deleteProduct($product_id);
        }
    }
}

$products = $productService->get();

?>

<div class="container">
    <form id="delete_products_form" action="index.php" method="POST">
        <div class="row m-0 align-items-center py-2">

            <div class="col">
                <h2>Product List</h2>
            </div>

            <div class="col-auto">
                <a href="addproduct.php"
                    class="hvr-grow btn btn-outline-success shadow-success-sm px-3 px-md-4 rounded-pill">ADD</a>
            </div>

            <div class="col-auto">
                <button type="submit"
                    class="hvr-grow btn btn-outline-danger shadow-danger-sm px-3 px-md-4 rounded-pill">
                    MASS DELETE
                </button>
            </div>

            <div class="col-12">
                <hr />
            </div>

            <?php foreach ($products as $key => $product) {?>

            <div class="col-6 col-lg-3 p-2">
                <div class="card p-3 hvr-grow-sm shadow-secondary-sm br-10">

                    <div class="form-check">
                        <input type="checkbox" value="<?php echo $product->getid() ?>" id="deleteProducts[]"
                            name="deleteProducts[]" class="form-check-input delete-checkbox">
                    </div>

                    <div class="text-center">
                        <h5><?php echo $product->getSKU() ?></h5>
                        <h5><?php echo $product->getName() ?></h5>
                        <h5><?php echo $product->getPrice() ?> $</h5>
                        <h5><?php echo $product->getProductDetails() ?></h5>

                    </div>
                </div>
            </div>

            <?php }?>

            <div class="col-12 py-5"></div>

        </div>
    </form>
</div>

<?php

include "{$viewPartial}footer.php";
ob_end_flush();

?>