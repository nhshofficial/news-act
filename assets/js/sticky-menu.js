
let logoClass = document.querySelector(".logo");
window.addEventListener("scroll", () => {
    let getScrollHeight = window.scrollY;
    if(getScrollHeight > logoClass.offsetHeight){
        navbar.classList.add("sticky-menu");
    } else {
        navbar.classList.remove("sticky-menu");
    }
}, true);