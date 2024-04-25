let placeTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".info",
    start: "0% 80%",
    end: "100% 80%",
    scrub: true,
  },
  defaults: {
    duration: 1.5,
    opacity: 0,
    delay: 0.4,
  },
});

placeTl
  .from(".line", { clipPath: "inset(100%)" })
  .from(".info_to", { transform: "scale(0.95)" })
  .from(".info_1", { transform: "scale(0.95)" }, "<")
  .from(".info_2", { transform: "scale(0.95)" }, "<")
  .from(".info_date", { transform: "scale(0.95)" }, "<")
  .from(".info_add", { transform: "scale(0.95)" }, "<")
  .from(".info_place", { transform: "scale(0.95)" }, "<");

let programmTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".programm",
    start: "0% 80%",
    end: "100% 80%",
    scrub: false,
  },
  defaults: {
    duration: 1,
    opacity: 0,
    delay: 0.4,
  },
});

programmTl.from(".programm_title", { transform: "scale(0.95)" });

let programmSection = gsap.utils.toArray(".line-section:nth-child(odd)");
programmSection.forEach((section) => {
  gsap.from(section, {
    x: 200,
    opacity: 0,
    duration: 2.5,
    ease: "expo.out",
    scrollTrigger: {
      trigger: section,
      start: "10% 80%",
      end: "100% 80%",
    },
  });
});

let programmSection2 = gsap.utils.toArray(".line-section:nth-child(even)");
programmSection2.forEach((section) => {
  gsap.from(section, {
    x: -200,
    opacity: 0,
    duration: 2.5,
    ease: "expo.out",
    scrollTrigger: {
      trigger: section,
      start: "10% 80%",
      end: "100% 80%",
    },
  });
});

let dressTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".dresscode",
    start: "10% 80%",
    end: "70% 80%",
    scrub: false,
  },
  defaults: {
    duration: 1.5,
    opacity: 0,
    delay: 0.4,
  },
});

dressTl
  .from(".dresscode h2", { transform: "scale(0.95)" })
  .from(".dresscode p", { transform: "scale(0.95)" }, "<")
  .from(
    ".dresscode_colors",
    { y: -8, stagger: 0.5, transform: "scale(0.95)" },
    "<"
  );

let hashtagTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".hashtag",
    start: "10% 80%",
    end: "70% 80%",
    scrub: false,
  },
  defaults: {
    duration: 1.2,
    opacity: 0,
    delay: 0.4,
  },
});

hashtagTl
  .from(".hashtag h2", { transform: "scale(0.95)" })
  .from(".hashtag p", { transform: "scale(0.9)" }, "<")
  .from(".hashtag span", { transform: "scale(0.95)" }, "<");

let formTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".form",
    start: "10% 80%",
    end: "70% 80%",
    scrub: false,
  },
  defaults: {
    duration: 1.2,
    opacity: 0,
    delay: 0.4,
  },
});

formTl
  .from(".form p", { transform: "scale(0.95)" })
  .from(".form form", { transform: "scale(0.95)" }, "<");

let timerTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".timer",
    start: "10% 80%",
    end: "70% 80%",
    scrub: false,
  },
  defaults: {
    duration: 1,
    opacity: 0,
    delay: 0.4,
  },
});

timerTl
  .from(".timer-title", { transform: "scale(0.95)" })
  .from(".count-container", { transform: "scale(0.95)" }, "<")
  .from(".note", { transform: "scale:(0.95)" }, "<");

let contactsTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".contacts",
    start: "0% 80%",
    end: "70% 80%",
    scrub: false,
  },
  defaults: {
    duration: 1.2,
    opacity: 0,
    delay: 0.4,
  },
});

contactsTl
  .from(".contacts h2", { transform: "scale(0.95)" })
  .from(".contacts a", { transform: "scale(0.95)" }, "<");
