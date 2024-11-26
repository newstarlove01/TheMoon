<?php
require_once '../app/model/database.php';
require_once './controller/CategoryController.php';
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
    case 'category':
        $cate = new CategoryController();
        $cate->getAllcate();
    default:
        $cate = new CategoryController();
        $cate->getAllcate();
}
