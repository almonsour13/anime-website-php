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
