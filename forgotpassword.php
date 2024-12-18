<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotpassword</title>
	<link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<?php
session_start();
require('ketnoi/connect.php');
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Kiểm tra khi form gửi dữ liệu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['username'];
    $errorMsg = "";

    // Bước 1: Kiểm tra tài khoản trong database
    $stmt = $conn->prepare("SELECT * FROM user WHERE taikhoan = ?");
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $errorMsg = "Email chưa đăng ký";
    } else {
        // Bước 2: Tạo mã OTP ngẫu nhiên
        $otp = rand(1000, 9999);

        // Lưu OTP vào session và database
        $_SESSION['otp'] = $otp;
        $_SESSION['taikhoan'] = $user_email;

        $stmt = $conn->prepare("UPDATE user SET otp = ?, otp_created_at = NOW() WHERE taikhoan = ?");
        $stmt->bind_param("ss", $otp, $user_email);
        $stmt->execute();

        // Bước 3: Gửi OTP qua email

        $mail = new PHPMailer(true);

        try {
            // Cấu hình Gmail SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mocbltk@gmail.com'; // Lấy từ .env nếu có
            $mail->Password   = 'txko tluk lact ogjh'; // App Password Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Thiết lập người gửi và người nhận
            $mail->setFrom('mocbltk@gmail.com', 'Educationweb');
            $mail->addAddress($user_email);

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'Quên mật khẩu - Mã OTP';
            $mail->Body    = "Mã OTP của bạn là: <b>$otp</b>";

            $mail->send();
            header("Location: verifyotp.php");
        } catch (Exception $e) {
            $errorMsg = "Không thể gửi mail";
        }
    }
}
?>

<div class="container">
    <form action="" method="POST">
        <h1>Email</h1>
        <div class="formcontrol">
            <input id="username" type="text" placeholder="Email" name="username" 
            value="" required>
            <small></small>
            <span></span>
        </div>
        <div class="error">
            <?php echo !empty($errorMsg) ? htmlspecialchars($errorMsg) : ''; ?>
        </div>
        <button type="submit" class="btnLogin" name="btnlogin">Get OTP</button>
    </form>
</div>


</body>

<style>

:root{
    --success-color- : #2691d9;
    --error-color- : #e74c3c;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background: linear-gradient(120deg,#3ca7ee,#9b488f);
    height: 100vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    /* font-family: 'Poppins'; */
}
.container{
    width: 400px;
    background: white;
    border: none;
    outline: none;
    border-radius: 10px;
    padding: 40px;
}
.container h1{
    text-align: center;
}
.formcontrol input{
    border: none;
    outline: none;
    border-bottom: 1px solid #adadad;
    padding: 10px;
    
}
.formcontrol{
    width: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    margin-top: 40px;
}
.formcontrol small{
    margin-left: 10px;
    margin-top: 5px;
}
.formcontrol span{
    position: absolute;
    border-bottom:  3px solid var(--success-color-);
    left: 0;
    top: 35px;
    width: 0%;
    transition: 0.3s;
}
.formcontrol input:focus ~ span{
    width: 100%;
}
.formcontrol.error small{
    color: var(--error-color-);
}
.formcontrol.error input{
    border-bottom: 1px solid var(--error-color-);
}
.btnLogin{
    width: 100%;
    height: 50px;
    border-radius: 25px;
    border: none;
    outline: none;
    background: var(--success-color-);
    color: white;
    font-size: 20px;
    margin-top: 10px;
    font-weight: bold;
    cursor: pointer;
}
.btnLogin:hover{
    scale: 0.9;
    opacity: 0.9;
    transition: 0.3s;
}
.signuplink{
    text-align: center;
}
.signuplink a{
    color: var(--success-color-);
    text-decoration: none;
    cursor: pointer;
}
.error{
    margin-top: 10px;
    margin-bottom: 10px;
    font-size :12px;
    color : var(--error-color-);
}
</style>
<script >
</script>
</html>