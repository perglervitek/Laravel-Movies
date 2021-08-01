// Inputs in the form
let title = document.querySelector('#title');
//Getting desired form
let createForm;
if(document.forms.length > 1){
    createForm  = document.forms[1];
}else{
    createForm  = document.forms[0];
}

//eventlistiner on submit to the form
createForm.addEventListener("submit", checkForm);

function checkForm(e) {
    if (title.value.trim() == "") {
        title.classList.add("is-invalid");
        e.preventDefault();
    }
}
