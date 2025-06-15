document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobile-menu");

  hamburger.addEventListener("click", function () {
    console.log("show");
    mobileMenu.classList.toggle("flex");
  });
});

// Register GSAP ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

// zoom image on scroll
gsap.to(".scroll-scale-image", {
  scale: 1.5,
  scrollTrigger: {
    trigger: ".scroll-scale-image",
    start: "top 80%",
    end: "bottom top",
    scrub: 0.5, // Reduced scrub for smoother transitions
  },
});

// Unified animateOnScroll function
function animateOnScroll(selector, animationProps, stagger = 0) {
  gsap.utils.toArray(selector).forEach((element) => {
    gsap.from(element, {
      ...animationProps,
      scrollTrigger: {
        trigger: element,
        start: "top 85%",
        toggleActions: "play none none reverse",
      },
      stagger: stagger, // Add stagger for grouped animations
    });
  });
}

// Apply animations to different elements
animateOnScroll(
  ".work-card",
  {
    y: 50,
    opacity: 0,
    duration: 1,
    ease: "power3.out",
  },
  0.2
);

animateOnScroll("#hero h1", {
  y: 20,
  opacity: 0,
  duration: 1,
  ease: "power3.out",
});

// Synchronize slider animation with hero title
gsap.from("#hero-slider", {
  y: 20,
  opacity: 0,
  duration: 1,
  ease: "power3.out",
  scrollTrigger: {
    trigger: "#hero h1", // Trigger animation when hero title is visible
    start: "top 85%",
    toggleActions: "play none none reverse",
  },
});

animateOnScroll(".btn", {
  y: 20,
  opacity: 0,
  duration: 1,
  ease: "power3.out",
});

animateOnScroll(".title", {
  y: 10,
  opacity: 0,
  duration: 1.2,
  ease: "power3.out",
});

animateOnScroll(".paragraph", {
  y: 20,
  opacity: 0,
  duration: 1,
  ease: "power3.out",
});

animateOnScroll(".pre-title", {
  x: 30,
  opacity: 0,
  duration: 1,
  ease: "power3.out",
});

animateOnScroll(".work-title", {
  y: 5,
  opacity: 0,
  duration: 0.8,
  ease: "power3.out",
});

animateOnScroll(".work-description", {
  y: 5,
  opacity: 0,
  duration: 0.8,
  ease: "power3.out",
});

animateOnScroll(".service-details", {
  y: 10,
  opacity: 0,
  duration: 0.8,
  ease: "power3.out",
});
