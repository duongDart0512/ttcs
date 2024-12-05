<?php require("thanhphan/header.php") ;
require("ketnoi/connect.php");
$limit = 12; // Số người dùng mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL, mặc định là 1
if ($page < 1) $page = 1; // Đảm bảo số trang không âm

// Tính OFFSET
$offset = ($page - 1) * $limit;

// Đếm tổng số người dùng
$sql_count = "SELECT COUNT(*) as total FROM tailieu ";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_users = $row_count['total']; // Tổng số người dùng
$total_pages = ceil($total_users / $limit); // Tổng số trang
$sql_str = "SELECT *
FROM tailieu
order by tentailieu LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn,$sql_str);
?>
<div class= "bgtext" style = " margin-top:10px;height : 100px; max-width : 100vw; background: #4CC082; 
    display: flex; align-items: center; justify-content: center">
      <!-- <img src="images/bgtext.jpg" alt="" style = "height : 150px; width : 100vw" > -->
       <p style = "font-size : 30px; font-weight: bold">Gợi ý cho bạn</p>
    </div>
<section id="courses" class="padding-medium">
    <div class="container">
      <div class="row"> 
        <?php
            while($row = mysqli_fetch_assoc($result)){ 
        ?>
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">PDF</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
          <a href="chitiettext.php?id=<?=$row['id']?>"><img src="<?=$row['anhdaidien']?>"
          class="img-fluida rounded-3 "  style = "width :100%; height:200px"alt="image"></a>
            <div class="card-body p-0" style = "height: 200px">

              <div class="d-flex justify-content-between my-3" style = "height: 45px">
                <p class="text-black-50 fw-bold text-uppercase m-0"><?=$row['tenonhoc']?></p>
                <!-- <div class="d-flex align-items-center">
                  <svg width="20" height="20">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">1h 50m</p>
                </div> -->
              </div>

              <a href="chitiettext.php?id=<?=$row['id']?>" style = "height : 80px">
                <h5 class="course-title py-2 m-0"><?=$row['tentailieu']?></h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2"><?=$row['uploaddate']?></p>
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