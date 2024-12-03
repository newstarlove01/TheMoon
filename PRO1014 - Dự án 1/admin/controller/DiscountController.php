<?php
require_once('../app/model/CartModel.php');

class DiscountController
{
    private $data;
    private $cart;

    function __construct()
    {
        $this->cart = new CartModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function viewAddDiscount()
    {
        $this->renderview('add_discount');
    }
    function viewEditDiscount()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['detail_discount'] = $this->cart->getIdDiscount($id);
            $this->renderview('edit_discount', $this->data);
        }
    }
    function getAllDiscount()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $totalProducts = $this->cart->getCountAllDiscount();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;
        $this->data['discount'] = $this->cart->getAllDiscount($itemsPerPage, $offset);

        $this->renderview('discount', $this->data);
    }
    function addDiscount()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['description'] = $_POST['description'];
            $data['type'] = $_POST['type'];
            $data['value'] = $_POST['value'];
            $data['start'] = $_POST['start'];
            $data['end'] = $_POST['end'];

            $this->cart->insertDiscount($data);
            echo '<script>alert("Thêm khuyến mãi thành công");</script>';
            echo '<script>location.href="index.php?view=discount";</script>';
        }
    }
    function editDiscount()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['id'] = $_POST['id'];
            $data['name'] = $_POST['name'];
            $data['description'] = $_POST['description'];
            $data['type'] = $_POST['type'];
            $data['value'] = $_POST['value'];
            $data['status'] = $_POST['status'];
            $data['start'] = $_POST['start'];
            $data['end'] = $_POST['end'];

            $this->cart->updateDiscount($data);
            echo '<script>alert("Cập nhật khuyến mãi thành công");</script>';
            echo '<script>location.href="index.php?view=discount";</script>';

        }
    }
}
