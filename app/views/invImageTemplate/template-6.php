<?php require_once 'headerImages.php' ?>
  <body>
    <div id="capture">
      <div class="preview">
        <div class="image_wr">
          <img class="couple_img" src="<?= isset($inv_data['couple_img']) ? '../public' . $inv_data['couple_img'] : '../public/invitations/img/transparent.png' ?>" alt="newlyweds" />
        </div>
        <div class="wed-names">
          <h1 class="groom_name"><?= $inv_data['groom_name'] ?></h1>
          <h1>&</h1>
          <h1 class="bride_name"><?= $inv_data['bride_name']?></h1>
        </div>
      </div>

      <?php
      require_once 'backward.php';
      require_once 'over.php'; ?>     
    </div>

    <script src="<?= '../public' . '/assets/scripts/html2canvas.js' ?>"></script>
    <?php require_once 'canvasRotate.php'; ?>
    <script>

      window.addEventListener("DOMContentLoaded", () => {
        setTimeout(() => {
          doCapture();
        }, 10000);
      });

    </script>
  </body>
</html>