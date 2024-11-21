<?php
 require('includes/header.php');
 require('../ketnoi/connect.php');
 $viewid = $_GET['id'];
 $sql_str = "select * from tailieu where id = $viewid";
 $res = mysqli_query($conn,$sql_str);
 $row = mysqli_fetch_assoc($res)
 ?>
 <div  style = "margin-left :15px; width: 98% ;height: 700px; ">
            <h4><?=$row['tentailieu']?></h4>
            <iframe class="pdffile" src="<?php echo htmlspecialchars($row['filepath']); ?>" frameborder="0" width = "100%" height = "100%" ></iframe>
        </div>
 <?php
 require('includes/footer.php');?>
