<?php
require_once('app/model/UserModel.php');
class UserController
{
    private $user;
    private $data;
    function __construct()
    {
        $this->user = new UserModel();
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
    function check()
    {
        if (isset($_POST['sub'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = $this->user->checkUser($email, $password);
            $_SESSION['user'] = $result;
            if (is_array($result)) {
                if ($result['admin'] == 1) {
                    header('location:admin/index.php');
                } else {
                    echo '<script>alert("Đăng nhập thành công - Chào mừng ' . $_SESSION['user']['ten'] . ' ' . $_SESSION['user']['ho'] . '!");</script>';
                    echo '<script>location.href="index.php"</script>';
                }
            } else {
                echo '    
                <script>
                    alert("Đăng nhập thất bại - Sai thông tin hoặc chưa có tài khoản, Xin vui lòng đăng ký!");
                </script>';
                //     echo '<script>
                //     window.historyback()
                // </script>';
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
                $this->user->insertUser($data);
                echo '    
                <script>
                    alert("Đăng nhập thành công");
                </script>';
                echo '
                <script>
                    location.href="index.php?view=home"
                </script>';
            }
        }
    }
    function logout()
    {
        session_start();
        session_destroy();
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
                session_start();
                $_SESSION['email'] = $email;
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
            $data['emailpass'] = $_SESSION['email'];
            $result = $this->user->checkmail($data['emailpass']);
            $oldpass = $_POST['oldpass'];
            var_dump($oldpass);
            $data['newpass'] = $_POST['newpass'];
            $data['renewpass'] = $_POST['renewpass'];
            if ($result['mat_khau'] === $oldpass) {
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
                    alert("Mật khẩu cũ không đúng! Vui lòng nhập lại");
                </script>';
                echo '
                <script>
                    location.href="index.php?view=changepass"
                </script>';
            }
        }
    }
    function viewprofile()
    {
        $email = $_SESSION['user']['email'];
        $this->data['user'] = $this->user->checkmail($email);
        $this->renderView('profile', $this->data);
    }
    function editprofile()
    {
        if (isset($_POST['sub'])) {
            $data['idprofile'] = $_POST['id'];
            $data['firstname'] = $_POST['firstname'];
            $data['lastname'] = $_POST['lastname'];
            $data['emailprofile'] = $_POST['email'];
            $data['password'] = $_POST['passwork'];
            $data['sdt'] = $_POST['sdt'];
            $this->user->updateProfile($data);
            $this->data['user'] = $this->user->checkmail($data['emailprofile']);
            
            $result = $this->user->checkUser($data['emailprofile'], $data['password']);
            $_SESSION['user'] = $result;
            
        }
    }
}
