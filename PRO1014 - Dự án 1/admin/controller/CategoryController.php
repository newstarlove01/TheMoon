<?php
require_once ('../app/model/CategoryModel.php');
require_once ('../app/model/ProductModel.php');

class CategoryController
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
    function getAllcate()
    {
        $this->data['cate'] = $this->category->getCate();
        $this->renderview('category', $this->data);
    }
    function viewAdd()
    {
        $this->renderview('addcate');
    }
    function viewEdit()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['detail_cate'] = $this->category->getIdCate($id);
            $this->renderview('editcate', $this->data);
        }
        // $this->renderview('editcate', $this->data);
    }
    function addCate()
    {
        if (isset($_POST['subi'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['image'] = $_FILES["image"]["name"];
            $file = '../img/' . $data['image'];
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            $this->category->insertCate($data);
            echo '<script>alert("Thêm danh mục thành công");</script>';
            echo '<script>location.href="index.php?page=category";</script>';
        }
    }

    function editCate()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['image'] = $_FILES['image']['name'];
            $data['id'] = $_POST['idcate'];
            $data['image_old'] = $_POST['image_old'];
            if ($data['image'] == "") {
                $data['image'] = $data['image_old'];
            } else {
                $file = '../img/' . $data['image'];
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
                $file_old = '../img/' . $data['image_old'];
                unlink($file_old);
            }
            $this->category->updateCate($data);
            echo '<script>alert("Cập nhật danh mục thành công");</script>';
            echo '<script>location.href="index.php?page=category";</script>';
        }
    }

    // function delCate()
    // {
    //     if (isset($_GET['id']) && ($_GET['id'])) {
    //         $id = $_GET['id'];
    //         $data = $this->product->get_all_cate_pro($id);
    //         if (count($data) > 0) {
    //             echo '<script>alert("Danh mục đang chứa ' . count($data) . ' sản phẩm");</script>';
    //             echo '<script>location.href="index.php?page=category";</script>';
    //         } else {
    //             $cate = $this->category->getIdcate($id);
    //             $file = '../img/' . $cate['image'];
    //             unlink($file);
    //             $this->category->delCate($id);
    //             echo '<script>alert("Xoá danh mục thành công");</script>';
    //             echo '<script>location.href="index.php?page=category";</script>';
    //         }
    //     }
    // }
}
