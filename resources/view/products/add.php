<?php

/*
======================
== add product Page ==
======================
 */

$title = 'Add Product';
include VIEW_PATH . "partials/header.php";

?>

<div class="container">
    <form id="product_form" action="storeproduct" method="POST">

        <div class="row m-0 align-items-center py-2">

            <div class="col">
                <h2>Product Add</h2>
            </div>

            <div class="col-auto">
                <button type="submit" onclick="$('#product_form').validate()" text="Save"
                    class="hvr-grow btn btn-outline-success shadow-success-sm px-3 px-lg-4 rounded-pill">
                    Save
                </button>
            </div>

            <div class="col-auto">
                <a href="/" text="Cancel"
                    class="hvr-grow btn btn-outline-dark shadow-sm px-3 px-lg-4 rounded-pill">Cancel</a>
            </div>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-lg-8 py-2">

                <!-- Start sku Field -->
                <div class="form-group row py-1">
                    <label class="col-lg-3 col-form-label text-lg-center" for="sku">SKU</label>
                    <div class="col-lg-8">
                        <input id="sku" name="sku" type="text" required class="form-control"
                            placeholder="enter product sku">
                    </div>
                </div>
                <!-- End sku Field -->

                <!-- Start Name Field -->
                <div class="form-group row py-1">
                    <label class="col-lg-3 col-form-label text-lg-center" for="name">Name</label>
                    <div class="col-lg-8">
                        <input id="name" name="name" type="text" required class="form-control"
                            placeholder="enter product name">
                    </div>
                </div>
                <!-- End Name Field -->

                <!-- Start price Field -->
                <div class="form-group row py-1">
                    <label class="col-lg-3 col-form-label text-lg-center" for="price">Price</label>
                    <div class="col-lg-8">
                        <input id="price" name="price" type="number" min="0" step="any" required class="form-control"
                            placeholder="enter product price">
                    </div>
                </div>
                <!-- End price Field -->


                <div class="form-group row py-1">
                    <label class="col-lg-3 col-form-label text-lg-center" for="productType">Type Switcher</label>
                    <div class="col-lg-8">
                        <select class="form-control" id="productType" name="productType" required
                            onchange="productTypeChanged()">
                            <option value="">Select Type Switcher</option>

                            <?php foreach ($productTypes as $type) {?>
                            <option value="<?php echo $type->getClassName() ?>"><?php echo $type->getName() ?> </option>
                            <?php }?>
                          
                        </select>
                    </div>
                </div>

                <div id="DVD">
                    <!-- Start size Field -->
                    <div class="form-group row py-1">
                        <label class="col-lg-3 col-form-label text-lg-center" for="size">Size (MB)</label>
                        <div class="col-lg-8">
                            <input id="size" name="size" type="number" class="form-control"
                                placeholder="enter product size">
                        </div>

                        <label class="col-lg-12 p-3 h5" for="size">Please, provide size in MB</label>

                    </div>
                    <!-- End size Field -->
                </div>

                <div id="Book">

                    <!-- Start weight Field -->
                    <div class="form-group row py-1">
                        <label class="col-lg-3 col-form-label text-lg-center" for="weight">Weight (KG)</label>
                        <div class="col-lg-8">
                            <input id="weight" name="weight" type="number" class="form-control"
                                placeholder="enter product weight">
                        </div>

                        <label class="col-lg-12 p-3 h5" for="weight">Please, provide weight in KG</label>

                    </div>
                    <!-- End weight Field -->
                </div>

                <div id="Furniture">
                    <!-- Start height Field -->
                    <div class="form-group row py-1">
                        <label class="col-lg-3 col-form-label text-lg-center" for="height">Height (CM)</label>
                        <div class="col-lg-8">
                            <input id="height" name="height" type="number" class="form-control"
                                placeholder="enter product height">
                        </div>
                    </div>
                    <!-- End height Field -->

                    <!-- Start width Field -->
                    <div class="form-group row py-1">
                        <label class="col-lg-3 col-form-label text-lg-center" for="width">Width (CM)</label>
                        <div class="col-lg-8">
                            <input id="width" name="width" type="number" class="form-control"
                                placeholder="enter product width">
                        </div>
                    </div>
                    <!-- End width Field -->

                    <!-- Start length Field -->
                    <div class="form-group row py-1">
                        <label class="col-lg-3 col-form-label text-lg-center" for="length">Length (CM)</label>
                        <div class="col-lg-8">
                            <input id="length" name="length" type="number" class="form-control"
                                placeholder="enter product length">
                        </div>

                        <label class="col-lg-12 p-3 h5">Please, provide dimensions in HxWxL</label>

                    </div>
                    <!-- End length Field -->
                </div>
            </div>

            <div class="col-12 my-5"></div>

        </div>
    </form>
</div>

<script src="<?php echo $js ?>product/add.js?v=1"></script>

<?php

include VIEW_PATH . "partials/footer.php";

?>
