let prevScrollPos = window.pageYOffset;
const header = document.querySelector("header");

window.onscroll = function () {
    const currentScrollPos = window.pageYOffset;
    if (prevScrollPos > currentScrollPos) {
        header.classList.remove("hidden");
    } else {
        header.classList.add("hidden");
    }
    prevScrollPos = currentScrollPos;
};
const seachInput  = document.querySelector(".search-container input");

seachInput.addEventListener("input", function(event){
    const removeIcon = document.querySelector(".search-container span");
    if(event.target.value != ""){
        removeIcon.classList.add("show");
    }else{
        removeIcon.classList.remove("show");
    }
});
function removeInputValue(element){
    const seachInput  = document.querySelector(".search-container input");
    seachInput.value = "";
    element.classList.remove("show");
}