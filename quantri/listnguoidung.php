<?php
require('includes/header.php');
//function anhdaidien($thumbnailPath,$height)
    //<img src = " <?php echo htmlspecialchars($thumbnailPath);";height = '$height'/>
//<?php } 
?>
<div>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách Người dùng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên người dùng</th>
                                            <th>Tên tài khoản</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên người dùng</th>
                                            <th>Tên tài khoản</th>
                                            <th>Option</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php require('../ketnoi/connect.php');
                                        $sql_str = "select user.id as uid,
                                        user.ten as uname,
                                        user.taikhoan as uaccount
                                        from user order by uid";
                                        $result = mysqli_query($conn,$sql_str);
                                        while($row = mysqli_fetch_assoc($result)){
                                            
                                            ?>
       
                                        <tr>
                                            <td><?=$row['uid']?></td>
                                            <td><?=$row['uname']?></td>
                                            <td><?=$row['uaccount']?></td>
                                            <td>
                                            <a href="deleteuser.php?id=<?=$row['uid']?>" class = "btn btn-danger" onclick = "confirm('Ban chac chan xoa muc nay?')">DEL</a>
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
</div>

<?php
require('includes/footer.php')
?>