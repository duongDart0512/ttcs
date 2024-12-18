<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResetPassword</title>
	<link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<?php
session_start();
require('ketnoi/connect.php');
$errorMsg = "";

// Kiểm tra nếu người dùng đã xác thực OTP
if (!isset($_SESSION['taikhoan'])) {
    header('Location: forgotpassword.php'); // Quay lại bước đầu nếu chưa xác thực
    exit();
}

// Xử lý khi form đổi mật khẩu gửi dữ liệu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password != $confirm_password) {
        $errorMsg = "Mật khẩu xác nhận không khớp!";
    } else {
        // Mã hóa mật khẩu và cập nhật vào database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $taikhoan = $_SESSION['taikhoan'];

        $stmt = $conn->prepare("UPDATE user SET matkhau = ? WHERE taikhoan = ?");
        $stmt->bind_param("ss", $hashed_password, $taikhoan);
        $stmt->execute();

        // Xóa session và thông báo thành công
        unset($_SESSION['otp']);
        unset($_SESSION['taikhoan']);
        echo "<script>
                alert('Đổi mật khẩu thành công! Vui lòng đăng nhập lại.');
                window.location.href = 'loginform.php';
              </script>";
        exit();
    }
}
?>
    <div class="container">
        <form action="" method = "Post">
            <h1>Reset Password</h1>
            <div class="formcontrol ">
                <input id="Password" type="password" placeholder="Password" name = "new_password" required>
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol">
                <input id="Confirm" type="password" placeholder="Confirm Password" name = "confirm_password" required>
                <small></small>
                <span></span>
            </div>
            <div class="error">
            <?php echo !empty($errorMsg) ? htmlspecialchars($errorMsg) : ''; ?>
            </div>
            <button type="submit" class="btnLogin" name = "signup">Verify</button>
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