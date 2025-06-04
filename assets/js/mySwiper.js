document.addEventListener("DOMContentLoaded", function () {
  const heroSwiper = new Swiper(".hero-swiper", {
    loop: true,
    grabCursor: true,
    slidesPerView: "auto",
    centeredSlides: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    speed: 3000,
    spaceBetween: 20,
  });
});
