<?php require('thanhphan/header.php');
require ('ketnoi/connect.php');
// lay thong tin ngươi dung
$user_id = $_SESSION['userid'];
$infouser = "Select * from user where userid = '$user_id';";
$resultuser = mysqli_query($conn,$infouser);
$rowuser = mysqli_fetch_assoc($resultuser);
// lay so tai lieu dc tai len boi nguoi dung
$sql_countdc = "SELECT COUNT(*) as total FROM tailieu where tailieu.userid = '$user_id'; ";
$result_countdc = mysqli_query($conn, $sql_countdc);
$row_countdc = mysqli_fetch_assoc($result_countdc);
$total_userdc = $row_countdc['total']; 
// lay tai lieu nguoi dung da tai len va phan trang
$limit = 12; // Số tl mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL, mặc định là 1
if ($page < 1) $page = 1; // Đảm bảo số trang không âm

// Tính OFFSET
$offset = ($page - 1) * $limit;
$total_pages = ceil($total_userdc / $limit); // Tổng số trang

$sql_str = "Select tailieu.id as tlid ,
tailieu.tentailieu as tailieuname,
tailieu.anhdaidien as avatar,
tailieu.tenonhoc as tenmonhoc,
tailieu.uploaddate as uploadday
from tailieu  where tailieu.userid = '$user_id'
LIMIT $limit OFFSET $offset;";
$result = mysqli_query($conn,$sql_str);
?>
<div class = "info" style = "max-width: 100vw; height: 200px; background : #F3F6FA;">
    <div class = "avatar" style >
        <img src="<?=$rowuser['anhdaidien']?>" alt="avatar" class = "avartaruser" >
    </div>
    <div class = "information">
        <h2> <?=$rowuser['ten']?></h2>
        <p><?=$rowuser['taikhoan']?></p>
        <p>Tài liệu đã tải lên: <?= $total_userdc?></p>
    </div>
</div>
<style>
.info{
    display: flex;
    align-items: center; 
    margin-top: 10px;  
    margin-bottom: 20px; 
}
.avartaruser{
    margin-left: 150px;
    width: 180px !important; 
    height: 180px !important; 
    object-fit: cover;
}
.information{
    margin-left: 80px;
}
</style>
<section id="courses" class="padding-medium">
    <div class="container">
    <div class="text-center mb-5">
        <h2 class="display-6 fw-semibold">Tài liệu của bạn</h2>
      </div>
      <div class="row"> 
        <?php 
            while($row = mysqli_fetch_assoc($result)){ 
        ?>
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">PDF</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
          <a href="chitiettext.php?id=<?=$row['tlid']?>"><img src="<?=$row['avatar']?>"
          class="img-fluida rounded-3 "  style = "width :100%; height:200px"alt="image"></a>
            <div class="card-body p-0" style = "height: 200px">

              <div class="d-flex justify-content-between my-3" style = "height: 45px">
                <p class="text-black-50 fw-bold text-uppercase m-0"><?=$row['tenmonhoc']?></p>
                <!-- <div class="d-flex align-items-center">
                  <svg width="20" height="20">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">1h 50m</p>
                </div> -->
              </div>

              <a href="chitiettext.php?id=<?=$row['tlid']?>" style = "height : 80px">
                <h5 class="course-title py-2 m-0"><?=$row['tailieuname']?></h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2"><?=$row['uploadday']?></p>
                  <!-- <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon> -->
                </span>
              </div>

            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <nav aria-label="Page navigation example">
    <?php if ($total_pages > 1): // Chỉ hiển thị phân trang khi có nhiều hơn 1 trang ?>
    <ul class="pagination justify-content-center">
        <!-- Nút Previous -->
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Previous</a>
            </li>
        <?php endif; ?>

        <!-- Số trang -->
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <!-- Nút Next -->
        <?php if ($page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php else: ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
        <?php endif; ?>
    </ul>
    <?php endif; ?>
        </nav>  
      
    </div>
</section>
<?php require('thanhphan/footer.php')?>