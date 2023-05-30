let navLinks = document.getElementById("navLinks");
let btnShow = document.querySelector(".bi-list");
function showMenu(){
    navLinks.style.right = "0";
    btnShow.style.visibility = "hidden";
}
function hideMenu(){
    navLinks.style.right = "-200px";
    btnShow.style.visibility = "visible";
}