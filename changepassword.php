<?php 
require('thanhphan/header.php');
?>
<?php
require('ketnoi/connect.php');

$errorMsg = "";
// Kiểm tra người dùng đã đăng nhập chưa
if (!isset($_SESSION['userid'])) {
    header('Location: loginform.php'); // Chuyển về trang đăng nhập nếu chưa đăng nhập
    exit();
}

// Lấy thông tin tài khoản từ session
$taikhoan = $_SESSION['userid'];

// Xử lý khi form gửi dữ liệu
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['CurrentPassword'];
    $new_password = $_POST['Newpassword'];
    $confirm_password = $_POST['confirmpassword'];

    // Truy vấn lấy mật khẩu cũ từ database
    $stmt = $conn->prepare("SELECT matkhau FROM user WHERE userid = ?");
    $stmt->bind_param("s", $taikhoan);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['matkhau'];

        // Kiểm tra mật khẩu cũ
        if (password_verify($old_password, $hashed_password)) {
            // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới
            if ($new_password != $confirm_password) {
                $errorMsg = "Mật khẩu mới và xác nhận mật khẩu không khớp!";
            } else {
                // Cập nhật mật khẩu mới (mã hóa trước khi lưu)
                $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_stmt = $conn->prepare("UPDATE user SET matkhau = ? WHERE userid = ?");
                $update_stmt->bind_param("ss", $new_hashed_password, $taikhoan);
                $update_stmt->execute();

                // $successMsg = "Đổi mật khẩu thành công!";
                // // Xóa session để người dùng phải đăng nhập lại
                // session_destroy();
                echo "<script>
                        alert('Đổi mật khẩu thành công!');
                        window.location.href = 'account.php';
                      </script>";
                exit();
            }
        } else {
            $errorMsg = "Mật khẩu cũ không chính xác!";
        }
    } else {
        $errorMsg = "Tài khoản không tồn tại!";
    }
}
?>
<div class="containerchange">
        <form action="" method = "Post">
            <h1>Change Password</h1>
            <div class="formcontrol ">
                <input id= "CurrentPassword" type="Password" placeholder="Mật khẩu hiện tại" name  = "CurrentPassword"
                value="" required>
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol ">
                <input id="Password" type="password" placeholder="Password" name = "Newpassword" required>
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol">
                <input id="Confirm" type="password" placeholder="Confirm Password" name = "confirmpassword" required>
                <small></small>
                <span></span>
            </div>
            <div class="error">
             <?php echo !empty($errorMsg) ? htmlspecialchars($errorMsg) : ''; ?> 
            </div>
            <button type="submit" class="btnLogin" name = "signup">Change</button>
        </form>
</div>

<style>

:root{
    --success-color- : #2691d9;
    --error-color- : #e74c3c;
}
.error{
    font-size :12px;
    color : var(--error-color-);
    margin-top: 10px;
    margin-bottom: 10px;
}
.containerchange{
    width: 400px;
    background: #F3F6FA;
    border: none;
    outline: none;
    border-radius: 10px;
    padding: 40px;
    margin-top: 20px;
    margin-bottom: 20px;
    margin-left: 470px;
}
.containerchange h1{
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
    top: 40px;
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
<?php 
require('thanhphan/footer.php');
?>