document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobile-menu");

  hamburger.addEventListener("click", function () {
    console.log("show");
    mobileMenu.classList.toggle("flex");
  });
});
