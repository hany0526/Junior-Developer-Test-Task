<?php

session_unset();
require_once 'app/controller/ProductsController.php';
$productsController = new ProductsController();
$productsController->mvcHandler();
