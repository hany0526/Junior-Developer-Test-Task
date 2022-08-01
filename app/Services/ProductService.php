<?php

require REPOSITORIES_PATH . 'ProductRepository.php';

class ProductService
{

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = ProductRepository::getInstance();
    }

    public function get()
    {
        return $this->productRepository->get();
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

    public function addNewProduct(Product $product)
    {
        $product->setSKU(Input::get('sku'));
        $product->setName(Input::get('name'));
        $product->setPrice(Input::get('price'));

        // Validate The Form
        $formErrors = [];

        if ($product->getSKU() == null) {
            $formErrors[] = 'SKU Can\'t be <strong>Empty</strong>';
        }

        if ($this->productRepository->existsBySKU($product->getSKU())) {
            array_push($formErrors, "This SKU {$product->getSKU()} already Taken");
        }

        if ($product->getName() == null) {
            $formErrors[] = 'Name Can\'t be <strong>Empty</strong>';
        }

        if ($product->getPrice() == null) {
            $formErrors[] = 'Price Can\'t be <strong>Empty</strong>';
        }

        if ($product->getProductType() == "DVD") {
            if (Input::get('size') == null) {
                $formErrors[] = 'Size Can\'t be <strong>Empty</strong>';
            } else {
                $product->setDetails(Input::get('size'));
            }
        }

        if ($product->getProductType() == "Book") {
            if (Input::get('weight') == null) {
                $formErrors[] = 'Weight Can\'t be <strong>Empty</strong>';
            } else {
                $product->setDetails(Input::get('weight'));
            }
        }

        if ($product->getProductType() == "Furniture") {
            if (Input::get('height') == null) {
                $formErrors[] = 'Height Can\'t be <strong>Empty</strong>';
            }

            if (Input::get('width') == null) {
                $formErrors[] = 'Width Can\'t be <strong>Empty</strong>';
            }

            if (Input::get('length') == null) {
                $formErrors[] = 'Length Can\'t be <strong>Empty</strong>';
            }

            if (empty($formErrors)) {
                $product->setDimensions(Input::get('height'), Input::get('width'), Input::get('length'));
            }
        }

        if (!empty($formErrors)) {
            echo '<div class="container">';
            // Loop Into Errors Array And Echo It
            foreach ($formErrors as $error) {
                echo '<div class="alert alert-danger shadow-danger-sm">' . $error . '</div>';
            }

            echo "</div>";
            return;
        }

        if (empty($formErrors)) {
            return $this->productRepository->save($product);
        }
    }
}
