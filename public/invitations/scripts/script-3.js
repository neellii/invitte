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
    .from(
      ".topw",
      {
        clipPath: "inset(0 100% 0 0)",
        opacity: 1,
        duration: 4,
      },
      "<"
    )
    .from(
      ".toph",
      {
        clipPath: "inset(0 0 100% 0)",
        opacity: 1,
        duration: 4,
      },
      1.5
    )
    .from(".groom_name", { transform: "scale(0.95)", x: -15 }, "<")
    .from(".wed-names .and", { transform: "scale(0.95)" }, "<")
    .from(".bride_name", { transform: "scale(0.95)", x: 15 }, "<")
    .to(
      ".heart",
      { opacity: 1, clipPath: "circle(100% at 80% 20%)", duration: 1 },
      "<"
    )
    .from(
      ".bottomw",
      {
        clipPath: "inset(0 0 0 100%)",
        opacity: 1,
        duration: 5,
      },
      1.8
    )
    .from(
      ".bottomh",
      {
        clipPath: "inset(100% 0 0 0)",
        opacity: 1,
        duration: 4,
        delay: 0.8,
      },
      "<"
    );

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
  .from(
    ".ps .end-line",
    {
      clipPath: "inset(0 50% 0 50%)",
      duration: 5,
      opacity: 1,
    },
    "<"
  )
  .from(".ps h2", { transform: "scale(0.95)" }, "<")
  .from(".heart01", { y: -20 }, "<")
  .from(".heart02", { y: -15 }, "<");
