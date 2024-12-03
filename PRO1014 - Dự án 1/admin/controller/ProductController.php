<?php
require_once('../app/model/CategoryModel.php');
require_once('../app/model/ProductModel.php');

class ProductController
{
    private $data;
    private $category;
    private $product;

    function __construct()
    {
        $this->category = new CategoryModel();
        $this->product = new ProductModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function viewAdd()
    {
        $this->data['cate'] = $this->category->getCate();
        $this->renderview('add_pro', $this->data);
    }
    function viewEdit()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['cate'] = $this->category->getCate();
            $this->data['detail_pro'] = $this->product->getIdPro($id);
            $this->data['detail_pro']['img'] = $this->product->getImg($this->data['detail_pro']['id']) ?? [];
            $this->renderview('edit_pro', $this->data);
        }
    }
    function getAllPro()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $this->data['pro'] = $this->product->getAllPro($offset, $itemsPerPage);
        $totalProducts = $this->product->getCountAllPro();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;  // Truyền biến tổng số trang

        foreach ($this->data['pro'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? [];
            $product['cate'] = $this->category->getIdcate($product['id_dm']) ?? [];
        }

        $this->renderview('product', $this->data);
    }
    function addPro()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['idcate'] = $_POST['cate'];
            $data['name'] = $_POST['name'];
            $data['price'] = $_POST['price'];
            $data['description'] = $_POST['description'];
            $data['amount'] = $_POST['amount'];
            $data['hot'] = $_POST['hot'];
            $data['material'] = $_POST['material'];
            $data['anh_chinh'] = $_FILES["anh_chinh"]["name"];
            $file = '../img/' . $data['anh_chinh'];
            move_uploaded_file($_FILES['anh_chinh']['tmp_name'], $file);
            $data['album1'] = $_FILES["album1"]["name"];
            $file = '../img/' . $data['album1'];
            move_uploaded_file($_FILES['album1']['tmp_name'], $file);
            $data['album2'] = $_FILES["album2"]["name"];
            $file = '../img/' . $data['album2'];
            move_uploaded_file($_FILES['album2']['tmp_name'], $file);
            $data['album3'] = $_FILES["album3"]["name"];
            $file = '../img/' . $data['album3'];
            move_uploaded_file($_FILES['album3']['tmp_name'], $file);
            $this->product->insertPro($data);
        }
        echo '<script>alert("Thêm sản phẩm thành công");</script>';
        echo '<script>location.href="index.php?view=product";</script>';
    }
    function editPro()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['idcate'] = $_POST['cate'];
            $data['name'] = $_POST['name'];
            $data['price'] = $_POST['price'];
            $data['description'] = $_POST['description'];
            $data['amount'] = $_POST['amount'];
            $data['hot'] = $_POST['hot'];
            $data['material'] = $_POST['material'];
            $data['status'] = $_POST['status'];
            $data['id'] = $_POST['idpro'];

            $data['anh_chinh'] = $_FILES['anh_chinh']['name'];
            $data['anh_chinh_old'] = $_POST['anh_chinh_old'];
            if ($data['anh_chinh'] == "") {
                $data['anh_chinh'] = $data['anh_chinh_old'];
            } else {
                $file = '../img/' . $data['anh_chinh'];
                move_uploaded_file($_FILES['anh_chinh']['tmp_name'], $file);
                $file_old = '../img/' . $data['anh_chinh_old'];
                unlink($file_old);
            }

            $data['album1'] = $_FILES['album1']['name'];
            $data['album1_old'] = $_POST['album1_old'];
            if ($data['album1'] == "") {
                $data['album1'] = $data['album1_old'];
            } else {
                $file = '../img/' . $data['album1'];
                move_uploaded_file($_FILES['album1']['tmp_name'], $file);
                $file_old = '../img/' . $data['album1_old'];
                unlink($file_old);
            }

            $data['album2'] = $_FILES['album2']['name'];
            $data['album2_old'] = $_POST['album2_old'];
            if ($data['album2'] == "") {
                $data['album2'] = $data['album2_old'];
            } else {
                $file = '../img/' . $data['album2'];
                move_uploaded_file($_FILES['album2']['tmp_name'], $file);
                $file_old = '../img/' . $data['album2_old'];
                unlink($file_old);
            }

            $data['album3'] = $_FILES['album3']['name'];
            $data['album3_old'] = $_POST['album3_old'];
            if ($data['album3'] == "") {
                $data['album3'] = $data['album3_old'];
            } else {
                $file = '../img/' . $data['album3'];
                move_uploaded_file($_FILES['album3']['tmp_name'], $file);
                $file_old = '../img/' . $data['album3_old'];
                unlink($file_old);
            }


            $this->product->updatePro($data);
            echo '<script>alert("Cập nhật sản phẩm thành công");</script>';
            echo '<script>location.href="index.php?view=product";</script>';
        }
    }
    function delPro()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $product = $this->product->getIdPro($id);

            if ($product['so_luong'] > 0 && $product['trang_thai'] == 1) {
                echo '<script>alert("Không thể xoá sản phẩm! - Đang còn số lượng là '.$product['so_luong'].' - Trạng thái là '.$product['trang_thai'].'");</script>';
            } else {
                $data = $this->product->getImg($id);
                $imagePaths = [
                    '../img/' . $data[0]['anh_chinh'],
                    '../img/' . $data[0]['album1'],
                    '../img/' . $data[0]['album2'],
                    '../img/' . $data[0]['album3']
                ];

                // Xóa file nếu tồn tại
                foreach ($imagePaths as $file) {
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
                $this->product->deletePro($id);
                echo '<script>alert("Xoá sản phẩm thành công");</script>';
            }

            echo '<script>location.href="index.php?view=product";</script>';
        }
    }
}
