<?php require_once 'headerImages.php' ?>
  <body>
    <div id="capture">
      <div class="preview">
        <canvas id="img1"></canvas>

        <div class="image_wr">
          <img class="couple_img" src="<?= isset($inv_data['couple_img']) ? '../public' . $inv_data['couple_img'] : '../public/invitations/img/transparent.png' ?>" alt="newlyweds" />
        </div>
        <div class="wed-names">
          <h1 class="groom_name"><?= $inv_data['groom_name'] ?></h1>
          <h2>и</h2>
          <h1 class="bride_name"><?= $inv_data['bride_name']?></h1>
        </div>
        <canvas id="img2"></canvas>
        <canvas id="img3"></canvas>
        <canvas id="img4"></canvas>
      </div>
      
      <?php
      require_once 'backward.php';
      require_once 'over.php'; ?>
      
    </div>
    <script src="<?= '../public' . '/assets/scripts/html2canvas.js' ?>"></script>
    <?php require_once 'canvasRotate.php'; ?>
    <script>
      window.addEventListener("DOMContentLoaded", () => {
        rotateImg("img3", "../public/invitations/img/template-1/leaf-01.png", 10);
        rotateImg("img2", "../public/invitations/img/template-1/leaf-03.png", -30);
        rotateImg("img4", "../public/invitations/img/template-1/leaf-02.png", 45);
        rotateImg("img1", "../public/invitations/img/template-1/leaf-03.png", 30);
        setTimeout(() => {
          doCapture();
        }, 10000);
      });
    </script>
  </body>
</html>
