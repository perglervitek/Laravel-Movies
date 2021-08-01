// let emailInput = document.querySelector("input[name=email]");
// let varovani = document.querySelector("#varovani");
// let _token = document.querySelector("input[name='_token'").value;
// let odeslat = document.querySelector("button[type=submit]")
// let password = document.querySelector("#password");
// let passwordConfirm = document.querySelector("#password-confirm");
// let passwordWarning = document.querySelector("#password-warning");
// let registerForm = document.forms[0];

// emailInput.addEventListener("blur", checkEmail);
// registerForm.addEventListener('submit', checkForm);

// function checkEmail(event) {
//     let email = emailInput.value;
//     let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//     if(filter.test(email)){
//         $.ajax({
//             url: "/email/check",
//             method: "POST",
//             data: {email: email, _token:_token},
//             success:function(res){
//                 if(res.trim() == "taken"){
//                     varovani.classList.remove("hide-text");
//                     odeslat.disabled = true;
//                 }else{
//                     varovani.classList.add("hide-text");
//                     odeslat.disabled = false;
//                 }
//             }
//         })
//     }
// }

// let passwordCheck = function() {

//     if (password.value == passwordConfirm.value) {
//         passwordWarning.classList.add("hide-text");
//         odeslat.disabled = false;
//     } else {
//         passwordWarning.classList.remove("hide-text");
//         odeslat.disabled = true;
//     }
//   }

//   let checkForm = function(e){
//       console.log('checking')
//       e.preventDefault();
//     return false;
// }