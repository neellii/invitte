<?php require_once 'headerImages.php' ?>
  <body>
    <div id="capture">
      <div class="preview">
        <div class="inner">
            <div class="topw"></div>
            <div class="toph"></div>
            <div class="image_wr">
              <img class="couple_img" src="<?php echo isset($inv_data['couple_img']) ? '../public' . $inv_data['couple_img'] : '../public/invitations/img/transparent.png' ?>" alt="newlyweds">
            </div>
            <div class="wed-names">
              <h1 class="groom_name"><?= $inv_data['groom_name'] ?></h1>
              <h1 class="and">и</h1>
              <h1 class="bride_name"><?= $inv_data['bride_name']?></h1>
            </div>
            <div class="bottomw"></div>
            <div class="bottomh"></div>
            <canvas id="img1"></canvas>
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
        rotateImg("img1", "../public/invitations/img/template-3/heart.png", -8);
        setTimeout(() => {
          doCapture();
        }, 10000);
      });
    </script>
  </body>
</html>