<?php

require 'app/Input.php';
require 'app/model/product/ProductService.php';
require 'app/model/productType/ProductTypeService.php';

class productsController
{
    private $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    // mvc handler request
    public function mvcHandler()
    {
        $uri = $_SERVER['REQUEST_URI'];

        if ($uri == "/") {
            $this->list();
        } elseif ($uri == "/addproduct" && $_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->addProduct();
        } elseif ($uri == "/storeproduct" && $_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->storeProduct();
        } elseif ($uri == "/delete") {
            $this->delete();
        } else {
            $this->pageRedirect("/");
        }

    }

    // page redirect.
    public function pageRedirect($url)
    {
        header('Location:' . $url);
        exit();
    }

    // page product list.
    function list() {
        $products = $this->productService->get();
        include "view/products/list.php";
    }

    // add new product
    public function addProduct()
    {
        try {

            $productTypeService = new ProductTypeService();
            $productTypes = $productTypeService->get();
            include "view/products/add.php";

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
            if ($productTypeService->productTypeIsExists($productType)) {

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

    // delete product
    public function delete()
    {
        try
        {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                // Get Data From The Form.
                $deleteProducts = Input::get('deleteProducts');

                if (!empty($deleteProducts) && $deleteProducts != []) {
                    foreach ($deleteProducts as $product_id) {
                        $productService->deleteProduct($product_id);
                    }
                }

                $this->pageRedirect('index.php');

            }

        } catch (Exception $e) {
            throw $e;
        }
    }

}
