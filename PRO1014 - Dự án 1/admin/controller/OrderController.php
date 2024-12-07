<?php
require_once('../app/model/CartModel.php');
require_once('../app/model/ProductModel.php');
require_once('../app/model/UserModel.php');

class OrderController
{
    private $data;
    private $cart;
    private $product;
    private $user;

    function __construct()
    {
        $this->cart = new CartModel();
        $this->product = new ProductModel();
        $this->user = new UserModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function getAllOrder()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $totalProducts = $this->cart->getCountAllOrder();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;  // Truyền biến tổng số trang

        $order = $this->cart->getAllOrder($offset, $itemsPerPage);
        foreach ($order as &$detail) {
            $detail['user'] = $this->user->getIdUser($detail['id_kh']);
            $detail['detail'] = $this->cart->getUserOrderDetail($detail['id']);
            foreach ($detail['detail'] as &$product) {
                $product['product'] = $this->product->getIdPro($product['id_sp']);
            }
            if ($detail['id_km'] != "") {
                $detail['discount'] = $this->cart->getIdDiscount($detail['id_km']);
            }
        }
        $this->data['order'] = $order;
        $this->renderview('order', $this->data);
    }
    function confirmOrder()
    {
        $id = $_GET['id'];
        $status = "Đã xác nhận";
        $this->cart->settingOrder($status, $id);
        echo '<script>alert("Đã xác nhận đơn hàng!");</script>';
        $this->getAllOrder();
    }
    function delOrder()
    {
        $id = $_GET['id'];
        $this->cart->deleteOrder($id);
        echo '<script>alert("Đã xoá đơn hàng thành công!");</script>';
        $this->getAllOrder();
    }
}
