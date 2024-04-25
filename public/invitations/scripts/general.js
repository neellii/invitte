// =========== programm line =============
if (document.querySelector(".timeline-part")) {
  const timeline = document.querySelector(".timeline-part");
  const line = document.querySelector(".timeline-line");
  line.style.bottom = `calc(100% - 20px)`;
  let prevScrollY = window.scrollY;
  let up, down;
  let full = false;
  let set = 0;
  const targetY = window.innerHeight * 0.8;

  function scrollHandler(e) {
    const { scrollY } = window;
    up = scrollY < prevScrollY;
    down = !up;
    const timelineRect = timeline.getBoundingClientRect();
    const lineRect = line.getBoundingClientRect(); // const lineHeight = lineRect.bottom - lineRect.top
    const dist = targetY - timelineRect.top;

    if (down && !full) {
      set = Math.max(set, dist);
      line.style.bottom = `calc(100% - ${set}px)`;
    }

    if (dist > timeline.offsetHeight + 50 && !full) {
      full = true;
      line.style.bottom = `-50px`;
    }

    prevScrollY = window.scrollY;
  }

  scrollHandler();
  line.style.display = "block";
  window.addEventListener("scroll", scrollHandler);
}

// ============= TIMER ==================
if (document.querySelector(".date-timer")) {
  const daysEl = document.getElementById("days"),
    hoursEl = document.getElementById("hours"),
    minutesRl = document.getElementById("minutes"),
    secondsEl = document.getElementById("seconds");

  const date = document.querySelector(".date-timer").innerHTML;

  function countdown() {
    const wedDate = new Date(date);
    const currentDate = new Date();

    const totalSeconds = (wedDate - currentDate) / 1000;

    const days = Math.floor(totalSeconds / 3600 / 24);
    const hours = Math.floor(totalSeconds / 3600) % 24;
    const minutes = Math.floor(totalSeconds / 60) % 60;
    const seconds = Math.floor(totalSeconds % 60);

    daysEl.innerHTML = days;
    hoursEl.innerHTML = hours;
    minutesRl.innerHTML = minutes;
    secondsEl.innerHTML = seconds;
  }
  countdown();
  setInterval(countdown, 1000);
}

// ========= lenis ==========
const lenis = new Lenis();

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
