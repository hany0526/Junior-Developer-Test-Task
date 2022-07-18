<?php

require 'app/Input.php';
require MODEL_PATH . 'product/ProductService.php';
require MODEL_PATH . 'productType/ProductTypeService.php';

class productsController
{
    private $productService;
    private $productTypeService;

    public function __construct()
    {
        $this->productService = new ProductService();
        $this->productTypeService = new ProductTypeService();

    }

    // mvc handler request
    public function mvcHandler()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri == "/" && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->list();
        } elseif ($uri == "/addproduct" && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->addProduct();
        } elseif ($uri == "/storeproduct" && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->storeProduct();
        } elseif ($uri == "/deleteproducts" && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->deleteProducts();
        } else {
            $this->pageRedirect("/");
        }
    }

    // page redirect.
    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }

    // page product list.
    function list() {
        try {

            $products = $this->productService->get();
            include VIEW_PATH . "products/list.php";

        } catch (Exception $e) {
            throw $e;
        }
    }

    // add new product
    public function addProduct()
    {
        try {

            $this->productTypeService = new ProductTypeService();
            $productTypes = $this->productTypeService->get();
            include VIEW_PATH . "products/add.php";

        } catch (Exception $e) {
            throw $e;
        }
    }

    // storeProduct
    public function storeProduct()
    {
        try
        {
            $productType = ucfirst(Input::get('productType'));
            if ($this->productTypeService->productTypeIsExists($productType)) {

                $product = new $productType();
                $productService = new ProductService();
                if ($productService->addNewProduct($product)) {
                    $this->pageRedirect('/');
                }
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    // delete products
    public function deleteProducts()
    {
        try
        {
            // Get Data From The Form.
            $deleteProducts = Input::get('deleteProducts');

            if (!empty($deleteProducts) && $deleteProducts != []) {
                foreach ($deleteProducts as $product_id) {
                    $this->productService->deleteProduct($product_id);
                }
            }

            $this->pageRedirect('/');

        } catch (Exception $e) {
            throw $e;
        }
    }

}
