<?php
require_once('../app/model/UserModel.php');

class UserController
{
    private $data;
    private $user;

    function __construct()
    {
        $this->user = new UserModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function viewEdit()
    {
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $id = $_GET['id'];
            $this->data['detail_user'] = $this->user->getIdUser($id);
            $this->renderview('edit_user', $this->data);
        }
    }
    function getAllUser()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $this->data['user'] = $this->user->getAllUser();
        $totalProducts = $this->user->getCountAllUser();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;  // Truyền biến tổng số trang
        $this->renderview('user', $this->data);
    }
    function editUser()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['id'] = $_POST['iduser'];
            $data['status'] = $_POST['status'];
            $data['admin'] = $_POST['admin'];

            $this->user->updateUserAdmin($data);
            echo '<script>alert("Cập nhật người dùng thành công");</script>';
            echo '<script>location.href="index.php?view=user";</script>';
        }
    }
}
