<?php require('thanhphan/header.php');
require('ketnoi/connect.php');
?>
<div class = "contain">
    <form class = "formupload" method = "post" action = "uploaduser.php" enctype ="multipart/form-data">
        <div class = "containgroup">
        <input type="text" class="inputuser" name="nametext" placeholder="Tên tài liệu">
        </div>
        <div class = "containgroup">
        <input type="text" class="inputuser" name="nameproject" placeholder="Tên môn học">
        </div>
        <div class = "containgroup">
            <select class ="inputuser" name="namhoc_id" placeholder = "Chọn Năm học">
                <option>Năm học</option>
            <?php 
                $sql_str = "select * from namhoc order by ten";
                $result = mysqli_query($conn,$sql_str);
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['ten'];?></option>
            <?php }?>
            </select>
        </div>
        <div class = "containgroup">
            <input type="file" class="inputuserfile" name="pdf_file" id = "pdf_file"
            multiple >
            <div class ="fileupload">

            </div>
        </div>
        <button class = "btnuploaduser">Tải lên</button>
    </form>
</div>
<style>
    .contain{
        max-width : 100vw;
        max-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
        margin-bottom: 60px;
    }
    select{
        appearance: none;
    }
    .formupload{
        width: 70%;
        align-items : center;
        justify-content: center;
    }
    .containgroup{
        margin : 10px;
        border-radius : 15px;
        width: 100%;
    }
    .inputuser{
        width: 100%;
        padding : 15px 15px;
        border-radius: 30px;
        font-size: 15px;
        border: 1px solid black;
    }
    .inputuserfile{
        width: 100%;
        padding : 12px 15px;
        border-radius: 30px;
        font-size: 15px;
        border: 1px solid black;
    }
    .btnuploaduser{
        width: 20%;
        padding : 10px;
        border: none;
        border-radius: 20px;
        margin-left: 50px;
        background:#4CC082;
    }
</style>
<?php require('thanhphan/footer.php')?>