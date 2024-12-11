<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'app/controller/phpMailer/src/Exception.php';
require 'app/controller/phpMailer/src/PHPMailer.php';
require 'app/controller/phpMailer/src/SMTP.php';

require_once 'app/model/database.php';
require_once 'app/controller/HeaderController.php';
require_once 'app/controller/HomeController.php';
require_once 'app/controller/ProductController.php';
require_once 'app/controller/UserController.php';
require_once 'app/controller/CartController.php';
require_once 'app/controller/InformationController.php';

session_start();
// session_unset();
$db = new Database();
$header = new HeaderController();
$header->header();
$view = $_GET['view'] ?? '';
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
    case 'addreview':
        $review = new ProductController();
        $review->addReview();
        break;
    case 'register':
        $register = new UserController();
        $register->viewregister();
        break;
    case 'login':
        $login = new UserController();
        $login->viewlogin();
        break;
    case 'about':
        $about = new InformationController();
        $about->about();
        break;
    case 'blog':
        $blog = new InformationController();
        $blog->blog();
        break;
    case 'blog_detail':
        $blog_detail = new InformationController();
        $blog_detail->blogDetail();
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
        break;
    case 'changepassprofile':
        $checkpassprofile = new UserController();
        $checkpassprofile->changepassprofile();
        break;
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
    case 'addcart':
        $addcart = new CartController();
        $addcart->addcart();
        break;
    case 'cart':
        $cart = new CartController();
        $cart->viewcart();
        break;
    case 'decrease':
        $decrease = new CartController();
        $decrease->decrease();
        break;
    case 'increase':
        $increase = new CartController();
        $increase->increase();
        break;
    case 'remove':
        $remove = new CartController();
        $remove->remove();
        break;
    case 'removeall':
        $removeall = new CartController();
        $removeall->removeall();
        break;
    case 'payment':
        $payment = new CartController();
        $payment->viewPayment();
        break;
    case 'discount':
        $discount = new CartController();
        $discount->checkDiscount();
        break;
    case 'addpayment':
        $addpayment = new CartController();
        $addpayment->addPayment();
        break;
    case 'deactiveOrder':
        $deactiveOrder = new CartController();
        $deactiveOrder->deactiveOrder();
        break;
    case 'contact':
        $contact = new InformationController();
        $contact->contact();
        break;
    case 'sendform':
        $form = new InformationController();
        $form->sendForm();
        break;
    default:
        $home = new HomeController();
        $home->home();
        break;
}

include_once("./app/view/footer.php");
