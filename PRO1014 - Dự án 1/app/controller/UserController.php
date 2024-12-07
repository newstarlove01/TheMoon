<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/src/Exception.php';
require 'phpMailer/src/PHPMailer.php';
require 'phpMailer/src/SMTP.php';

require_once('app/model/UserModel.php');
require_once('app/model/CartModel.php');
require_once('app/model/ProductModel.php');
class UserController
{
    private $user;
    private $cart;
    private $product;
    private $data;
    function __construct()
    {
        $this->user = new UserModel();
        $this->cart = new CartModel();
        $this->product = new ProductModel();
    }
    function renderview($view, $data = null)
    {
        // extract($data)   
        $view = 'app/view/' . $view . '.php';
        require_once $view;
    }

    function viewlogin()
    {
        $this->renderView('login');
    }
    function viewregister()
    {
        $this->renderView('register');
    }
    function viewpassword()
    {
        $this->renderView('password');
    }
    function viewchangepass()
    {
        $this->renderView('changepass');
    }
    function viewprofile()
    {
        $email = $_SESSION['user']['email'];
        $this->data['user'] = $this->user->checkmail($email);
        $this->data['order'] = $this->cart->getUserOrder($this->data['user']['id']) ?? [];
        foreach ($this->data['order'] as $key => $order) {
            $this->data['order'][$key]['detail'] = $this->cart->getUserOrderDetail($order['id']);
            foreach ($this->data['order'][$key]['detail'] as $detailKey => $detail) {
                // Retrieve product information
                $detail['product'] = $this->product->getIdPro($detail['id_sp']);
                $detail['img'] = $this->product->getImg($detail['id_sp']);
                
                // Update the detail with product info
                $this->data['order'][$key]['detail'][$detailKey] = $detail;
            }
        }
        
        $this->renderView('profile', $this->data);
    }
    function check()
    {
        if (isset($_POST['sub'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->user->checkUser($email, $password);
            if (is_array($result)) {
                if ($result['trang_thai'] == 1) {
                    $_SESSION['user'] = $result;
                    if ($result['admin'] == 1) {
                        header('location:admin/index.php');
                    } else {
                        echo '<script>alert("Đăng nhập thành công - Chào mừng ' . $_SESSION['user']['ten'] . ' ' . $_SESSION['user']['ho'] . '!");</script>';
                        echo '<script>location.href="index.php"</script>';
                    }
                } else {
                    echo '<script>alert("Tài khoản đã bị khoá!");</script>';
                    //     echo '<script>
                    //     window.historyback()
                    // </script>';
                    echo '
                <script>
                    location.href="index.php?view=login"
                </script>';
                }
            } else {
                echo '    
                <script>
                    alert("Đăng nhập thất bại - Sai thông tin hoặc chưa có tài khoản, Xin vui lòng đăng ký!");
                </script>';
                echo '
                <script>
                    location.href="index.php?view=login"
                </script>';
            }
        }
    }
    function addUser()
    {
        if (isset($_POST['sub'])) {
            $data = [];
            $data['ho'] = $_POST['firstname'];
            $data['ten'] = $_POST['lastname'];
            $data['email'] = $_POST['email'];
            $data['mat_khau'] = $_POST['password'];
            $data['mat_khau_moi'] = $_POST['repassword'];

            $_SESSION['old_data'] = [
                'firstname' => $data['ho'],
                'lastname' => $data['ten'],
                'email' => $data['email']
            ];
            $result = $this->user->checkmail($data['email']);
            if ($result) {
                echo '    
                <script>
                    alert("Email đã tồn tại - Vui lòng nhập lại email!");
                </script>';
                echo '
                <script>
                    location.href="index.php?view=register"
                </script>';
            } else {
                if ($data['mat_khau'] === $data['mat_khau_moi']) {
                    unset($_SESSION['old_data']);
                    $this->user->insertUser($data);
                    echo '    
                    <script>
                        alert("Đăng ký thành công!");
                    </script>';
                    echo '
                    <script>
                        location.href="index.php?view=login"
                    </script>';
                } else {
                    echo '    
                    <script>
                        alert("Đăng ký thất bại! Mật khẩu nhập lại không đúng.");
                    </script>';
                    echo '
                    <script>
                        location.href="index.php?view=register"
                    </script>';
                }
            }
        }
    }
    function logout()
    {
        unset($_SESSION['user']);
        echo '
        <script>
            location.href="index.php?view=home"
        </script>';
    }
    function checkmail()
    {
        if (isset($_POST['sub'])) {
            $email = $_POST['email'];
            $result = $this->user->checkmail($email);
            if (is_array($result)) {
                $_SESSION['email'] = $email;
                $reset_code = random_int(100000, 999999);
                $this->user->updateResetCode($email, $reset_code);

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'thanhphuc2005.work@gmail.com';
                $mail->Password = 'oyrtccvhnukedlsn';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('thanhphuc2005.work@gmail.com');

                $mail->addAddress($email);

                $mail->isHTML(true);

                $mail->Subject = "Verffication code";
                $mail->Body = $reset_code;

                $mail->send();
                echo '    
                <script>
                    alert("Đã gửi mã khôi phục đến ' . $email . '!");
                </script>';
                echo '<script>location.href="index.php?view=changepass"</script>';
            } else {
                echo '    
                <script>
                    alert("Email không tồn tại!");
                </script>';
                echo '
                <script>
                    location.href="index.php?view=password"
                </script>';
            }
        }
    }
    function checkpass()
    {
        if (isset($_POST['sub'])) {
            $data['email'] = $_SESSION['email'];
            $result = $this->user->checkmail($data['email']);
            $reset_code = $_POST['resetcode'];
            $data['newpass'] = $_POST['newpass'];
            $data['renewpass'] = $_POST['renewpass'];
            if ($reset_code == $result['reset_code']) {
                if ($data['newpass'] === $data['renewpass']) {
                    $this->user->updateUser($data);
                    echo '    
                <script>
                    alert("Đổi mật khẩu thành công!");
                </script>';
                    echo '
                <script>
                    location.href="index.php?view=login"
                </script>';
                } else {
                    echo '    
                <script>
                    alert("Mật khẩu nhập lại không giống!");
                </script>';
                    echo '
                <script>
                    location.href="index.php?view=changepass"
                </script>';
                }
            } else {
                echo '    
                <script>
                    alert("Mã xác nhận không đúng! Vui lòng nhập lại");
                </script>';
                echo '
                <script>
                    location.href="index.php?view=changepass"
                </script>';
            }
        }
    }
    function editprofile()
    {
        if (isset($_POST['sub'])) {
            $data['idprofile'] = $_POST['id'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['email'] =  $_POST['email'];
            $data['sdt'] = $_POST['sdt'];
            $data['address'] = $_POST['address'];
            $data['image'] = $_FILES['image']['name'];
            $data['image_old'] = $_POST['image_old'];
            if ($data['image'] == "") {
                $data['image'] = $data['image_old'];
            } else {
                $file = './img/' . $data['image'];
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
                $file_old = './img/' . $data['image_old'];
                unlink($file_old);
            }
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $data['email'];
            $this->user->updateProfile($data);
            $this->data['user'] = $this->user->checkmail($data['email']);

            $result = $this->user->checkUser($_SESSION['email'], $_SESSION['password']);
            $_SESSION['user'] = $result;
            echo '    
            <script>
                alert("Đổi thông tin thành công!");
            </script>';
            echo '
            <script>
                location.href="index.php?view=profile"
            </script>';
        }
    }
    function changepassprofile()
    {
        if (isset($_POST['sub'])) {
            $email = $_POST['email'];
            $data['email'] = $email;
            $result = $this->user->checkmail($email);
            $oldpass = $_POST['oldpass'];
            $data['newpass'] = $_POST['newpass'];
            $data['renewpass'] = $_POST['renewpass'];
            if (is_array($result)) {
                $_SESSION['email'] = $email;
            }
            if ($result['mat_khau'] === $oldpass) {
                if ($data['newpass'] === $data['renewpass']) {
                    $this->user->updateUser($data);
                    echo '    
                <script>
                    alert("Đổi mật khẩu thành công!");
                </script>';
                } else {
                    echo '    
                <script>
                    alert("Mật khẩu nhập lại không giống!");
                </script>';
                }
            } else {
                echo '    
                <script>
                    alert("Mật khẩu cũ không đúng! Vui lòng nhập lại");
                </script>';
            }
            echo '
            <script>
                location.href="index.php?view=profile"
            </script>';
        }
    }
}
