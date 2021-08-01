let email = document.querySelector("input[name=email]");
email.addEventListener("input", checkEmail);
function checkEmail(){
    console.log('change')
}