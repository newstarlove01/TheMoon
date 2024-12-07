<?php
require_once('app/model/ProductModel.php');
require_once('app/model/CartModel.php');
require_once('app/model/UserModel.php');

class CartController
{
    private $product;
    private $cart;
    private $user;
    private $data;
    function __construct()
    {
        $this->product = new ProductModel();
        $this->cart = new CartModel();
        $this->user = new UserModel();
    }
    public function view($view, $data)
    {
        require_once 'app/view/' . $view . '.php';
    }
    function viewcart()
    {
        $this->view('cart', $this->data);
    }
    function viewPayment()
    {
        $email = $_SESSION['user']['email'];
        $this->data['user'] = $this->user->checkmail($email);
        if (is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            if (isset($_SESSION['user'])) {
                $this->view('payment', $this->data);
            } else {
                echo '<script>alert("Bạn cần đăng nhập để thanh toán!");</script>';
                echo '<script>location.href="index.php?view=cart";</script>';
            }
        } else {
            echo '<script>alert("Giỏ hàng của bạn đang trống!");</script>';
            echo '<script>location.href="index.php?view=cart";</script>';
        }
    }
    function addCart()
    {
        if (isset($_POST['cart'])) {
            $id = $_POST['id'];
            $sizeid = $_POST['size'] ?? null;
            $quantity = isset($_POST['quantity']) && is_numeric($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
            $product = $this->product->getIdPro($id);
            $product['img'] = $this->product->getImg($product['id']) ?? [];
            if (isset($sizeid)) {
                $product['sizename'] = $this->product->getSizeName($sizeid);
            }
            if ($product) {
                $product['total_price'] = $product['gia'] * $quantity;
                if ($sizeid) {
                    $product['size'] = $sizeid;
                    if (isset($_SESSION['cart'][$id][$sizeid])) {
                        $_SESSION['cart'][$id][$sizeid]['quantity'] += $quantity;
                        $_SESSION['cart'][$id][$sizeid]['total_price'] = $_SESSION['cart'][$id][$sizeid]['quantity'] * $product['gia']; // Cập nhật tổng tiền
                    } else {
                        $product['quantity'] = $quantity;
                        $_SESSION['cart'][$id][$sizeid] = $product;
                    }
                } else {
                    echo '<script>alert("Hãy chọn size sản phẩm!");</script>';
                }
            } else {
                echo '<script>alert("Sản phẩm không tồn tại!");</script>';
            }

            $total_cart = 0;
            foreach ($_SESSION['cart'] as $product_id) {
                foreach ($product_id as $item) {
                    $total_cart += $item['total_price'];
                }
            }
            $_SESSION['total_cart'] = $total_cart;
        }
        echo '<script>location.href="index.php?view=detail&idcate=' . $product['id_dm'] . '&id=' . $id . '";</script>';
    }
    function increase()
    {
        $id = $_GET['id'];
        $sizeid = $_GET['sizeid'];
        $product = $this->product->getIdPro($id);
        $_SESSION['cart'][$id][$sizeid]['quantity'] += 1;
        $_SESSION['cart'][$id][$sizeid]['total_price'] = $_SESSION['cart'][$id][$sizeid]['quantity'] * $product['gia'];

        $total_cart = 0;
        foreach ($_SESSION['cart'] as $product_id) {
            foreach ($product_id as $item) {
                $total_cart += $item['total_price'];
            }
        }
        $_SESSION['total_cart'] = $total_cart;
        echo '<script>location.href="index.php?view=cart";</script>';
    }
    function decrease()
    {
        $id = $_GET['id'];
        $sizeid = $_GET['sizeid'];
        $product = $this->product->getIdPro($id);
        if ($_SESSION['cart'][$id][$sizeid]['quantity'] > 1) {
            $_SESSION['cart'][$id][$sizeid]['quantity'] -= 1;
        }
        $_SESSION['cart'][$id][$sizeid]['total_price'] = $_SESSION['cart'][$id][$sizeid]['quantity'] * $product['gia'];

        $total_cart = 0;
        foreach ($_SESSION['cart'] as $product_id) {
            foreach ($product_id as $item) {
                $total_cart += $item['total_price'];
            }
        }
        $_SESSION['total_cart'] = $total_cart;
        echo '<script>location.href="index.php?view=cart";</script>';
    }
    function remove()
    {
        $id = $_GET['id'];
        $sizeid = $_GET['sizeid'];
        if (isset($_SESSION['cart'][$id][$sizeid])) {
            unset($_SESSION['cart'][$id][$sizeid]);
            $total_cart = 0;
            foreach ($_SESSION['cart'] as $product_id) {
                foreach ($product_id as $item) {
                    $total_cart += $item['total_price'];
                }
            }
            $_SESSION['total_cart'] = $total_cart;
            if (empty($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);

                $total_cart = 0;
                foreach ($_SESSION['cart'] as $product_id) {
                    foreach ($product_id as $item) {
                        $total_cart += $item['total_price'];
                    }
                }
                $_SESSION['total_cart'] = $total_cart;
            }
            echo '<script>location.href="index.php?view=cart";</script>';
        } else {
            echo '<script>alert("Sản phẩm không có trong giỏ hàng!"); location.href="index.php?view=cart";</script>';
        }
    }
    function removeall()
    {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);

            $total_cart = 0;
            foreach ($_SESSION['cart'] as $product_id) {
                foreach ($product_id as $item) {
                    $total_cart += $item['total_price'];
                }
            }
            $_SESSION['total_cart'] = $total_cart;
            echo '<script>location.href="index.php?view=cart";</script>';
        } else {
            echo '<script>alert("Giỏ hàng của bạn đang trống!"); location.href="index.php?view=cart";</script>';
        }
    }
    function checkDiscount()
    {
        if (isset($_POST['sub'])) {
            $discount = $_POST['discount'];
            $_SESSION['discount'] = $this->cart->checkDiscount($discount);
            $total = $_SESSION['total_cart'];
            if (is_array($_SESSION['discount']) && !empty($_SESSION['discount'])) {
                if ($_SESSION['discount']['loai_km'] == 'phan_tram') {
                    $_SESSION['discount']['sotien'] = $total * (1 / $_SESSION['discount']['gia_tri_km']);
                    $total = $total - $_SESSION['discount']['sotien'];
                } else {
                    $_SESSION['discount']['sotien'] = $_SESSION['discount']['gia_tri_km'];
                    $total = $total - $_SESSION['discount']['gia_tri_km'];
                }
                $_SESSION['discount']['ten'] = $discount;
            } else {
                $total = $total;
                echo '<script>alert("Mã khuyến mãi không hợp lệ hoặc hết hạn sử dụng!");</script>';
            }
            $_SESSION['total_pay'] = $total;
        }
        echo '<script>location.href="index.php?view=payment";</script>';
    }
    function addPayment()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['userid'] = $_POST['userid'];
            $data['discount'] =  $_SESSION['discount']['id'] ?? null;
            $data['total_product'] = $_SESSION['total_cart'];
            $data['total_discount'] =  $_SESSION['discount']['sotien'] ?? [];
            $data['total'] = $_SESSION['total_pay'];
            $data['address'] = $_POST['address'] . ', ' . $_POST['city'];
            $data['payment'] = $_POST['payment'];

            $this->cart->insertOrder($data);
            unset($_SESSION['discount']);
            unset($_SESSION['cart']);
            unset($_SESSION['total_cart']);
            unset($_SESSION['total_pay']);
            echo '<script>alert("Đơn hàng đã được đặt thành công!");</script>';
            echo '<script>location.href="index.php?view=profile";</script>';
        }
    }
    function deactiveOrder(){
        $id = $_POST['orderid'];
        $status = 'Đã huỷ';
        $this->cart->settingOrder($status,$id); 
        echo '<script>alert("Đơn hàng đã được huỷ thành công!");</script>';
        echo '<script>location.href="index.php?view=profile";</script>';
    }
}
