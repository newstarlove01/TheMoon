<?php
require_once('app/model/CategoryModel.php');
require_once('app/model/ProductModel.php');
class ProductController
{
    private $product;
    private $category;
    private $data;
    //$data = {dsdm: [], dssp: []}
    function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
    }
    public function view($view, $data)
    {
        require_once 'app/view/' . $view . '.php';
    }

    function product()
    {
        if (isset($_GET['idcate']) && $_GET['idcate'] > 0) {
            $id = $_GET['idcate'];
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Nếu không có trang, sử dụng trang 1
            $itemsPerPage = 9;  // Số sản phẩm mỗi trang
            $offset = ($currentPage - 1) * $itemsPerPage; // Tính offset dựa trên trang hiện tại

            $this->data['dm'] = $this->category->getIdcate($id);
            $this->data['size'] = $this->product->getSize($id);
            $this->data['dssp'] = $this->product->get_all_cate_pro($id, $offset, $itemsPerPage);

            $totalProducts = $this->product->get_count_cate_pro($id);
            $totalPages = ceil($totalProducts / $itemsPerPage);

            $this->data['currentPage'] = $currentPage;
            $this->data['totalPages'] = $totalPages;  // Truyền biến tổng số trang

            // Lặp qua sản phẩm để lấy ảnh
            foreach ($this->data['dssp'] as &$product) {
                $product['img'] = $this->product->getImg($product['id']) ?? [];
            }

            // Gọi view để hiển thị
            $this->view('product', $this->data);
        }
    }

    function detail()
    {
        if (isset($_GET['idcate'])) {
            $idcate = $_GET['idcate'];
        } else {
            $idcate = 0;
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 0;
        }
        $this->data['dm'] = $this->category->getIdcate($idcate);
        $this->data['size'] = $this->product->getSizeDetail($id);
        $this->data['dssplq'] = $this->product->getRelatePro($id);
        foreach ($this->data['dssplq'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? [];
        }
        $result = $this->product->getIdPro($id);
        // $this->data['dsspdm'] = $this->product->get_cate_pro($id, $result['idcate']);
        $spct = $this->product->getIdPro($id);
        if (is_array($spct)) {
            $this->data['spct'] = $spct;
            $this->data['spct']['img'] = $this->product->getImg($this->data['spct']['id']) ?? [];
            $this->view('detail', $this->data);
        } else {
            return "Khong co san pham nay";
        }
    }
}
