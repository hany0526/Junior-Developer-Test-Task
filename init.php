<?php

$dirs = [
    "classes/*.php",
    "classes/product/*.php",
    "classes/productType/*.php",
];

// require Models
require_once "classes/product/Product.php";
require_once "classes/productType/ProductType.php";

foreach ($dirs as $dir) {
    foreach (glob($dir) as $file) {
        require_once $file;
    }
}

function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    } else {
        echo "Default";
    }
}

$css = "assets/css/"; // Css Directory
$js = "assets/js/"; // Js Directory

$view = "view/"; // View Directory
$viewPartial = "{$view}partials/";

// include header.
include "{$viewPartial}header.php";
