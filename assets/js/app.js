const dateSpan = document.querySelectorAll(".date");
const date = new Date ();

dateSpan.forEach(span => {
    span.textContent = date.getFullYear();
});