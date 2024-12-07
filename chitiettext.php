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
                  <!-- <span class="badge text-white bg-secondary" >PDF</span> -->
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
    <button class="chatbot-toggler">
        <span class="material-symbols-outlined">
            mode_comment
            </span>
        <span class="material-symbols-outlined">
            close
            </span>
    </button>
    <div class="chatbot">
        <header>
            <h2>Chat bot</h2>
        </header>
        <ul class = "chatbox">
            <li class = "chat incoming">
                <span class="material-symbols-outlined">
                    smart_toy
                    </span>
                <p>xin chào  <br>Tôi có thể giúp gì cho bạn? </p>
            </li>
            
        </ul>
        <div class="chat-input">
            <textarea placeholder="Nhập câu hỏi..." required></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
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
// chatbot
const chatInput = document.querySelector(".chat-input textarea")
const sendBtn = document.querySelector(".chat-input span")
const chatBox = document.querySelector(".chatbox")
const chatbotToggler = document.querySelector(".chatbot-toggler")

let userMessage;
const API_KEY = "pk-OzUBuOseTTzNmIfCqGvfbFoRsJhSbXeBFuyyVYJRLbMWCKIR";
const InputInitheight = chatInput.scrollHeight;
const createChatLi = (message, className) => {
    const chatLi = document.createElement("li")
    chatLi.classList.add("chat", className )
    let contentChat = className === "outcoming" ? `<p></p>` : `<span class="material-symbols-outlined">
                    smart_toy
                    </span><p></p>`;
    chatLi.innerHTML = contentChat;
    chatLi.querySelector("p").textContent = message;
    return chatLi;
}
const generateResponse = (incomingChatLi) =>{
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = incomingChatLi.querySelector("p");
    const requestOptions = {
        method : "POST",
        headers :{
            "Content-Type" : "application/json",
            "Authorization" : `Bearer ${API_KEY}`
        },
        body : JSON.stringify({
           model: "gpt-3.5-turbo",
        messages: [
        {
            role: "user",
            content : userMessage
        }]
        })
    }
    fetch(API_URL,requestOptions).then(res => res.json()).then(data => {
        messageElement.textContent = data.choices[0].message.content;
    }).catch((error) => {
        messageElement.textContent = "Xin loi.. Da xay ra loi.Vui long thu lai";
    }).finally(()=> chatBox.scroll(0,chatBox.scrollHeight));
        
    
}
const handleChat = () =>{
    userMessage = chatInput.value.trim();
    if(!userMessage)    return;

    chatInput.value = "";

    chatBox.appendChild(createChatLi(userMessage,"outcoming"));
    chatBox.scroll(0,chatBox.scrollHeight);
    
    setTimeout(() => {
        const incomingChatLi = createChatLi("Vui long doi...","incoming")
        chatBox.appendChild(incomingChatLi);
        chatBox.scroll(0,chatBox.scrollHeight);
        generateResponse(incomingChatLi);
    },600)
}
chatInput.addEventListener("input",() => {
    chatInput.style.height = `${InputInitheight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
})
chatInput.addEventListener("keydown",(e) => {
    if(e.key === "Enter"){
        e.preventDefault();
        handleChat();
    }
})
chatbotToggler.addEventListener("click",() => document.body.classList.toggle("show-chatbot"));
sendBtn.addEventListener("click",handleChat)
</script>  
<style>
  .chatbot header{
    background: #724ae8;
    padding: 16px 0 ;
    text-align: center;
    border-radius: 15px 15px 0 0 ;
}
.chatbot header h2{
    color: #fff;
    font-size: 1.4rem;
}
.chatbot .chatbox{
    
    height: 350px;
    overflow-y: auto;
    padding: 15px 20px 100px;
}
.chatbot .chat{
    display: flex;
}
.chatbot .incoming span{
    height: 25px;
    width: 25px;
    color: #fff;
    align-items: flex-end;
    background: #724ae8;
    text-align: center;
    line-height: 25px;
    border-radius: 4px;
    margin: 0 10px 7px 0;
}
.chatbot .outcoming{
    justify-content: flex-end;
    margin: 20px 0;
}
.chatbot .chat p{
    color: #fff;
    padding: 12px 16px;
    border-radius: 10px 10px 0 10px;
    white-space: pre-wrap;
    background: #724ae8;
    font-size: 14px;
}
.chatbot .incoming p{
 color: #000;
 background: #f2f2f2;
 border-radius: 0 10px 10px 10px;
}
.chatbot .chat-input{
    position: absolute;
    bottom: 0;
    gap: 5px;
    width: 100%;
    display: flex;
    background: #fff;
    padding: 5px 20px;
    border-top: 1px solid #ccc;
}
.chat-input textarea{
    border: none;
    outline: none;
    font-size: 16px;
    width: 100%;    
    resize: none;
    padding: 15px 16px 15px 0;
}
.chat-input span{
    align-self:flex-end;
    height: 30px;
    line-height: px;
    color: #724ae8;
    font-size: 1.35rem;
    cursor: pointer;
    margin-bottom: 30px;
    visibility: hidden;
}
.chat-input textarea:valid ~ span{
    visibility: visible;
}
.chatbot{
    position: fixed;
    background: white;
    width: 350px;
    right: 40px;
    transform: scale(0.5);
    opacity: 0;
    pointer-events: none;
    overflow: hidden;
    bottom: 90px;
    transform-origin: bottom right;
    border-radius: 15px;
    box-shadow: 0 0 128px rgba(0,0,0,0.1), 0 32px 64px -48px rgba(0,0,0,0.5);
    transition: all 0.1s ease;
}
.show-chatbot .chatbot{
    transform: scale(1);
    opacity: 1;
    pointer-events: auto;
}
.chatbot-toggler{
    position: fixed;
    right: 40px;
    bottom: 30px;
    height: 50px;
    width: 50px;
    color: #fff;
    border: none;
    outline: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    background: #724ae8;
    border-radius: 50%;
    transition: all 0.3s ease;
}
.chatbot-toggler span{
    position: absolute;
}
.show-chatbot .chatbot-toggler{
    transform: rotate(90deg);
}
.show-chatbot .chatbot-toggler span:first-child,
.chatbot-toggler span:last-child{
    opacity: 0;
}
.show-chatbot .chatbot-toggler span:last-child{
    opacity: 1;
}
@media(max-width:490px){
    .chatbot{
        right: 0;
        bottom: 0;
        height: 100%;
        width: 100%;
        border-radius: 0;
    }
    .chatbot .chatbox{
        height: 90%;
    }
}
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
