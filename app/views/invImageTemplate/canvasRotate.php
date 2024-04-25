<script>
function rotateImg(id, src, degree) {
  const canva1 = document.getElementById(id);
  const ctx = canva1.getContext("2d", { willReadFrequently: true });
  const img1 = new Image();
  img1.src = src;
  img1.onload = () => {
    ctx.save();
    let length = Math.sqrt(img1.width * img1.width + img1.height * img1.height);
    canva1.width = canva1.height = length;
    let pivot = length * 0.5;
    ctx.translate(pivot, pivot);
    ctx.rotate((degree * Math.PI) / 180);
    ctx.drawImage(img1, -img1.width * 0.5, -img1.height * 0.5);
    ctx.restore();
  };
}

function doCapture() {
  window.scrollTo(0, 0);

  html2canvas(document.querySelector(".preview"), {
    windowHeight: 1748,
    windowWidth: 1240,
    scale: 1,
    useCORS: true,
  }).then((canvas) => {
    document.querySelector(".preview-insert").value = canvas.toDataURL(
      "image/jpeg",
      0.9
    );
  });

  html2canvas(document.querySelector(".info"), {
    windowHeight: 1748,
    windowWidth: 1240,
    scale: 1,
    useCORS: true,
  }).then((canvas) => {
    document.querySelector(".info-insert").value = canvas.toDataURL(
      "image/jpeg",
      0.9
    );
    document.getElementById("get-btn").innerHTML = "скачать архив";
  });
}
</script>
