<?php

include 'config.php';
require CONTROLLER_PATH . 'ProductsController.php';
$productsController = new ProductsController();
$productsController->mvcHandler();
