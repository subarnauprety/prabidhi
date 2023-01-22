var togMenu = document.getElementById("toggle-menu")
var mobMenu = document.getElementById("mobile-menu")
var crossIcon = document.getElementById("cross-icon")
togMenu.addEventListener("click", function () {
    mobMenu.classList.toggle("d-none");
});
mobMenu.addEventListener("click", function () {
    mobMenu.classList.toggle("d-none");
});
crossIcon.addEventListener("click", function () {
    console.log("asd");
    mobMenu.classList.remove("d-none");
});
