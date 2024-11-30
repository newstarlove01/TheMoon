<?php
require_once '../app/model/database.php';
require_once './controller/CategoryController.php';
require_once './controller/ProductController.php';
require_once './controller/UserController.php';
require_once './controller/InformationController.php';
function logout()
{
    session_start();
    session_destroy();
    echo '
        <script>
            location.href="../index.php"
        </script>';
}
session_start();
if (!isset($_SESSION['user']['admin']) || $_SESSION['user']['admin'] != 1) {
    header('Location: ../index.php?view=login');
}
$db = new Database();
include_once('../admin/view/header.php');
$view = $_GET['view'] ?? 'home';
switch ($view) {
    case 'logout':
        logout();
        break;
    case 'analytics':
        $analytics = new InformationController();
        $analytics->viewAnalytics();
        break;
    case 'category':
        $cate = new CategoryController();
        $cate->getAllcate();
        break;
    case 'addcate':
        $cate = new CategoryController();
        $cate->viewAdd();
        break;
    case 'insertcate':
        $cate = new CategoryController();
        $cate->addCate();
        break;
    case 'editcate':
        $cate = new CategoryController();
        $cate->viewEdit();
        break;
    case 'edit_cate':
        $cate = new CategoryController();
        $cate->editCate();
        break;
    case 'del_cate':
        $cate = new CategoryController();
        $cate->delCate();
        break;
    case 'product':
        $product = new ProductController();
        $product->getAllPro();
        break;
    case 'addpro':
        $product = new ProductController();
        $product->viewAdd();
        break;
    case 'insertpro':
        $product = new ProductController();
        $product->addPro();
        break;
    case 'editpro':
        $product = new ProductController();
        $product->viewEdit();
        break;
    case 'edit_pro':
        $product = new ProductController();
        $product->editPro();
        break;
    case 'del_pro':
        $product = new ProductController();
        $product->delPro();
        break;
    case 'user':
        $user = new UserController();
        $user->getAllUser();
        break;
    case 'edituser':
        $user = new UserController();
        $user->viewEdit();
        break;
    case 'edit_user':
        $user = new UserController();
        $user->editUser();
        break;
    case 'del_user':
        $user = new UserController();
        $user->delUser();
        break;
    case 'blog':
        $blog = new InformationController();
        $blog->getAllBlog();
        break;
    case 'addblog':
        $blog = new InformationController();
        $blog->viewAddBlog();
        break;
    case 'insertblog':
        $blog = new InformationController();
        $blog->addBlog();
        break;
    case 'editblog':
        $blog = new InformationController();
        $blog->viewEditBlog();
        break;
    case 'edit_blog':
        $blog = new InformationController();
        $blog->editBlog();
        break;
    case 'del_blog':
        $blog = new InformationController();
        $blog->delBlog();
        break;
    default:
        $cate = new CategoryController();
        $cate->getAllcate();
        break;
}

function subword($text, $maxWords, $suffix = '...')
{
    $words = explode(' ', $text);
    if (count($words) > $maxWords) {
        return implode(' ', array_slice($words, 0, $maxWords)) . $suffix;
    }
    return $text;
}
