// Inputs in the form
let nameInput = document.querySelector("input[name=name]");
let emailInput = document.querySelector("input[name=email]");
let _token = document.querySelector("input[name='_token'").value;
let odeslat = document.querySelector("button[type=submit]");
let password = document.querySelector("#password");
let passwordConfirm = document.querySelector("#password-confirm");
let passwordWarning = document.querySelector("#password-warning");
//Warning for pasword
let varovani = document.querySelector("#varovani");
//Register form
let registerForm = document.forms[0];
//Event on blur for email and submit on form
emailInput.addEventListener("blur", checkEmail);
registerForm.addEventListener("submit", checkForm);
//Check if passwords match
function passwordCheck() {
    if (password.value == passwordConfirm.value) {
        passwordWarning.classList.add("hide-text");
        odeslat.disabled = false;
        return false;
    } else {
        passwordWarning.classList.remove("hide-text");
        odeslat.disabled = true;
        return true;
    }
}

//AJAX check if the email is available
function checkEmail(event) {
    let email = emailInput.value;
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (filter.test(email)) {
        $.ajax({
            url: "/~perglvit/public/email/check",
            method: "POST",
            data: { email: email, _token: _token },
            success: function(res) {
                if (res.trim() == "taken") {
                    varovani.classList.remove("hide-text");
                    odeslat.disabled = true;
                } else {
                    varovani.classList.add("hide-text");
                    odeslat.disabled = false;
                }
            }
        });
    }
}

//Check form on submit
function checkForm(e) {
    if(passwordCheck()){
        e.preventDefault();
    }
    //email regex
    let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    //Regex for checking if number is in text
    let nunberRegex = /\d/;
    if (
        emailInput.value == "" ||
        !emailInput.value.includes("@") ||
        !emailRegex.test(emailInput.value)
    ) {
        emailInput.classList.add("is-invalid");
        e.preventDefault();
    } else if (nameInput.value == "" || nunberRegex.test(nameInput.value)) {
        nameInput.classList.add("is-invalid");
        e.preventDefault();
    } else if (password == "" || password.lentgh < 8) {
        password.classList.add("is-invalid");
        e.preventDefault();
    } else if (passwordConfirm == "" || passwordConfirm.lentgh < 8) {
        passwordConfirm.classList.add("is-invalid");
        e.preventDefault();
    }
}
