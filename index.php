
<?php 
// session_start();
require("thanhphan/header.php") ?>

  <section id="hero" style="background-image:url(images/red-and-black-abstract-design-on-white-geometric-background-free-vector.jpg); background-repeat: no-repeat; ">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 pe-5 mt-5 mt-md-0">
          <h2 class="display-1 text-uppercase" style="color: var(--primary-color);">Improve your score</h2>
          <p class="fs-4 my-4 pb-2" style="color: var(--primary-color);">Study materials at KMA</p>
          <div>
            <form id="form" class="d-flex align-items-center position-relative " method = "get" action = "timkiem.php">
              <input type="text" placeholder="Tài liệu đang tìm kiếm"
                class="form-control bg-white border-0 rounded-4 shadow-none px-4 py-3 w-100" name = "keyword">
              <button class="btn btn-primary rounded-4 px-3 py-2 position-absolute align-items-center m-1 end-0">
                <i class="fa-brands fa-searchengin" width = "30px" height = "30px"></i></button>
            </form>

          </div>
        </div>
        <div class="col-md-6 mt-5">
          <img src="images/bgps-removebg-preview.png" alt="img" class="img-fluid" >
        </div>
      </div>
    </div>
  </section>

  <section id="features">
    <div class="feature-box container" style="justify-content: center;">
      <div class="row " style="justify-content: center;">
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">1000+</h2>
              <h6 class="feature-info text-uppercase">Tài liệu</h6>

            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">500+</h2>
              <h6 class="feature-info text-uppercase">Đề thi</h6>

            </div>
          </div>
        </div>
        <!-- <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">free</h2>
              <h6 class="feature-info text-uppercase">certifications</h6>

            </div>
          </div>
        </div> -->
        <div class="col-md-3 col-sm-6 mb-5 mb-md-0">
          <div class="feature-item py-5  rounded-4">
            <div class="feature-detail text-center">
              <h2 class="feature-title">500+</h2>
              <h6 class="feature-info text-uppercase">Thành Viên</h6>

            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="about" class="padding-medium mt-xl-5">
    <div class="container">
      <div class="row align-items-center mt-xl-5">
        <div class="offset-md-1 col-md-5">
          <img src="images/about-img.jpg" alt="img" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-5 mt-5 mt-md-0">
          <div class="mb-3">
            
            <h2 class="display-6 fw-semibold">Giới thiệu</h2>
          </div>
          <p>“Khi bạn gặp trở ngại, hãy biến nó thành cơ hội. Bạn được quyền lựa chọn. 
            Vượt qua nó và trở thành người chiến thắng, hay để nó chiến thắng và bạn đương nhiên sẽ la kẻ thua cuộc. 
            Sự lựa chọn là của riêng bạn mà thôi. Không từ bỏ. Hãy đến với niềm vui mà kẻ bỏ cuộc từ chối được hưởng.” </p>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <!-- <p class="ps-4">Engage with a worldwide community of inquisitive and imaginative individuals.</p> -->
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <!-- <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p> -->
          </div>
          <div class="d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="22px" height="22px">
              <use href="#tick-circle" class="text-secondary" />
            </svg>
            <!-- <p class="ps-4">Learn a skill of your choice from the experts around the world from various industries</p> -->
          </div>
          <!-- <a href="about.html" class="btn btn-primary px-5 py-3 mt-4">Learn more</a> -->


        </div>
      </div>
    </div>
  </section>

  <section id="category">
    <div class="container ">
      <div class="d-md-flex justify-content-between align-items-center">
        <div>
    
          <h2 class="display-6 fw-semibold">Môn học truy cập phổ biến</h2>
        </div>
      </div>
      <div class="row g-md-3 mt-2">
        <div class="col-md-4">
          <div class="primary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Phát triển ứng dụng Web">Phát triển ứng dụng Web</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
          <div class="tertiary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Lập trình căn bản">Lập trình căn bản</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
          <div class="secondary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Lập trình hướng đối tượng">Lập trình hướng đối tượng</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="gray rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Otomat và ngôn ngữ hình thức">Otomat </a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
          <div class="secondary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Chương trình dịch">Chương trình dịch</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
          <div class="tertiary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Phát triển phần mềm ứng dụng">Phát tiển phần mềm ứng dụng</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="tertiary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Lập trình ANDROID">Lập trình ANDROID</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
          <div class="primary rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
              
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Cấu trúc dữ liệu và giải thuật">Cấu trúc dữ liệu và giải thuật</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
          <div class="gray rounded-3 p-4 my-3" style="cursor: pointer;">
            <div class="d-flex align-items-center">
            
              <div class="ps-4">
                <a class="category-paragraph fw-bold text-uppercase mb-1"
                href = "monnoibat.php?tenonhoc=Lý thuyết độ phức tạp tính toán">Lý thuyết độ phức tạp tính toán</a>
                <p class="category-paragraph m-0"></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="courses" class="padding-medium">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="display-6 fw-semibold">Gợi ý cho bạn</h2>
      </div>

      <div class="row"> 
        <?php require ('ketnoi/connect.php');
            $sql_str = "SELECT *
                        FROM tailieu
                       order by RAND() LIMIT 8";
            $result = mysqli_query($conn,$sql_str);
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
        <!-- <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item2.jpg" class="img-fluid rounded-3" alt="image"></a>
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
                <h5 class="course-title py-2 m-0">Web Wizardry 101: Mastering the Internet</h5>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item3.jpg" class="img-fluid rounded-3" alt="image"></a>
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
                <h5 class="course-title py-2 m-0">E-Learning Essentials: A Comprehensive Guide</h5>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">Sale</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item4.jpg" class="img-fluid rounded-3" alt="image"></a>
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
                <h5 class="course-title py-2 m-0">CyberClass 101: A Guide to Online Education</h5>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div> 
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item5.jpg" class="img-fluid rounded-3" alt="image"></a>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item6.jpg" class="img-fluid rounded-3" alt="image"></a>
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
                <h5 class="course-title py-2 m-0">Web Wizardry 101: Mastering the Internet</h5>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">New</span>
          </div> 
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item7.jpg" class="img-fluid rounded-3" alt="image"></a>
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
                <h5 class="course-title py-2 m-0">E-Learning Essentials: A Comprehensive Guide</h5>
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
        <div class="col-sm-6 col-lg-4 col-xl-3 mb-5">
          <div class="z-1 position-absolute m-4">
            <span class="badge text-white bg-secondary">Sale</span>
          </div>
          <div class="card rounded-4 border-0 shadow-sm p-3 position-relative">
            <a href="courses-details.html"><img src="images/item8.jpg" class="img-fluid rounded-3" alt="image"></a>
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
                <h5 class="course-title py-2 m-0">CyberClass 101: A Guide to Online Education</h5>
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
        </div> -->
      </div>

      <div class="text-center mt-4">
        <a href="alltext.php" class="btn btn-primary px-5 py-3">Xem thêm</a>
      </div>

    </div>
  </section>

<?php require("thanhphan/footer.php");?>