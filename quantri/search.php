<?php
$is_homepage = false;
require('includes/header.php');
require('../ketnoi/connect.php');
//lay từ khóa tìm kiếm
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($conn, $_GET['keyword']) : '';
$limit = 10; // Số người dùng mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Lấy số trang từ URL, mặc định là 1
if ($page < 1) $page = 1; // Đảm bảo số trang không âm

// Tính OFFSET
$offset = ($page - 1) * $limit;

// Đếm tổng số người dùng
$sql_count = "SELECT COUNT(*) as total FROM tailieu WHERE tentailieu LIKE '%$keyword%'";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$total_users = $row_count['total']; // Tổng số người dùng
$total_pages = ceil($total_users / $limit); // Tổng số trang
$sql_str = "SELECT tailieu.id as tlid,
                   tailieu.tentailieu as tailieuname,
                   tailieu.uploaddate as uploadday,
                   tailieu.anhdaidien as avatar, 
                   namhoc.ten as tennamhoc
            FROM tailieu
            JOIN namhoc ON tailieu.namhocid = namhoc.id
            WHERE tailieu.tentailieu LIKE '%$keyword%'
            ORDER BY tailieu.tentailieu
            LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn,$sql_str);
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tài liệu tìm kiếm</h6>
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
                                    if(mysqli_num_rows($result) >0){
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
                                            
                                        </tr>
                                        <?php }
                                    }
                                    else{
                                        echo "<tr><td colspan='5'><h3>Không có tài liệu tìm kiếm</h3></td></tr>";
                                    }
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
                <a class="page-link" href="?keyword=<?= urlencode($keyword) ?>&page=<?= $page - 1 ?>">Previous</a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?keyword=<?= urlencode($keyword) ?>&page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages): ?>
            <li class="page-item">
                <a class="page-link" href="?keyword=<?= urlencode($keyword) ?>&page=<?= $page + 1 ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
    </nav>               
</div>
<?php 
require('includes/footer.php');?>