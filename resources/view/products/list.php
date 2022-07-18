<?php

/*
=======================
== product List Page ==
=======================
 */

$title = 'Product List';
include VIEW_PATH . "partials/header.php";

?>

<div class="container">
    <form id="delete_products_form" action="/deleteproducts" method="POST">
        <div class="row m-0 align-items-center py-2">

            <div class="col">
                <h2>Product List</h2>
            </div>

            <div class="col-auto">
                <a href="addproduct"
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
                        <input type="checkbox" value="<?php echo $product->getId() ?>" id="deleteProducts[]"
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

include VIEW_PATH . "partials/footer.php";

?>
