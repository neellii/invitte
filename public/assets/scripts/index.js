// ============= ajax like feature =============
var likeBtns = document.querySelectorAll(".heart-svg");

const getHearts = function () {
  likeBtns = document.querySelectorAll(".heart-svg");
  addHeartsL(likeBtns);
};
const heartsObserver = new MutationObserver(getHearts);
heartsObserver.observe(document.querySelector(".temp-wrapper"), {
  childList: true,
});

function addHeartsL(likeBtns) {
  likeBtns.forEach((likeBtn) => {
    likeBtn.addEventListener("click", (like) => {
      if (!like.target.querySelector("path").classList.contains("red-svg")) {
        gsap.fromTo(
          like.target.querySelector("path"),
          {
            y: 5,
          },
          {
            y: 0,
            ease: "back.out(2.5)",
            yoyo: true,
          }
        );

        like.target.querySelector("path").classList.add("red-svg");

        const tempId = like.target.dataset.template;
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "liked");
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
          }
        };
        xhr.setRequestHeader("Content-type", "application/json"); // or "text/plain"
        xhr.send(JSON.stringify(tempId));
      } else {
        gsap.fromTo(
          like.target.querySelector("path"),
          {
            y: 5,
          },
          {
            y: 0,
            ease: "back.out(2.5)",
            yoyo: true,
          }
        );

        like.target.querySelector("path").classList.remove("red-svg");

        const tempId = like.target.dataset.template + "unlike";
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "liked");
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
          }
        };
        xhr.setRequestHeader("Content-type", "application/json"); // or "text/plain"
        xhr.send(JSON.stringify(tempId));
      }
    });
  });
}

addHeartsL(likeBtns);

// ============= like notice ==============
if (document.querySelectorAll(".like-notice")) {
  document.querySelectorAll(".like-notice").forEach((like) => {
    like.addEventListener("click", (e) => {
      let noticeDiv = e.target.nextElementSibling || e.target.nextSibling;
      let likeTl = gsap.timeline();
      likeTl
        .to(noticeDiv, {
          autoAlpha: 1,
          duration: 0.7,
        })
        .to(noticeDiv, {
          autoAlpha: 0,
          duration: 1,
          delay: 2,
        });
      likeTl.play();
    });
  });
}

// ============ load more ajax ============
document.querySelector(".load-more").addEventListener("click", (e) => {
  e.preventDefault();
  try {
    fetch(e.target.getAttribute("data-load"), {
      method: "post",
      body: e.target.getAttribute("data-number"),
    })
      .then((res) => res.text())
      .then(function (data) {
        document
          .querySelector(".temp-wrapper")
          .insertAdjacentHTML("beforeend", data);
        e.target.setAttribute("data-load", 16);
      });
  } catch (err) {
    console.log(err);
  }
});

//============= gsap animations ===============
window.addEventListener("load", () => {
  mainTrigger();
});
const text = new SplitType(".landing-h2");
const changeSpan = text.words[3];
function updateText(newText) {
  gsap.set(changeSpan, { textContent: newText });
}

function mainTrigger() {
  let mainTl = gsap.timeline({
    defaults: {
      opacity: 0,
    },
  });

  mainTl
    .from(".landing-h2", {
      y: "40px",
      skewY: 1.5,
      duration: 1.2,
      onComplete: spanChange(),
      opacity: 0,
    })
    .from(
      ".landing-a",
      {
        transform: "scale(1, 0)",
        duration: 1,
        delay: 0.4,
      },
      "<"
    );
}

function spanChange() {
  let spanTl = gsap.timeline({
    repeat: -1,
    delay: 1.5,
  });

  spanTl
    .fromTo(
      changeSpan,
      { x: 0 },
      {
        x: -30,
        opacity: 0,
        delay: 2,
        ease: "power2.inOut",
        onComplete: updateText,
        onCompleteParams: ["быстро"],
      }
    )
    .to(changeSpan, {
      opacity: 1,
      x: 0,
    })
    .fromTo(
      changeSpan,
      { x: 0 },
      {
        x: -30,
        opacity: 0,
        delay: 2,
        ease: "power2.inOut",
        onComplete: updateText,
        onCompleteParams: ["удобно"],
      }
    )
    .to(changeSpan, {
      opacity: 1,
      x: 0,
    })
    .fromTo(
      changeSpan,
      { x: 0 },
      {
        x: -30,
        opacity: 0,
        delay: 2,
        ease: "power2.inOut",
        onComplete: updateText,
        onCompleteParams: ["экологично"],
      }
    )
    .to(changeSpan, {
      opacity: 1,
      x: 0,
    })
    .fromTo(
      changeSpan,
      { x: 0 },
      {
        x: -30,
        opacity: 0,
        delay: 2,
        ease: "power2.inOut",
        onComplete: updateText,
        onCompleteParams: ["стильно"],
      }
    )
    .to(changeSpan, {
      opacity: 1,
      x: 0,
    })
    .fromTo(
      changeSpan,
      { x: 0 },
      {
        x: -30,
        opacity: 0,
        delay: 2,
        ease: "power2.inOut",
        onComplete: updateText,
        onCompleteParams: ["выгодно"],
      }
    )
    .to(changeSpan, {
      opacity: 1,
      x: 0,
    })
    .fromTo(
      changeSpan,
      { x: 0 },
      {
        x: -30,
        opacity: 0,
        delay: 2,
        ease: "power2.inOut",
        onComplete: updateText,
        onCompleteParams: ["легко"],
      }
    )
    .to(changeSpan, {
      opacity: 1,
      x: 0,
    });
}

let steps = gsap.timeline({
  scrollTrigger: {
    trigger: ".intro",
    start: "top 70%",
    end: "bottom 70%",
    scrub: 1,
    ease: "linear",
  },
});

gsap.utils.toArray(".step").forEach((step) => {
  steps.fromTo(
    step,
    { scale: 1.05, y: 20 },
    {
      y: 0,
      opacity: 1,
      scale: 1,
    }
  );
});

function changeBg(src) {
  document.querySelector(".imgwr").style.backgroundImage = "url(" + src + ")";
}

let showcaseTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".showcase",
    start: "50% 55%",
    end: "500% 60%",
    scrub: true,
    pin: true,
  },
});

showcaseTl
  .from(".card", {
    scale: 0.6,
  })
  .to(".card", {
    delay: 1,
    rotateY: 89.8,
  })
  .to(".card", {
    backgroundImage:
      "url('https://cz82944.tw1.ru/public/assets/img/backward9.jpeg')",
  })
  .to(
    ".card",
    {
      rotateY: 0,
      delay: 0,
    },
    "<"
  )
  .to(".phonec", {
    bottom: "-6rem",
    opacity: 1,
    delay: 1,
  })
  .to(".phonev", {
    opacity: 1,
    delay: 1,
  })
  .to(
    ".card",
    {
      opacity: 0,
      delay: 0,
    },
    "<"
  )
  .to(
    ".phonec",
    {
      opacity: 0,
      delay: 0,
      onComplete: () => {
        if (!document.querySelector(".phonev").hasAttribute("data-play")) {
          document.querySelector(".phonev").currentTime = 0;
          document.querySelector(".phonev").play();
          document.querySelector(".phonev").setAttribute("data-play", "true");
        }
      },
    },
    "<"
  );

const secondTl = gsap.timeline({
  scrollTrigger: {
    trigger: ".advantages",
    start: "top 70%",
    end: "bottom 70%",
    scrub: 1,
    ease: "linear",
  },
});

gsap.utils.toArray(".adv").forEach((adv) => {
  secondTl.fromTo(
    adv,
    { scale: 1.05 },
    {
      y: 15,
      opacity: 1,
      scale: 1,
    }
  );
});

const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute("aria-expanded");

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute("aria-expanded", "false");
  }

  if (itemToggle == "false") {
    this.setAttribute("aria-expanded", "true");
  }
}

items.forEach((item) => item.addEventListener("click", toggleAccordion));

document
  .querySelector(".cookie-alert button")
  .addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector(".cookie-alert").style.display = "none";
  });
