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
      delay: 0.5,
    },
  });

  infoTl
    .from(".couple_img", { transform: "scale(0.95)", opacity: 0 })
    .to(
      ".preview__leaf-3",
      {
        clipPath: "circle(100% at 40% 60%)",
        opacity: 1,
        duration: 4,
        scale: 1.1,
        rotate: "38deg",
      },
      "<"
    )
    .from(".groom_name", { transform: "scale(0.95)", x: -15 }, "<")
    .from(".wed-names .and", { transform: "scale(0.95)" }, "<")
    .from(".bride_name", { transform: "scale(0.95)", x: 15 }, "<")
    .to(
      ".preview__leaf-4",
      {
        clipPath: "circle(100% at 50% 50%)",
        opacity: 1,
        duration: 4,
        scale: 1.1,
        rotate: "-40deg",
      },
      1.5
    )
    .to(
      ".preview__leaf-1",
      {
        clipPath: "circle(100% at 80% 20%)",
        opacity: 1,
        duration: 5,
        scale: 1.05,
        rotate: "-8deg",
      },
      "<"
    )
    .to(
      ".preview__leaf-2",
      {
        clipPath: "circle(100% at 20% 80%)",
        opacity: 1,
        duration: 4,
        scale: 1.08,
        rotate: "41deg",
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
  .from(".ps h2", { transform: "scale(0.95)" }, "<")
  .to(
    ".ps .leaf05",
    {
      clipPath: "circle(100% at 40% 60%)",
      opacity: 1,
      duration: 5,
      scale: 1.2,
      rotate: "-3deg",
    },
    "<"
  )
  .to(
    ".ps .leaf06",
    {
      clipPath: "circle(100% at 70% 30%)",
      opacity: 1,
      duration: 5,
      scale: 1.15,
      rotate: "23deg",
    },
    "<"
  );
