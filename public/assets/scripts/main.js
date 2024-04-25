const toggleMenu = document.querySelector(".toggler");
const toggleDiv = document.querySelector(".toggle-div");
const toggleSpan1 = document.querySelector(".toggler span:nth-child(1)");
const toggleSpan2 = document.querySelector(".toggler span:nth-child(2)");
const toggleSpan3 = document.querySelector(".toggler span:nth-child(3)");
const toggleSpan4 = document.querySelector(".toggler span:nth-child(4)");

toggleMenu.addEventListener("click", (e) => {
  toggleDiv.style.left = toggleDiv.style.left === "-300%" ? "0" : "-300%";
  toggleSpan2.style.width = toggleSpan2.style.width === "0px" ? "30px" : "0px";
  toggleSpan1.style.transform =
    toggleSpan1.style.transform === "rotate(-90deg) translateX(-5px)"
      ? "rotate(0) translateX(0)"
      : "rotate(-90deg) translateX(-5px)";
  toggleSpan1.style.width =
    toggleSpan1.style.width === "25px" ? "30px" : "25px";
  toggleSpan3.style.transform =
    toggleSpan3.style.transform === "translateY(-9px)"
      ? "translateY(0)"
      : "translateY(-9px)";
  toggleSpan3.style.width =
    toggleSpan3.style.width === "25px" ? "30px" : "25px";

  toggleMenu.style.transform =
    toggleMenu.style.transform === "rotate(45deg)"
      ? "rotate(0)"
      : "rotate(45deg)";
});

const menuLinks = document.querySelectorAll(".menu li");
menuLinks.forEach((link) => {
  link.addEventListener("click", (e) => {
    toggleDiv.style.left = "-300%";
    toggleSpan2.style.width = "30px";
    toggleSpan1.style.transform = "rotate(0) translateX(0)";
    toggleSpan1.style.width = "30px";
    toggleSpan3.style.transform = "translateY(0)";
    toggleSpan3.style.width = "30px";
    toggleMenu.style.transform = "rotate(0)";
  });
});

const lenis = new Lenis({
  wheelMultiplier: 0.85,
});

function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

lenis.on("scroll", ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);
