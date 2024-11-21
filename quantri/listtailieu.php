<?php
require('includes/header.php');
//function anhdaidien($thumbnailPath,$height)
    //<img src = " <?php echo htmlspecialchars($thumbnailPath);";height = '$height'/>
//<?php } 
?>

<div>
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
                                    <?php require('../ketnoi/connect.php');
                                        $sql_str = "select tailieu.id as tlid,
                                        tailieu.tentailieu as tailieuname,
                                        tailieu.uploaddate as uploadday,
                                        tailieu.anhdaidien as avatar, 
                                        namhoc.ten as tennamhoc
                                        from tailieu,namhoc
                                        where tailieu.namhocid = namhoc.id order by tailieuname";
                                        $result = mysqli_query($conn,$sql_str);
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
                                            <td><a class="btn btn-info" href = "#">VIEW</a>
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
</div>

<?php
require('includes/footer.php')
?>