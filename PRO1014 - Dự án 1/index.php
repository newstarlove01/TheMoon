<?php
require_once 'app/model/database.php';
require_once 'app/controller/HeaderController.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/ProductController.php';
require_once 'app/controller/UserController.php';

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
        $detail = new ProductController();
        $detail->detail();
        break;
    case 'register':
        $register = new UserController();
        $register->viewregister();
        break;
    case 'login':
        $login = new UserController();
        $login->viewlogin();
        break;
    case 'checkuser':
        $checkuser = new UserController();
        $checkuser->check();
        break;
    case 'adduser':
        $adduser = new UserController();
        $adduser->addUser();
        break;
    case 'profile':
        $profile = new UserController();
        $profile->viewprofile();
        break;
    case 'editprofile':
        $editprofile = new UserController();
        $editprofile->editprofile();
    case 'logout':
        $logout = new UserController();
        $logout->logout();
        break;
    case 'password':
        $password = new UserController();
        $password->viewpassword();
        break;
    case 'checkmail':
        $checkmail = new UserController();
        $checkmail->checkmail();
        break;
    case 'changepass':
        $changepass = new UserController();
        $changepass->viewchangepass();
        break;
    case 'checkpass':
        $checkpass = new UserController();
        $checkpass->checkpass();
        break;
    default:
        $home = new HomeController();
        $home->home();
        break;
}

include_once("./app/view/footer.php");
