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

        $this->data['order'] = $this->cart->getAllOrder($offset, $itemsPerPage);
        foreach ($this->data['order'] as &$order) {
            $order['user'] = $this->user->getIdUser($order['id_kh']);
            $order['discount'] = $this->cart->getIdDiscount($order['id_km']);
        }
        $this->renderview('order', $this->data);
    }
    function confirmOrder(){
        $id = $_GET['id'];
        $this->cart->confirmOrder($id);
        $this->getAllOrder();
    }
}
