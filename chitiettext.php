<?php require("thanhphan/header.php") ?>
<?php require("ketnoi/connect.php");
  $sql_str = "SELECT filepath from tailieu where id = 44";
  $result  = mysqli_query($conn, $sql_str);
  $row = mysqli_fetch_assoc($result);
  $filePath = $row['filepath'];
?>
    <div class= "bgtext" style = " margin-top:10px; ">
      <img src="images/bgtext.jpg" alt="" style = "height : 150px; width : 100vw" >
    </div>
    <div class="containertext" style = "display: flex; margin-top:20px; width:100%" >
        
        <div class="document-content" style = "margin-left :15px; width: 55% ;height: 600px">
            <h4>Hệ thống thông tin di động</h4>
            <iframe class="pdffile" src="<?php echo htmlspecialchars($filePath); ?>" frameborder="0" width = "100%" height = "100%" ></iframe>
        </div>
            
        <div class="related-document" style = "margin-left: 15px; width: 600px">
            <h3>Tài liệu liên quan</h3>
            <div class = "rowrelated" style = "display:flex; flex-wrap:wrap">
            <div class="col-sm-6 col-lg-4 col-xl-3 mb-5" style = "width: 280px; margin-right:10px">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item1.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Digital Marketing</p>
                <div class="d-flex align-items-center">
                  <svg width="20" height="20">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">1h 50m</p>
                </div>
              </div>

              <a href="courses-details.html">
                <h5 class="course-title py-2 m-0">Mastering the Art of Digital Communication</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2">By: James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>
              </div>

            </div>
          </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 mb-5" style = "width: 280px; margin-right: 10px">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item1.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Digital Marketing</p>
                <div class="d-flex align-items-center">
                  <svg width="20" height="20">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">1h 50m</p>
                </div>
              </div>

              <a href="courses-details.html">
                <h5 class="course-title py-2 m-0">Mastering the Art of Digital Communication</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2">By: James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>
              </div>

            </div>
          </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 mb-5" style = "width: 280px; margin-right: 10px">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item1.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Digital Marketing</p>
                <div class="d-flex align-items-center">
                  <svg width="20" height="20">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">1h 50m</p>
                </div>
              </div>

              <a href="courses-details.html">
                <h5 class="course-title py-2 m-0">Mastering the Art of Digital Communication</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2">By: James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>
              </div>

            </div>
          </div>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3 mb-5" style = "width: 280px; margin-right: 10px">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item1.jpg" class="img-fluid rounded-3" alt="image"></a>
            <div class="card-body p-0">

              <div class="d-flex justify-content-between my-3">
                <p class="text-black-50 fw-bold text-uppercase m-0">Digital Marketing</p>
                <div class="d-flex align-items-center">
                  <svg width="20" height="20">
                    <use xlink:href="#clock" class="text-black-50"></use>
                  </svg>
                  <p class="text-black-50 fw-bold text-uppercase m-0">1h 50m</p>
                </div>
              </div>

              <a href="courses-details.html">
                <h5 class="course-title py-2 m-0">Mastering the Art of Digital Communication</h5>
              </a>

              <div class="card-text">
                <span class="rating d-flex align-items-center mt-3">
                  <p class="text-muted fw-semibold m-0 me-2">By: James Willam</p>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                  <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                </span>
              </div>

            </div>
          </div>
            </div>
            </div>

           
        </div>
    </div>
<?php require("thanhphan/footer.php")?>
