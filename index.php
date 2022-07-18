<?php

define('ASSETS_PATH', 'assets/');
define('MODEL_PATH', 'app/model/');
define('VIEW_PATH', 'resources/view/');
define('CONTROLLER_PATH', 'app/controller/');

require 'app/controller/ProductsController.php';
$productsController = new ProductsController();
$productsController->mvcHandler();
