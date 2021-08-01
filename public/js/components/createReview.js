// Inputs in the form
let rating = document.querySelector("#rating");
let content = document.querySelector("#content");
//Getting desired form
let createForm;
if (document.forms.length > 0) {
    let createForm = document.forms[1];
    //eventlistiner on submit to the form
    createForm.addEventListener("submit", checkForm);

    function checkForm(e) {
        if (content.value.trim() == "" || content.value.length < 100) {
            content.classList.add("is-invalid");
            e.preventDefault();
        }
        if (!/^-?\d+$/.test(rating.value)) {
            rating.classList.add("is-invalid");
            e.preventDefault();
        }
    }
}
