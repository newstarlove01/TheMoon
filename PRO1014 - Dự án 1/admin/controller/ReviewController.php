<?php
require_once('../app/model/UserModel.php');
require_once('../app/model/ProductModel.php');

class ReviewController
{
    private $data;
    private $product;
    private $user;

    function __construct()
    {
        $this->user = new UserModel();
        $this->product = new ProductModel();
    }
    function renderview($view, $data = null)
    {
        $view = './view/' . $view . '.php';
        require_once $view;
    }
    function getAllReview()
    {
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        $totalProducts = $this->product->getCountAllReview();
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;
        $this->data['review'] = $this->product->getAllReview($itemsPerPage, $offset);
        
        foreach ($this->data['review'] as &$review) {
            $review['user'] = $this->user->getIdUser($review['id_kh']);
            $review['product'] = $this->product->getIdPro($review['id_sp']);
        }
        $this->renderview('review', $this->data);
    }
    function hideReview()
    {
        $data = [];
        $data['id'] = $_GET['id'];
        $data['status'] = 0;
        $this->product->reviewStatus($data);
        $this->getAllReview();
    }
    function showReview()
    {
        $data = [];
        $data['id'] = $_GET['id'];
        $data['status'] = 1;
        $this->product->reviewStatus($data);
        $this->getAllReview();
    }
}
