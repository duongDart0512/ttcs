<?php require("thanhphan/header.php") ?>
<?php
require('ketnoi/connect.php');
  $tlid = $_GET['id'];
  $sql_str = "SELECT * from tailieu where id = $tlid";
  $result  = mysqli_query($conn, $sql_str);
  $row = mysqli_fetch_assoc($result);
  $filePath = $row['filepath'];
  $user_id = $_SESSION['userid'];
  //kiemtrayeuthich
  $check_favorite_query = "SELECT * FROM tailieuyeuthich
                         WHERE userid = ? AND tailieuid = ?";
$stmt = $conn->prepare($check_favorite_query);
$stmt->bind_param("ii", $user_id, $document_id);
$stmt->execute();
$favorite_result = $stmt->get_result();
$is_favorite = $favorite_result->num_rows > 0;
?>
    <div class= "bgtext" style = " margin-top:10px;height : 100px;max-width : 100vw; background: #4CC082; 
    display: flex; align-items: center; justify-content: center">
      <!-- <img src="images/bgtext.jpg" alt="" style = "height : 150px; width : 100vw" > -->
       <p style = "font-size : 30px; font-weight: bold">Chi tiết tài liệu</p>
    </div>
    <div class="containertext" style = "display: flex; margin-top:20px; max-width:100%; margin-bottom: 70px" >
        
        <div class="document-content" style = "margin-left :15px; width: 55% ;height: 600px">
            <h4><?=$row['tentailieu']?></h4>
            <iframe class="pdffile" src="<?php echo htmlspecialchars($filePath); ?>" frameborder="0" width = "100%" height = "100%" ></iframe>
            <button id="favoriteBtn" class="<?= $is_favorite ? 'favorited' : '' ?>">
            <?= $is_favorite ? 'Đã Yêu Thích' : 'Yêu Thích' ?>
        </button>
          </div>
            
        <div class="related-document" style = "margin-left: 15px; width: 600px">
            <h3>Tài liệu liên quan</h3>
            <div class = "rowrelated" style = "display:flex; flex-wrap:wrap">
           <?php require ('ketnoi/connect.php');
                  $sql_str = "SELECT *
                              FROM (
                                  SELECT *
                                  FROM tailieu
                                  WHERE tenonhoc = (
                                      SELECT tenonhoc
                                      FROM tailieu
                                      WHERE id = $tlid
                                  )
                                  AND id != $tlid
                                  UNION ALL
                                  SELECT *
                                  FROM tailieu
                                  WHERE namhocid = (
                                      SELECT namhocid
                                      FROM tailieu
                                      WHERE id = $tlid
                                  )
                                  AND id != $tlid
                                  AND NOT EXISTS (
                                      SELECT 1
                                      FROM tailieu
                                      WHERE tenonhoc = (
                                          SELECT tenonhoc
                                          FROM tailieu
                                          WHERE id = $tlid
                                      )
                                      AND id != $tlid
                                  )
                              ) AS combined
                              LIMIT 6";
                  $result = mysqli_query($conn,$sql_str);
                  while($row = mysqli_fetch_assoc($result)){ 
              ?>
              <div class="col-sm-6 col-lg-4 col-xl-3 mb-5" style = "width: 250px; margin-right: 20px;margin-left: 20px">
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#favoriteBtn').click(function() {
        $.ajax({
            url: 'btnyeuthich.php',
            method: 'POST',
            data: {
                tlid: <?= $tlid; ?>
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'added') {
                    $('#favoriteBtn')
                        .addClass('favorited')
                        .text('Đã Yêu Thích');
                } else if (response.status === 'removed') {
                    $('#favoriteBtn')
                        .removeClass('favorited')
                        .text('Yêu Thích');
                }
                alert(response.message);
            },
            error: function() {
                alert('Có lỗi xảy ra');
            }
        });
    });
});
</script>  
<style>
  #favoriteBtn{
    background: #4CC082;
    font-size: 20px;
    padding: 10px 25px;
    border : none;
    border-radius: 5px;
    margin-top: 20px;
    margin-left: 20px;
  }
</style> 
<?php require("thanhphan/footer.php")?>
