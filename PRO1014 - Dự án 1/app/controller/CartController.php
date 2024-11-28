<?php
require_once('app/model/ProductModel.php');
require_once('app/model/CartModel.php');

class CartController
{
    private $product;
    private $cart;
    private $data;
    function __construct()
    {
        $this->product = new ProductModel();
        $this->cart = new CartModel();
    }
    public function view($view, $data)
    {
        require_once 'app/view/' . $view . '.php';
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

    function viewcart()
    {
        $this->view('cart', $this->data);
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
}
