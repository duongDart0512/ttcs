<?php
session_start();
require("ketnoi/connect.php");
if (!isset($_SESSION['userid'])) {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Vui lòng đăng nhập'
    ]);
    exit();
}
$sql = "Select tailieu.id as tlid from tailieu";
mysqli_query($conn,$sql);
$tlid = $_POST['tlid'];
$user_id = $_SESSION['userid'];
$check_query = "SELECT * FROM tailieuyeuthich 
WHERE userid = ? AND tailieuid = ?";
$stmt = $conn->prepare($check_query);
$stmt->bind_param("ii", $user_id, $tlid);
$stmt->execute();
$resulta = $stmt->get_result();

// check tai lieu xem ton tai hay k
$check_tailieu_exists = "SELECT id FROM tailieu WHERE id = ?";
$stmt_check = $conn->prepare($check_tailieu_exists);
$stmt_check->bind_param("i", $tlid);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

// Nếu tài liệu không tồn tại
if ($result_check->num_rows == 0) {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Tài liệu không tồn tại'
    ]);
    exit();
}

if ($resulta->num_rows > 0) {
// Đã có trong danh sách yêu thích, tiến hành xóa
$delete_query = "DELETE FROM tailieuyeuthich
   WHERE userid = ? AND tailieuid = ?";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("ii", $user_id, $tlid);
$stmt->execute();
echo json_encode([
    'status' => 'removed', 
    'message' => 'Đã xóa khỏi danh sách yêu thích'
]);
} else {
// Chưa có trong danh sách, tiến hành thêm
$insert_query = "INSERT INTO tailieuyeuthich (userid, tailieuid) 
   VALUES ('$user_id', '$tlid');";
mysqli_query($conn,$insert_query);

echo json_encode([
    'status' => 'added', 
    'message' => 'Đã thêm vào danh sách yêu thích'
]);
}
?>
