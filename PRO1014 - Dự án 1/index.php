<?php
require_once 'app/model/database.php';
require_once 'app/model/CategoryModel.php';
require_once 'app/controller/HeaderController.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/ProductController.php';
require_once 'app/controller/DetailController.php';

$db = new Database();

$header = new HeaderController();
$header->header();
$view = $_GET['view'] ?? 'home';
switch ($view) {
    case 'home':
        $home = new HomeController();
        $home->home();
        break;
    case 'product':
        $product = new ProductController();
        $product->product();
        break;
    case 'detail':
        $detail = new DetailController();
        $detail->detail();
        break;
}
//? a

include_once("./app/view/footer.php");
