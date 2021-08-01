// Inputs in the form
let emailInput = document.querySelector("input[name=email]");
let password = document.querySelector("#password");
//Getting desired form
let loginForm = document.forms[0];
//eventlistiner on submit to the form
loginForm.addEventListener("submit", checkForm);


function checkForm(e) {
    //Regex to check if it is email
    let emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (
        emailInput.value == "" ||
        !emailInput.value.includes("@") ||
        !emailRegex.test(emailInput.value)
    ) {
        emailInput.classList.add("is-invalid");
        e.preventDefault();
    } else if (password == "" || password.lentgh < 8) {
        password.classList.add("is-invalid");
        e.preventDefault();
    }
}
