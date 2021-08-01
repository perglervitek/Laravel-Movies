// Inputs in the form
let genreInput = document.querySelector("input[name=name]");
//Getting desired form
let genreForm = document.forms[1];
//eventlistiner on submit to the form
genreForm.addEventListener("submit", checkForm);

function checkForm(e) {
    if (genreInput.value == "") {
        genreInput.classList.add("is-invalid");
        e.preventDefault();
    }
}
