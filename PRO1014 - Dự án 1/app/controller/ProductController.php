<?php
require_once('app/model/CategoryModel.php');
require_once('app/model/ProductModel.php');
require_once('app/model/UserModel.php');
class ProductController
{
    private $product;
    private $category;
    private $user;
    private $data;
    //$data = {dsdm: [], dssp: []}
    function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        $this->user = new UserModel();
    }
    public function view($view, $data)
    {
        require_once 'app/view/' . $view . '.php';
    }
    public function product()
    {
        // Kiểm tra xem có từ khóa tìm kiếm hay không
        $searchKeyword = isset($_GET['search']) ? trim($_GET['search']) : '';
        $idCategory = isset($_GET['idcate']) ? (int)$_GET['idcate'] : 0;

        // Lấy trang hiện tại và số sản phẩm trên mỗi trang
        $currentPage = isset($_GET['page']) ? max((int)$_GET['page'], 1) : 1;
        $itemsPerPage = 9;
        $offset = ($currentPage - 1) * $itemsPerPage;

        // Truy vấn và xử lý tìm kiếm hoặc theo danh mục
        if ($searchKeyword) {
            // Nếu có từ khóa tìm kiếm
            $totalProducts = $this->product->get_count_search($searchKeyword);
            $this->data['dssp'] = $this->product->getSearch($searchKeyword, $itemsPerPage, $offset);
            $this->data['searchKeyword'] = $searchKeyword; // Truyền từ khóa tìm kiếm vào view
        } elseif ($idCategory > 0) {
            // Nếu có danh mục, tìm sản phẩm theo danh mục
            $totalProducts = $this->product->get_count_cate_pro($idCategory);
            $this->data['dssp'] = $this->product->get_all_cate_pro($idCategory, $offset, $itemsPerPage);
            $this->data['dm'] = $this->category->getIdcate($idCategory);
            $this->data['size'] = $this->product->getSize($idCategory);
        } else {
            // Nếu không có cả từ khóa tìm kiếm và danh mục, không làm gì
            $this->data['dssp'] = [];
            $totalProducts = 0;
        }

        // Tính tổng số trang
        $totalPages = ceil($totalProducts / $itemsPerPage);
        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;

        // Lặp qua sản phẩm để lấy ảnh
        foreach ($this->data['dssp'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? [];
        }

        // Gọi view để hiển thị
        $this->view('product', $this->data);
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

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Nếu không có trang, sử dụng trang 1
        $itemsPerPage = 4;  // Số sản phẩm mỗi trang
        $offset = ($currentPage - 1) * $itemsPerPage; // Tính offset dựa trên trang hiện tại

        $totalProducts = $this->product->getCountReview($id);
        $totalPages = ceil($totalProducts / $itemsPerPage);

        $this->data['currentPage'] = $currentPage;
        $this->data['totalPages'] = $totalPages;  // Truyền biến tổng số trang

        $this->data['dm'] = $this->category->getIdcate($idcate);
        $this->data['size'] = $this->product->getSizeDetail($id);
        $this->data['review'] = $this->product->getAllReviewId($id, $offset, $itemsPerPage);
        foreach ($this->data['review'] as &$review) {
            $review['user'] = $this->user->getIdUser($review['id_kh']) ?? [];
        }
        $this->data['dssplq'] = $this->product->getRelatePro($id);
        foreach ($this->data['dssplq'] as &$product) {
            $product['img'] = $this->product->getImg($product['id']) ?? [];
        }
        $result = $this->product->getIdPro($id);
        $spct = $this->product->getIdPro($id);
        if (is_array($spct)) {
            $this->data['spct'] = $spct;
            $this->data['spct']['img'] = $this->product->getImg($this->data['spct']['id']) ?? [];
            $this->view('detail', $this->data);
        } else {
            return "Khong co san pham nay";
        }
    }

    function addReview()
    {
        if (isset($_POST['sub'])) {
            $idpro = $_POST['productid'];
            $product = $this->product->getIdPro($idpro);
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user'];
                $order = $this->product->checkOrder($user['id'], $idpro);
                $review = $this->product->checkReview($user['id'], $idpro);
                if (is_array($order) && !empty($order)) {
                    if (is_array($review) && !empty($review)) {
                        echo '    
                        <script>
                            alert("Bạn đã đánh giá sản phẩm này rồi");
                        </script>';
                    } else {
                        $data = [];
                        $data['userid'] = $user['id'];
                        $data['productid'] = $idpro;
                        $data['rate'] = $_POST['rate'];
                        $data['content'] = $_POST['content'];
                        $data['file'] = $_FILES["file"]["name"];
                        $file = './img/' . $data['file'];
                        move_uploaded_file($_FILES['file']['tmp_name'], $file);

                        $this->product->addReview($data);
                    }
                    echo '
                        <script>
                            location.href="index.php?view=detail&idcate=' . $product['id_dm'] . '&id=' . $idpro . '"
                        </script>';
                } else {
                    echo '    
                <script>
                    alert("Bạn cần mua hàng để đánh giá");
                </script>';
                    echo '
                <script>
                    location.href="index.php?view=detail&idcate=' . $product['id_dm'] . '&id=' . $idpro . '"
                </script>';
                }
            } else {
                echo '    
            <script>
                alert("Bạn cần đăng nhập tài khoản để đánh giá");
            </script>';
                echo '
            <script>
                location.href="index.php?view=detail&idcate=' . $product['id_dm'] . '&id=' . $idpro . '"
            </script>';
            }
        }
    }
}
