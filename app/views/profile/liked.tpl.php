<?php require_once VIEWS .  "/incs/header.php" ?>
<main class="main">
  <?php if(!empty($templates)): ?>
  <h2 style="padding-top: 60px; font-size: 18px; text-align: center; font-weight: bold;">Понравившиеся шаблоны</h2>
  <section class="templates" id="templates" style="margin-top: 30px">
    <div class="temp-wrapper">
      <?php foreach ($templates as $post): ?>
        <div class="card-body">
          <img class="card-img" src="assets/img/templateimgs/template-<?= $post['id'] ?>.png" alt="template">
          <div class="card-title">
            <div class="btns">
              <a target="_blank" href="demo/<?= $post["id"] ?>">
              демо
              </a>
              <a href="templates/try/<?= $post["id"] ?>">
                попробовать
              </a>
            </div>
          </div>
          <div class="card-buy">
            <p>от 1600₽ до 2500₽</p>

            <form action="templates/create/" method="post">
              <input type="hidden" name="id" value="<?= $post['id'] ?>">
              <button class="buy-btn" type="submit">приобрести</button>
            </form>
            <!-- <a href="templates/create/">приобрести</a> -->
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <?php else: ?>
    <p style="text-align: center; margin-top: 60px;">Нет понравившихся шаблонов</p>
  <?php endif; ?>
</main>

<?php require_once VIEWS .  "/incs/footer.php" ?>
