<?php

$dirs = [
    "app/*.php",
    "app/model/product/*.php",
    "app/model/productType/*.php",
];

// require Models
// require_once "app/model/product/Product.php";
// require_once "app/model/productType/ProductType.php";

// foreach ($dirs as $dir) {
//     foreach (glob($dir) as $file) {
//         require_once $file;
//     }
// }

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
