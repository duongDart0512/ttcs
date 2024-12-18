<?php
session_start();
require('ketnoi/connect.php');
define('SITE_URL', '/ttcs/quantri');
$nametext = $_POST['nametext']; 
$nameproject = $_POST['nameproject']; 
$namhoc_id = $_POST['namhoc_id'];
$user_id = $_SESSION['userid'];
// Bật hiện thị lỗi để debug
error_reporting(E_ALL);
ini_set('display_errors', 1);
$errMsg = "";
// Kiểm tra ImageMagick
if (!extension_loaded('imagick')) {
    error_log('ImageMagick không được cài đặt');
    die('ImageMagick không được cài đặt');
}

// Hàm tạo thumbnail với logging chi tiết
function generateThumbnailFromPDF($pdfPath, $imagePath) {
    try {
        error_log("Bắt đầu tạo thumbnail");
        error_log("PDF Path: " . $pdfPath);
        error_log("Image Path: " . $imagePath);

        // Kiểm tra file PDF
        if (!file_exists($pdfPath)) {
            error_log("File PDF không tồn tại tại đường dẫn: " . $pdfPath);
            throw new Exception('File PDF không tồn tại tại: ' . $pdfPath);
        }

        // Kiểm tra quyền đọc file PDF
        if (!is_readable($pdfPath)) {
            error_log("Không có quyền đọc file PDF");
            throw new Exception('Không có quyền đọc file PDF');
        }

        // Kiểm tra thư mục đích
        $targetDir = dirname($imagePath);
        if (!is_dir($targetDir)) {
            error_log("Thư mục đích không tồn tại: " . $targetDir);
            throw new Exception('Thư mục đích không tồn tại');
        }

        // Kiểm tra quyền ghi vào thư mục đích
        if (!is_writable($targetDir)) {
            error_log("Không có quyền ghi vào thư mục đích: " . $targetDir);
            throw new Exception('Không có quyền ghi vào thư mục đích');
        }

        $imagick = new Imagick();
        error_log("Đã khởi tạo Imagick");

        $imagick->setResolution(72, 72);
        error_log("Đã set resolution");

        $imagick->readImage($pdfPath . '[0]');
        error_log("Đã đọc file PDF");

        $imagick->setImageFormat('jpg');
        error_log("Đã set format");
       

        if (!$imagick->writeImage($imagePath)) {
            error_log("Không thể lưu file ảnh");
            throw new Exception('Không thể lưu file ảnh');
        }
        error_log("Đã lưu file ảnh thành công");

        $imagick->clear();
        $imagick->destroy();
        error_log("Đã hoàn thành xử lý Imagick");

        return true;
    } catch (Exception $e) {
        error_log('Lỗi trong quá trình tạo thumbnail: ' . $e->getMessage());
        return false;
    }
}

// Xử lý upload file với logging
if (isset($_FILES['pdf_file'])) {
    error_log("Bắt đầu xử lý upload file");
    
    $file = $_FILES['pdf_file'];
    error_log("Thông tin file: " . print_r($file, true));
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        error_log("Lỗi upload: " . $file['error']);
        die("Lỗi upload file: " . $file['error']);
    }

    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if ($fileExtension != "pdf") {
        // error_log("File không phải PDF");
        // die("Chỉ chấp nhận file PDF.");
        $errMsg = "Chỉ chấp nhận file pdf";
    }

    

    $fileName = basename($file['name']);
    $filePath = SITE_URL . "/uploads/file/". $fileName;
    $thumbnailPath = SITE_URL . "/uploads/hinhanh/" . pathinfo($file['name'], PATHINFO_FILENAME) . "_thumbnail.jpg";

    error_log("Đường dẫn file PDF: " . $filePath);
    error_log("Đường dẫn thumbnail: " . $thumbnailPath);

    if (!move_uploaded_file($file['tmp_name'], $filePath)) {
        error_log("Không thể di chuyển file upload");
        die("Không thể di chuyển file upload");
    }
    error_log("Đã upload file thành công");

    if (!generateThumbnailFromPDF($filePath, $thumbnailPath)) {
        error_log("Không thể tạo thumbnail");
        die("Không thể tạo thumbnail");
    }
    error_log("Đã tạo thumbnail thành công");

    $sql_str = "INSERT INTO tailieu (id, tentailieu, filepath, tenonhoc, tailieu, anhdaidien, uploaddate,userid, namhocid) 
    VALUES (NULL, '$nametext', '$filePath', '$nameproject', '$filePath', '$thumbnailPath',CURRENT_DATE, '$user_id', '$namhoc_id');";  
    // Thực thi câu lệnh 
    
    mysqli_query($conn, $sql_str);  

    $sqlupdate1 = "UPDATE tailieu 
        SET anhdaidien = REPLACE(anhdaidien, '/ttcs', '');"   ; 
    mysqli_query($conn,$sqlupdate1);
    $sqlupdate2 = "UPDATE tailieu 
    SET filepath = REPLACE(filepath, '/ttcs', '');"   ; 
    mysqli_query($conn,$sqlupdate2);
    // Trở về trang 
    echo "<script>
                        alert('Tải tài liệu thành công!');
                        window.location.href = 'upload.php';
                      </script>";
}
?>
