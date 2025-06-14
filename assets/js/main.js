document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobile-menu");

  hamburger.addEventListener("click", function () {
    console.log("show");
    mobileMenu.classList.toggle("flex");
  });
});

// zoom image on scroll
gsap.registerPlugin(ScrollTrigger);

gsap.to(".scroll-scale-image", {
  scale: 1.5,
  scrollTrigger: {
    trigger: ".scroll-scale-image",
    start: "top 80%",
    end: "bottom top",
    scrub: true,
  },
});

// horizontal text scroll
gsap.to(".scroll-item", {
  xPercent: -70,
  ease: "none",
  scrollTrigger: {
    markers: false,
    scrub: true,
  },
});
