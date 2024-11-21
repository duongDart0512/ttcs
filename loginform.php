<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
	<link href="https://fonts.googleapis.com/css2?family=Moderustic:wght@300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="">
            <h1>Login</h1>
            <div class="formcontrol" >
                <input id="username" type="text" placeholder="Username">
                <small></small>
                <span></span>
            </div>
            <div class="formcontrol ">
                <input id="Password" type="text" placeholder="Password">
                <small></small>
                <span></span>
            </div>
            <button type="submit" class="btnLogin" name = "login">Login</button>
            <div class="signuplink">
                Not a member?  <a href="register.php">Sign Up</a>
            </div>
        </form>
    </div>
</body>
<style>

:root{
    --success-color- : #2691d9;
    --error-color- : #e74c3c;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background: linear-gradient(120deg,#3ca7ee,#9b488f);
    height: 100vh;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins';
}
.container{
    width: 400px;
    background: white;
    border: none;
    outline: none;
    border-radius: 10px;
    padding: 40px;
}
.container h1{
    text-align: center;
}
.formcontrol input{
    border: none;
    outline: none;
    border-bottom: 1px solid #adadad;
    padding: 10px;
    
}
.formcontrol{
    width: 100%;
    display: flex;
    flex-direction: column;
    position: relative;
    margin-top: 40px;
}
.formcontrol small{
    margin-left: 10px;
    margin-top: 5px;
}
.formcontrol span{
    position: absolute;
    border-bottom:  3px solid var(--success-color-);
    left: 0;
    top: 35px;
    width: 0%;
    transition: 0.3s;
}
.formcontrol input:focus ~ span{
    width: 100%;
}
.formcontrol.error small{
    color: var(--error-color-);
}
.formcontrol.error input{
    border-bottom: 1px solid var(--error-color-);
}
.btnLogin{
    width: 100%;
    height: 50px;
    border-radius: 25px;
    border: none;
    outline: none;
    background: var(--success-color-);
    color: white;
    font-size: 20px;
    margin-top: 10px;
    font-weight: bold;
    cursor: pointer;
}
.btnLogin:hover{
    scale: 0.9;
    opacity: 0.9;
    transition: 0.3s;
}
.signuplink{
    text-align: center;
}
.signuplink a{
    color: var(--success-color-);
    text-decoration: none;
    cursor: pointer;
}

</style>
<script >
	var username = document.querySelector('#username')//id thi dung # nhe em
var Email = document.querySelector('#Email')
var Password = document.querySelector('#Password')
var Comfirm = document.querySelector('#Confirm')
var form = document.querySelector('form')

function showError(input,massage){
    let parent = input.parentElement
    let small = parent.querySelector('small')
    parent.classList.add('error')
    small.innerText = massage
}

function showSuccess(input,massage){
    let parent = input.parentElement
    let small = parent.querySelector('small')
    parent.classList.remove('error')
    small.innerText = ''
}

function checkEmptyError(listInput){
    let isEmptyError = false
    listInput.forEach(input => {
    input.value = input.value.trim()

    if(input.value ==''){
        isEmptyError = true
            showError(input,'Khong duoc de trong')
        }else{
            showSuccess(input)
        }
    });
    return isEmptyError
}

function checkEmail(input){
    const regexEmail =
  /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  input.value = input.value.trim()
  let isEmailError = !regexEmail.test(input.value)
  if(regexEmail.test(input.value)){
    showSuccess(input,'')
  }else{
    showError(input,'Email không hợp lệ')
  }
  return isEmailError
 }
 function checkLenght(input,min,max){
    input.value = input.value.trim()
    if(input.value.lenght < min){
        showError(input,'Không đảm bảo độ dài')
        return true
    }else if(input.value > max){
        showError(input,'Vuot qua ki tu cho phep')
        return true
    }

    return false
 }
 function checkMatch(inputPassword,confirminputPassword){
    if(inputPassword.value != confirminputPassword.value){
        showError(confirminputPassword,'Mật khẩu không trùng hợp')
        return true
    }
    return false
 }

form.addEventListener('submit', function(e){
    e.preventDefault()

    let isEmptyError = checkEmptyError([username,Email,Password,Comfirm])
    let isEmailError=checkEmail(Email)
    let isUsernameError = checkLenght(username,3,15)
    let isPasswordError = checkLenght(Password,8,23)
    let ischeckMatch = checkMatch(Password,Comfirm)

})
if(isEmptyError||isEmailError||isUsernameError||isPasswordError||ischeckMatch){
    // do nothing
}else{
    
}
</script>
</html>