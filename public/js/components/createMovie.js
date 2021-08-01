// Inputs in the form
let title = document.querySelector('#title');
let description = document.querySelector('#description');
let producedAt = document.querySelector('#produced_at');
let genre = document.querySelector('#genres');
let image = document.querySelector('#image');
let imageDisplayed = document.querySelector('img');

if(imageDisplayed === null){
    image.required = true;
}
//Getting desired form
let createForm = document.forms[1];
//Relation for movies table. One genre can hold many movies
createForm.addEventListener("submit", checkForm);

function checkForm(e) {
    //Check if title is blank
    if (title.value.trim() == "") {
        //Add red border to the field
        title.classList.add("is-invalid");
        e.preventDefault();
    }
    if (description.value.trim() == "" || description.value.length < 100) {
        description.classList.add("is-invalid");
        e.preventDefault();
    }
    if(typeof new Date(producedAt.value).getMonth !== 'function'){
        producedAt.classList.add("is-invalid");
        e.preventDefault();
    }
    if (genre.value.trim() == "") {
        description.classList.add("is-invalid");
        e.preventDefault();
    }
    if(!/^-?\d+$/.test(genre.value)){
        genre.classList.add("is-invalid");
        e.preventDefault();
    }
    if(imageDisplayed === null && (image.value == "" || image.value === null)){
        image.classList.add("is-invalid");
        e.preventDefault();
    }
}
