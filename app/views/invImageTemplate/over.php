<div class="over">
  <img class="icon" src="../public/assets/favicon1.svg" alt="icon">
  <form id="img-inputs" action="save-capture1" method="POST">
    <input class="preview-insert" type="text" hidden name="upward<?= $_SESSION['user']['id'] ?>">
    <input class="info-insert" type="text" hidden name="backward<?= $_SESSION['user']['id'] ?>">
    <button id="get-btn" type="submit">генерация изображений <div> <span>.</span> <span>.</span> <span>.</span> </div></button>
  </form>
</div>