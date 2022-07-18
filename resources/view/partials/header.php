<?php

// Css Directory
$css = ASSETS_PATH . "css/";

// Js Directory
$js = ASSETS_PATH . "js/";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?=empty($title) ? "Product List" : $title?></title>
		<link rel="stylesheet" href="<?=$css?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?=$css?>app.css" />
	</head>
	<body>
