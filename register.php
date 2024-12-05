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
$errorMsg = "";
$username = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {
    // Lấy dữ liệu từ form
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $cfpassword = $_POST["confirmpassword"];

    // Kiểm tra dữ liệu
    if ($password !== $cfpassword) {
        $errorMsg = "Mật khẩu không trùng khớp!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Email không hợp lệ!";
    } else {
        require_once("ketnoi/connect.php");

        // Kiểm tra email hoặc tên người dùng đã tồn tại
        $stmt = $conn->prepare("SELECT * FROM user WHERE taikhoan = ? OR ten = ?");
        $stmt->bind_param("ss", $email, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $errorMsg = "Email hoặc Tên người dùng đã tồn tại!";
        } else {
            // Mã hóa mật khẩu và thêm vào CSDL
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user VALUE (NULL, ?, ?, ?, 'images/avatar.svg')");
            $stmt->bind_param("sss", $username, $email, $hashedPassword);
            if ($stmt->execute()) {
                //  echo "Đăng ký thành công! <a href='loginform.php'>Đăng nhập</a>";
                // exit;
            // } else {
            //     $errorMsg = "Đăng ký thất bại: " . $stmt->error;
            header("Location: loginform.php");
            }
        }
    }
}
?>

    <div class="container">
        <form action="" method = "Post">
            <h1>Sign Up</h1>
            <div class="formcontrol" >
                <input id="username" type="text" placeholder="Username" name = "username"
                value="<?php echo htmlspecialchars($username); ?>" required>
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol ">
                <input id= "Email" type="text" placeholder="Email" name  = "email"
                value="<?php echo htmlspecialchars($email); ?>" required>
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol ">
                <input id="Password" type="text" placeholder="Password" name = "password" required>
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol">
                <input id="Confirm" type="text" placeholder="Confirm Password" name = "confirmpassword" required>
                <small></small>
                <span></span>
            </div>
            <div class="error">
            <?php echo !empty($errorMsg) ? htmlspecialchars($errorMsg) : ''; ?>
            </div>
            <button type="submit" class="btnLogin" name = "signup">Sign up</button>
            <div class="signuplink">
                You have a account?  <a href="loginform.php">Login</a>
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
    font-family: 'Poppins';
}
.error{
    font-size :12px;
    color : var(--error-color-);
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