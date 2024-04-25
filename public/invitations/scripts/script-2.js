// ============ GSAP ===========
window.addEventListener("load", () => {
  document.querySelector(".preview").style.opacity = "1";
  document.querySelector(".info").style.opacity = "1";
  document.querySelector(".line").style.opacity = "1";
  previewAnimation();
});

function previewAnimation() {
  let infoTl = gsap.timeline({
    defaults: {
      duration: 3,
      opacity: 0,
      delay: 0.3,
    },
  });

  infoTl
    .from(".couple_img", { transform: "scale(0.95)", opacity: 0 })
    .to(
      ".cherry1",
      {
        clipPath: "circle(100% at 40% 60%)",
        opacity: 1,
        duration: 8,
        scale: 1,
        rotate: "40deg",
      },
      "<"
    )
    .from(".groom_name", { transform: "scale(0.95)", x: -15 }, "<")
    .from(".wed-names .and", { transform: "scale(0.95)" }, "<")
    .from(".bride_name", { transform: "scale(0.95)", x: 15 }, "<")
    .to(
      ".cherry3",
      {
        clipPath: "circle(100% at 80% 20%)",
        opacity: 1,
        duration: 6,
        scale: 1.1,
        rotate: "40deg",
      },
      0.8
    )
    .to(
      ".cherry4",
      {
        clipPath: "circle(100% at 50% 10%)",
        opacity: 1,
        duration: 5,
        scale: 1.05,
        rotate: "-25deg",
      },
      "<"
    )
    .to(
      ".cherry2",
      {
        clipPath: "circle(100% at 80% 20%)",
        opacity: 1,
        duration: 5,
        scale: 1.08,
        rotate: "41deg",
        delay: 0.8,
      },
      "<"
    );

  return infoTl;
}

let leaf1Tl = gsap.timeline({
  scrollTrigger: {
    trigger: ".preview",
    start: "10% 10%",
    end: "140% 10%",
    scrub: true,
  },
  defaults: {
    delay: 0,
  },
});
leaf1Tl
  .to(".cherryleaf1", { y: 1100, x: 150, rotate: "80deg", scaleX: -1 })
  .to(".cherryleaf2", { y: 1300, x: -30, rotate: "120deg", scale: 1.1 }, "<")
  .to(".cherryleaf3", { y: 1800, x: 180, rotate: "-150deg" }, "<")
  .to(".cherryleaf4", { y: 1600, x: -100, rotate: "-100deg", scaleY: -1 }, "<")
  .to(".cherryleaf5", { y: 1150, x: -130, rotate: "-40deg", scaleX: -1 }, "<");

let psTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".ps",
    start: "-10% 90%",
    end: "100% 90%",
    scrub: false,
  },
  defaults: {
    duration: 1.2,
    opacity: 0,
    delay: 0.4,
  },
});

psTl
  .from(".ps h2", { transform: "scale(0.95)" }, "<")
  .to(
    ".ps .cherry07",
    {
      clipPath: "circle(100% at 40% 60%)",
      opacity: 1,
      duration: 4,
      scale: 1.2,
      rotate: "-3deg",
    },
    "<"
  )
  .to(
    ".ps .cherry08",
    {
      clipPath: "circle(100% at 70% 30%)",
      opacity: 1,
      duration: 5,
      scale: 1.15,
      rotate: "23deg",
    },
    "<"
  )
  .to(
    ".ps .cherry09",
    {
      clipPath: "circle(100% at 80% 90%)",
      opacity: 1,
      duration: 2,
      scale: 1.15,
      rotate: "-88deg",
    },
    "<"
  );
