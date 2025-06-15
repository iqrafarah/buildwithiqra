document.addEventListener("DOMContentLoaded", function () {
  // Initialize Swiper with autoplay
  const heroSwiper = new Swiper(".hero-swiper", {
    loop: true,
    grabCursor: true,
    slidesPerView: "auto",
    speed: 3000,
    spaceBetween: 20,
    autoplay: {
      delay: 5000,
      disableOnInteraction: true,
    },
  });
});
