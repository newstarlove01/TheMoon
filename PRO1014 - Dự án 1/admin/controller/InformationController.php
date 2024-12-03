<?php
require_once('../app/model/InformationModel.php');
require_once('../app/model/CategoryModel.php');
require_once('../app/model/ProductModel.php');

class InformationController
{
    private $data;
    private $information;
    private $category;
    private $product;

    function __construct()
    {
        $this->information = new InformationModel();
        $this->category = new CategoryModel();
        $this->product = new ProductModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function viewAnalytics()
    {
        $this->data['cate'] = $this->category->getCate();
        foreach ($this->data['cate'] as $c) {
            $pro = $this->product->check_cate_pro($c['id']);
            $this->data['pro'][$c['id']] = count($pro);
        }
        $this->renderview('analytics',$this->data);
    }
    function viewAddBlog()
    {
        $this->renderview('add_blog');
    }
    function viewEditBlog()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['detail_blog'] = $this->information->getIdBLog($id);
            $this->renderview('edit_blog', $this->data);
        }
    }
    function getAllBlog()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $this->data['blog'] = $this->information->getBLog();
        $totalProducts = $this->information->getCountAllBlog();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;  // Truyền biến tổng số trang

        $this->renderview('blog', $this->data);
    }
    function addBlog()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['image'] = $_FILES["image"]["name"];
            $file = '../img/' . $data['image'];
            move_uploaded_file($_FILES['image']['tmp_name'], $file);
            $this->information->insertBlog($data);
            echo '<script>alert("Thêm bài viết thành công");</script>';
            echo '<script>location.href="index.php?view=blog";</script>';
        }
    }
    function editBlog()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['name'] = $_POST['name'];
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['image'] = $_FILES['image']['name'];
            $data['id'] = $_POST['idblog'];
            $data['image_old'] = $_POST['image_old'];
            if ($data['image'] == "") {
                $data['image'] = $data['image_old'];
            } else {
                $file = '../img/' . $data['image'];
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
                $file_old = '../img/' . $data['image_old'];
                unlink($file_old);
            }
            $this->information->updateBlog($data);
            echo '<script>alert("Cập nhật bài viết thành công");</script>';
            echo '<script>location.href="index.php?view=blog";</script>';
        }
    }
    function delBlog()
    {
        if (isset($_GET['id']) && ($_GET['id'])) {
            $id = $_GET['id'];
            $blog = $this->information->getIdblog($id);
            $file = '../img/' . $blog['image'];
            unlink($file);
            $this->information->delBlog($id);
            echo '<script>alert("Xoá bài viết thành công");</script>';
            echo '<script>location.href="index.php?view=blog";</script>';
        }
    }
}
