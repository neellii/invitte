// ============ GSAP ===========
window.addEventListener("load", () => {
  document.querySelector(".preview").style.opacity = "1";
  document.querySelector(".info").style.opacity = "1";
  previewAnimation();
});

function previewAnimation() {
  let infoTl = gsap.timeline({
    defaults: {
      duration: 3,
      opacity: 0,
      delay: 0.5,
    },
  });

  infoTl
    .from(".couple_img", { transform: "scale(0.95)", opacity: 0 })
    .fromTo(
      ".preview__star1",
      {
        y: 45,
        scaleX: -1,
        scale: 0.95,
        opacity: 0,
      },
      {
        scale: 1,
        scaleX: -1,
        y: 0,
        duration: 4,
        opacity: 1,
      },
      "<"
    )
    .from(
      ".preview__star2",
      {
        scale: 0.95,
        y: 30,
        duration: 4,
      },
      1.5
    )
    .from(".groom_name", { transform: "scale(0.95)", x: -15 }, "<")
    .from(".wed-names .and", { transform: "scale(0.95)" }, "<")
    .from(".bride_name", { transform: "scale(0.95)", x: 15 }, "<");

  return infoTl;
}

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
  .to(
    ".ps .stars07",
    {
      clipPath: "circle(100% at 40% 60%)",
      opacity: 1,
      duration: 4,
      scale: 1.2,
      rotate: "-3deg",
    },
    "<"
  )
  .fromTo(
    ".ps .stars08",
    {
      scaleX: -1,
      opacity: 0,
      scale: 0.95,
      clipPath: "none",
    },
    {
      clipPath: "circle(100% at 70% 30%)",
      opacity: 1,
      duration: 5,
      scale: 1,
      scaleX: -1,
    },
    "<"
  )
  .from(".ps h2", { transform: "scale(0.95)" }, "<");
