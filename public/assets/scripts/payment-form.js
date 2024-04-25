const price = document.querySelector(".price");
const radio1 = document.getElementById("3");
const radio2 = document.getElementById("6");

radio1.addEventListener("click", (e) => {
  if (e.target.checked) {
    price.innerHTML = e.target.getAttribute("data-price") + "&#8381;";
  }
});

radio2.addEventListener("click", (e) => {
  if (e.target.checked) {
    price.innerHTML = e.target.getAttribute("data-price") + "&#8381;";
  }
});
