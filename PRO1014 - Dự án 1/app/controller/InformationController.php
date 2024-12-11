<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('app/model/InformationModel.php');
require_once('app/model/UserModel.php');
class InformationController
{
    private $information;
    private $user;
    private $data;
    function __construct()
    {
        $this->information = new InformationModel();
        $this->user = new UserModel();
    }
    public function view($view, $data = [])
    {
        require_once 'app/view/' . $view . '.php';
    }
    function about()
    {
        $this->view('about');
    }
    function blog()
    {
        $this->data['blog'] = $this->information->getBLog();
        $this->view('blog', $this->data);
    }
    function blogDetail()
    {
        $id = $_GET['id'];
        $this->data['blog_detail'] = $this->information->getBLogDetail($id);
        $this->view('blog_detail', $this->data);
    }
    function contact()
    {
        $this->view('contact');
    }
    function sendForm()
    {
        $email = $_SESSION['user']['email'];
        $content = $_POST['content'];
        $check = $this->user->checkmail($email);
        if (is_array($check) && !empty($check)) {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'thanhphuc2005.work@gmail.com';
            $mail->Password = 'oyrtccvhnukedlsn';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('thanhphuc2005.work@gmail.com');

            $mail->addAddress('phuongcac555@gmail.com');

            $mail->isHTML(true);

            $mail->Subject = $email;
            $mail->Body = $content;

            $mail->send();
            echo '    
            <script>
                alert("Đã gửi form! Cảm ơn bạn đã góp ý");
            </script>';
            echo '<script>location.href="index.php?view=contact"</script>';
        } else {
            echo '    
            <script>
                alert("Cần đăng nhập để gửi form");
            </script>';
            echo '<script>location.href="index.php?view=contact"</script>';
        }
    }
}
