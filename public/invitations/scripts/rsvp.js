document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector(".rsvp-form")) {
    document
      .querySelector(".rsvp-form")
      .addEventListener("submit", function (event) {
        const data = this;
        try {
          fetch(data.getAttribute("action"), {
            method: "post",
            body: new FormData(data),
          })
            .then((res) => res.text())
            .then(function (data) {
              if (data === "OK") {
                let rsvpTl = gsap.timeline();
                rsvpTl
                  .to(".rsvp-response", {
                    zIndex: 50,
                    autoAlpha: 1,
                    duration: 2,
                  })
                  .to(".rsvp-response", {
                    zIndex: -100,
                    autoAlpha: 0,
                    duration: 2,
                    delay: 2,
                  });
                rsvpTl.play();
              }
            });
        } catch (err) {
          console.log(err);
        }
        event.preventDefault();
      });
  }
});
