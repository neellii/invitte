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
      ".preview__leaf1",
      {
        y: 45,
        scale: 0.95,
        opacity: 0,
        clipPath: "none",
      },
      {
        scale: 1,
        y: 0,
        duration: 6,
        opacity: 1,
        clipPath: "ellipse(84% 88% at 44% 40%)",
      },
      "<"
    )
    .fromTo(
      ".preview__leaf2",
      {
        scaleY: -1,
        rotate: "24deg",
        opacity: 0,
        x: -20,
      },
      {
        scaleY: -1,
        duration: 4,
        rotate: "26deg",
        opacity: 1,
        x: 0,
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
    ".ps .leaf07",
    {
      clipPath: "circle(100% at 40% 60%)",
      opacity: 1,
      duration: 4,
      rotate: "-3deg",
    },
    "<"
  )
  .fromTo(
    ".ps .leaf08",
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
