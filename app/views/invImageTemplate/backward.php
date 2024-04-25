<div class="info">
  <h2 class="info_to"><?= $inv_data['to_whom'] ?></h2>
  <p class="info_1">
    <?= $inv_data['groom_name'] ?>
    и
    <?= $inv_data['bride_name'] ?>
    приглашают Вас разделить радость по случаю создания новой семьи
  </p>
  <p class="info_2">
    Мы будем благодарны Вашему присутствию на торжестве, посвященному
    нашему бракосочетанию, которое состоится
  </p>
  <h2 class="info_date"><?= $inv_data['party_date'] ?></h2>
  <p class="info_add">по адресу</p>
  <h2 class="info_place"><?= $inv_data['place'] ?></h2>
  <h2 class="ending">
    с уважением, <br />
    <?= $inv_data['groom_name'] ?>
    и
    <?= $inv_data['bride_name'] ?>
  </h2>

  <div class="qr_info">
    <p>
      Если вас интересует дополнительная информация о нашей свадьбе,
      пожалуйста, воспользуйтесь QR-кодом правее, чтобы открыть
      онлайн-приглашение. Мы с нетерпением ждем вашего присутствия и
      надеемся, что это будет незабываемый день!
    </p>
    <img
      class="qr_image"
      src="<?= '../public' . $inv_data['qr_code_url'] ?>"
      alt="qr"
    />
  </div>
</div>