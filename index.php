<?php

define('ASSETS_PATH', 'assets/');
define('MODEL_PATH', 'app/Models/');
define('VIEW_PATH', 'resources/view/');
define('SERVICES_PATH', 'app/Services/');
define('CONTROLLER_PATH', 'app/Controllers/');
define('REPOSITORIES_PATH', 'app/Repositories/');

require CONTROLLER_PATH . 'ProductsController.php';
$productsController = new ProductsController();
$productsController->mvcHandler();
