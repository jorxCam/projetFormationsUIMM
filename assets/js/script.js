let slideIndex = 1;
if( document.getElementsByClassName("slides-formations")[0]){
showSlides(slideIndex);}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slide-formation");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

//script for the dashboard

// Get the modal
var modal = document.getElementById("id02");

// Get the button that opens the modal
var btn = document.getElementsByClassName("ButtonArchive");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var idForm = 0;

// When the user clicks on the button, open the modal
for (let item of btn) {
    item.onclick = function () {
        modal.style.display = "block";
        idForm = item.id;
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {

    if (event.target === modal) {
        modal.style.display = "none";
    }
}

var form = document.getElementById("formDelete");

form.onsubmit = function (){
    form.action = "assets/function/confirmDeleteFormation.php?q=" + idForm;
}
