<?php
require('includes/header.php');
require('../ketnoi/connect.php');

// Xác định trang hiện tại
$limit = 10; // Số người dùng mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL, mặc định là 1
if ($page < 1) $page = 1; // Đảm bảo số trang không âm

// Tính OFFSET
$offset = ($page - 1) * $limit;

// Đếm tổng số người dùng
$sql_count = "SELECT COUNT(*) as total FROM tailieu";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_users = $row_count['total']; // Tổng số người dùng
$total_pages = ceil($total_users / $limit); // Tổng số trang
$sql_str = "select tailieu.id as tlid,
tailieu.tentailieu as tailieuname,
tailieu.uploaddate as uploadday,
tailieu.anhdaidien as avatar, 
namhoc.ten as tennamhoc
from tailieu,namhoc
where tailieu.namhocid = namhoc.id order by tailieuname
LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn,$sql_str);
?>


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách tài liệu</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên tài liệu</th>
                                            <th>Update Day</th>
                                            <th>Năm học</th>
                                            <th>Image</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Tên tài liệu</th>
                                        <th>Update Day</th>
                                        <th>Năm học</th>
                                            <th>Images</th>
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        while($row = mysqli_fetch_assoc($result)){
                                            $imagePath = htmlspecialchars($row['avatar']);
                                            ?>
       
                                        <tr>
                                            <td><?=$row['tailieuname']?></td>
                                            <td><?=$row['uploadday']?></td>
                                            <td><?=$row['tennamhoc']?></td>
                                            <td>
                                                <div class = "anhdaidien" style = "height: 100px">
                                                    <img src = "<?=$imagePath ?>" style = "height: 100px">
                                                </div>
                                            </td>
                                            <td><a class="btn btn-info" href = "viewtailieu.php?id=<?=$row['tlid']?>">VIEW</a>
                                            <a href="deletetailieu.php?id=<?=$row['tlid']?>" class = "btn btn-danger" onclick = "confirm('Ban chac chan xoa muc nay?')">DEL</a>
                                            <!-- <a href="#" class = "btn btn-danger" onclick = "confirm('Ban chac chan xoa muc nay?')">VIEW</a> -->
                                        </td>
                                        </tr>
                                        <?php }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    <nav aria-label="..." style = "algin-items: center">
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
    </nav>               
</div>

<?php
require('includes/footer.php')
?>