<?php
require('includes/header.php');
?>

<form class="user" method = "post" action = "addtailieu.php" enctype ="multipart/form-data">
    
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nametext"
                placeholder="Tên tài liệu">
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-user" name="nameproject"
                placeholder="Tên môn học"></input>
        </div>

        <div class="form-group">
            <select class ="form-control" name="namhoc_id" placeholder = "Chọn Năm học">
                <option>Năm học</option>
            <?php require('../ketnoi/connect.php');
                $sql_str = "select * from namhoc order by ten";
                $result = mysqli_query($conn,$sql_str);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['ten'];?></option>
            <?php }?>
               
            </select>
        </div>

        
        <div class="form-group">
            <label class="form-label">Thêm tài liệu</label>
            <input type="file" class="form-control form-control-user" name="pdf_file" id = "pdf_file"
            multiple >
        </div>

    <button class="btn btn-primary btn-user btn-block"> Thêm mới</button>
</form>

<?php
require('includes/footer.php')
?>