<?php require_once VIEWS . '/incs/invitations/header_inv.tpl.php' ?>

 <main>
  <img class="background" src="../public/invitations/img/template-6/background.png" alt="back">
  <div class="wrapper">
  <div class="preview">
    <img class="couple_img" src="<?php echo !empty($_FILES['couple_img']['name']) ? 'data: ' . mime_content_type($_FILES['couple_img']['tmp_name']) . ';base64,' . base64_encode(file_get_contents($_FILES['couple_img']['tmp_name'])) : '../public/invitations/img/transparent.png' ?>" alt="art">
    <div class="wed-names">
      <h1 class="groom_name"><?= $data['groom_name'] ?></h1>
      <h1 class="and">и</h1>
      <h1 class="bride_name"><?= $data['bride_name'] ?></h1>
    </div>
  </div>

  <div class="info">
    <h2 class="info_to"><?= $data['to_whom'] ?></h2>
    <p class="info_1"><?= $data['groom_name'] ?> и <?= $data['bride_name'] ?> приглашают Вас разделить радость по случаю
создания новой семьи</p>
    <p class="info_2">Мы будем благодарны Вашему присутствию на торжестве,
посвященному нашему бракосочетанию, которое состоится</p>
    <h2 class="info_date"><?= $data['party_date'] ?></h2>
    <p class="info_add">по адресу</p>
    <h2 class="info_place"><?= $data['place'] ?></h2>
  </div>

  <?php require_once 'preview-inc.php' ?>

  <section class="ps">
    <h2>С уважением, <?= $data['groom_name'] ?> и <?= $data['bride_name'] ?></h2>
  </section>
  </div>
 </main>
</div>

<?php require_once VIEWS . '/incs/invitations/footer_inv.tpl.php' ?>