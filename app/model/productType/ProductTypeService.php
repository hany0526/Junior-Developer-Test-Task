<?php

require 'app/model/productType/ProductTypeRepository.php';

class ProductTypeService
{

    private $productTypeRepository;

    public function __construct()
    {
        $this->productTypeRepository = ProductTypeRepository::getInstance();
    }

    public function get()
    {
        return $this->productTypeRepository->get();
    }

    public function productTypeIsExists($className)
    {
        return $this->productTypeRepository->existsClassName($className);
    }

    public function deleteProductType($id)
    {
        return $this->productTypeRepository->delete($id);
    }

    public function addNewProductType(ProductType $productType)
    {
        // Validate The Form
        $formErrors = [];

        if ($productType->getId() != null && $this->productTypeRepository->existsById($productType->getId())) {
            array_push($formErrors, '<strong>id taken</strong>');
        }

        if ($productType->getName() == null) {
            array_push($formErrors, 'Name Can\'t be <strong>Empty</strong>');
        }

        if (!empty($formErrors)) {

            echo '<div class="container">';

            // Loop Into Errors Array And Echo It
            foreach ($formErrors as $error) {
                echo '<div class="alert alert-danger shadow-danger-sm">' . $error . '</div>';
            }

            echo "</div>";

            return false;
        }

        if (empty($formErrors)) {
            return $this->productTypeRepository->save($productType);
        }
    }

}
