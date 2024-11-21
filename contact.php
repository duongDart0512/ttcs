<?php require("thanhphan/header.php")
?>
<div class="introduce">
    <div class="cardcontact">
        <div class="cardcontact_img">
            <img src="images/TuanAnh.jpg" alt="">  
        </div>
        <h2>Trịnh Tuấn Anh</h2>
        <p>President</p>
        <div class="card_social">
            <a href="https://www.facebook.com/">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://www.tiktok.com/@beaugirl21?lang=vi">
                <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>
    <div class="cardcontact">
        <div class="cardcontact_img">
            <img src="images/DuongDo.jpg" alt="">  
        </div>
        <h2>Dương Đỗ</h2>
        <p>CEO</p>
        <div class="card_social">
            <a href="">
            <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="">
            <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>
    <div class="cardcontact">
        <div class="cardcontact_img">
            <img src="images/VanMinh.jpg" alt="">  
        </div>
        <h2>Văn Minh</h2>
        <p>CEO</p>
        <div class="card_social">
            <a href="">
            <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="">
            <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="">
                <i class="fa-brands fa-github"></i>
            </a>
        </div>
    </div>
</div>
    <style>
        :root{
    --primary-color-: #f2726a;
}

.introduce{
    margin-top : 10px;
    height: 100vh;
    background: linear-gradient(to right ,#4daf54,#3d8880);
    display: flex;
    align-items: center;
    justify-content: center;

}
.cardcontact{
    background: #242628;
    height: 300px;
    width: 280px;
    border-radius: 10px;
    text-align: center;
    overflow: hidden;/*Phần tràn bị cắt bớt và phần còn lại của nội dung sẽ ẩn đi*/
    margin: 0 25px;
}
img{
    object-fit: cover;
    height: 100%;
    width: 100%;
    object-position: center;
}
.cardcontact_img{
    height: 100px;
    width: 100px;
    border-radius: 50%;
    border: 4px solid var(--primary-color-);
    overflow: hidden;/*cho anh khop voi khun*/
    margin: 0 auto;
    transform: translateY(20px);
    cursor: pointer;
    transition: 0.5s;
}
.cardcontact_img:hover{
    height: 100%;
    width: 100%;
    border-radius: unset;
    border: none;
    transform: unset;
}
.cardcontact h2{
   margin-top: 50px;
    color: white;
}
.cardcontact p{
    color: var(--primary-color-);
}
.card_social{
    margin: 25px 0px;

}
a:hover{
    transform: scale(0.9);
}
.card_social a{
    color: white;
    margin: 10px 20px;
    font-size: 20px;
    cursor: pointer;
}
.buttoncard{
    width: 140px;
    height: 45px;
    background: none;
    border: 1px solid var(--primary-color-);
    color: white;
    font-size: 15px;
    text-align: center;
    margin-top: 30px;
    border-radius: 5px;
    cursor: pointer;
}
.buttoncard:hover{
    background: #f2726a;
}

    </style>
<?php require("thanhphan/footer.php")?>