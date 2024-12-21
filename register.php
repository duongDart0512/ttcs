<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
	<link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<?php
session_start();
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$errorMsg = "";
$email = "";
$otp = "";
if (!isset($_POST['sendotp']) && !isset($_POST['verifyotp']) && !isset($_POST['signup'])) {
    unset($_SESSION['otp']);
    unset($_SESSION['otp_verified']);
    unset($_SESSION['email']);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["sendotp"])) {
        // Xử lý gửi OTP
        $email = trim($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMsg = "Email không hợp lệ!";
        } else {
            // Kiểm tra email đã tồn tại chưa
            require_once("ketnoi/connect.php");
            $stmt = $conn->prepare("SELECT * FROM user WHERE taikhoan = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errorMsg = "Email đã được sử dụng. Vui lòng chọn email khác!";
            } else {
                // Tạo mã OTP và lưu vào session
                $otp = sprintf("%06d", mt_rand(1, 999999));
                $_SESSION['otp'] = $otp;
                $_SESSION['email'] = $email;

                // Gửi OTP qua email bằng PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; 
                    $mail->SMTPAuth = true;
                    $mail->Username = 'mocbltk@gmail.com'; 
                    $mail->Password = 'txko tluk lact ogjh'; 
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('mocbltk@gmail.com', 'Education Platform');
                    $mail->addAddress($email);

                    $mail->isHTML(true);
                    $mail->Subject = 'Mã xác thực đăng ký tài khoản';
                    $mail->Body = "
                        <html>
                        <body>
                            <h2>Mã xác thực đăng ký tài khoản</h2>
                            <p>Mã OTP của bạn là: <strong>{$otp}</strong></p>
                            <p>Mã này sẽ hết hạn trong 5 phút.</p>
                        </body>
                        </html>
                    ";

                    $mail->send();
                    $errorMsg = "Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra hộp thư.";
                } catch (Exception $e) {
                    $errorMsg = "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
                }
            }
        }
    } elseif (isset($_POST["verifyotp"])) {
        // Xác minh OTP
        $enteredOtp = trim($_POST["otp"]);
        
        // Kiểm tra OTP
        if ($enteredOtp === $_SESSION['otp']) {
            // Đánh dấu OTP đã xác thực
            $_SESSION['otp_verified'] = true;
            $errorMsg = "Xác thực OTP thành công!";
        } else {
            $errorMsg = "Mã OTP không chính xác. Vui lòng thử lại!";
        }
    } elseif (isset($_POST["signup"]) && isset($_SESSION['otp_verified']) && $_SESSION['otp_verified']) {
        // Đăng ký tài khoản sau khi OTP đã được xác minh
        $username = trim($_POST["username"]);
        $password = $_POST["password"];
        $cfpassword = $_POST["confirmpassword"];

        // Kiểm tra mật khẩu
        if (strlen($password) < 6) {
            $errorMsg = "Mật khẩu phải có ít nhất 6 ký tự!";
        } elseif ($password !== $cfpassword) {
            $errorMsg = "Mật khẩu không trùng khớp!";
        } else {
            require_once("ketnoi/connect.php");
            $email = $_SESSION['email'];

            // Kiểm tra tên người dùng đã tồn tại chưa
            $stmt = $conn->prepare("SELECT * FROM user WHERE ten = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $errorMsg = "Tên người dùng đã tồn tại!";
            } else {
                // Mã hóa mật khẩu
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Thêm người dùng mới
                $stmt = $conn->prepare("INSERT INTO user (ten, taikhoan, matkhau, anhdaidien) VALUES (?, ?, ?, 'images/avatar.svg')");
                $stmt->bind_param("sss", $username, $email, $hashedPassword);
                
                if ($stmt->execute()) {
                    // Xóa session sau khi đăng ký thành công
                    unset($_SESSION['otp']);
                    unset($_SESSION['otp_verified']);
                    unset($_SESSION['email']);
                    
                    // Chuyển đến trang đăng nhập
                    header("Location: loginform.php");
                    exit;
                } else {
                    $errorMsg = "Đăng ký thất bại: " . $stmt->error;
                }
            }
        }
    }
}
?>

<div class="container">
    <form action="" method="POST" autocomplete="off">
        <h1>Đăng Ký Tài Khoản</h1>

        <?php 
        // Điều kiện quan trọng: chỉ hiển thị OTP khi đã có session OTP
        if (!isset($_SESSION['otp'])): 
        ?>
            <!-- Bước 1: Nhập Email -->
            <div class="formcontrol">
                <input id="Email" type="email" placeholder="Nhập Email" name="email" 
                       value="<?php echo htmlspecialchars($email); ?>" autocomplete="off" required>
            </div>
            
            <button type="submit" class="btnLogin" name="sendotp">Gửi Mã OTP</button>

        <?php elseif (!isset($_SESSION['otp_verified'])): ?>
            <!-- Bước 2: Nhập OTP -->
            <div class="formcontrol">
                <input id="OTP" type="text" placeholder="Nhập mã OTP" name="otp" autocomplete="off" required>
            </div>
            <button type="submit" class="btnLogin" name="verifyotp">Xác Thực OTP</button>

        <?php else: ?>
            <!-- Bước 3: Nhập thông tin tài khoản -->
            <div class="formcontrol">
                <input id="username" type="text" placeholder="Tên người dùng" name="username" autocomplete="new-username" required>
            </div>
            <div class="formcontrol">
                <input id="Password" type="password" placeholder="Mật khẩu" name="password" 
                autocomplete="new-password" required>
            </div>
            <div class="formcontrol">
                <input id="Confirm" type="password" placeholder="Xác nhận mật khẩu" name="confirmpassword" required>
            </div>
            <button type="submit" class="btnLogin" name="signup">Đăng Ký</button>

        <?php endif; ?>

        <div class="error">
            <?php echo !empty($errorMsg) ? htmlspecialchars($errorMsg) : ''; ?>
        </div>
        <div class="signuplink">
            Đã có tài khoản? <a href="loginform.php">Đăng Nhập</a>
        </div>
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
.error{
    font-size :12px;
    color : var(--error-color-);
    margin-top: 10px;
    margin-bottom: 10px;
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

</style>
<script >

</script>
</html>