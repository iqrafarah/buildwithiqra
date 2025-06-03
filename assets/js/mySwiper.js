document.addEventListener("DOMContentLoaded", function () {
  const heroSwiper = new Swiper(".hero-swiper", {
    direction: "horizontal",
    loop: true,
    grabCursor: false,
    // autoplay: {
    //   disableOnInteraction: false,
    //   pauseOnMouseEnter: false,
    // },
    speed: 2000,
    spaceBetween: 20,
    breakpoints: {
      320: { slidesPerView: 1.5 },
      480: { slidesPerView: 2.5 },
      768: { slidesPerView: 4.5 },
    },
  });
});
