<?php require_once VIEWS . '/incs/invitations/header_inv.tpl.php' ?>

 <main>
  <div class="wrapper">
  <div class="preview">
    <img class="preview__leaf-3" src="../public/invitations/img/template-1/leaf-03.png" alt="art">
    <img class="couple_img" src="<?php echo isset($inv_data['couple_img']) ? '../public' . $inv_data['couple_img'] : '../public/invitations/img/transparent.png' ?>" alt="newlyweds">
    <div class="wed-names">
      <h1 class="groom_name"><?= $inv_data['groom_name'] ?></h1>
      <h1 class="and">и</h1>
      <h1 class="bride_name"><?= $inv_data['bride_name'] ?></h1>
    </div>
    <img class="preview__leaf-4" src="../public/invitations/img/template-1/leaf-03.png" alt="art">
    <img class="preview__leaf-1" src="../public/invitations/img/template-1/leaf-01.png" alt="art">
    <img class="preview__leaf-2" src="../public/invitations/img/template-1/leaf-02.png" alt="art">
  </div>

  <div class="line"></div>

  <div class="info">
    <h2 class="info_to"><?= $inv_data['to_whom'] ?></h2>
    <p class="info_1"><?= $inv_data['groom_name'] ?> и <?= $inv_data['bride_name'] ?> приглашают Вас разделить радость по случаю
создания новой семьи</p>
    <p class="info_2">Мы будем благодарны Вашему присутствию на торжестве,
посвященному нашему бракосочетанию, которое состоится</p>
    <h2 class="info_date"><?= $inv_data['party_date'] ?></h2>
    <p class="info_add">по адресу</p>
    <h2 class="info_place"><?= $inv_data['place'] ?></h2>
    <img class="leaf01" src="../public/invitations/img/template-1/leaf-03.png" alt="art">
  </div>

  <?php if(array_key_exists('programm_name', $inv_data)): ?>
  <section class="section programm">
    <div class="timeline-container">
      <img class="timeline_leaf-1" src="../public/invitations/img/template-1/leaf-01.png" alt="art">
      <h2 class="programm_title">Программа</h2>
      <div class="timeline-part">
        <div class="timeline-line"></div>

        <?php for($i = 1; $i <= max(count($inv_data['programm_name']), count($inv_data['programm_time']), count($inv_data['programm_place']), count($inv_data['programm_icon'])); $i++): ?>
          <div class="line-section">
            <div class="timeline-content">
              <img class="timeline-icon" src="../public/invitations/icons_set1/<?= $inv_data['programm_icon'][$i] ?>" alt="icon" />
              <span class="timeline-name"><?= $inv_data["programm_name"][$i] ?? '' ?></span> <br>
              <span class="timeline-number"><?= $inv_data["programm_time"][$i] ?? '' ?></span> <br>
              <span class="timeline-place"><?= $inv_data["programm_place"][$i] ?? '' ?></span>
            </div>
          </div>
        <?php endfor; ?>

      </div>
    </div>
  </section>
  <?php endif; ?>


  <?php if(array_key_exists('hex_color', $inv_data)): ?>
  <section class="dresscode">
    <img class="leaf02" src="../public/invitations/img/template-1/leaf-02.png" alt="art">
    <h2>Дресс-код</h2>
    <p>Нам будет приятно если вы поддержите цветовую гамму нашей свадьбы в своих нарядах</p>
    <?php foreach($inv_data['hex_color'] as $key => $value): ?>
      <div class="dresscode_colors" style="background-color: <?= $value ?>;"></div>
    <?php endforeach; ?>
  </section>
  <?php endif; ?>

  <?php if(array_key_exists('hashtag', $inv_data)): ?>
  <section class="hashtag">
    <h2>Хэштэг</h2>
    <p>Мы хотели бы запечатлеть каждый момент этого особенного дня, и мы будем рады, если вы поделитесь своими фотографиями и впечатлениями с помощью нашего официального хэштега:
    <span class="hashtag_span"><?= $inv_data['hashtag'] ?></span> Не забудьте использовать его при публикации ваших фотографий в социальных сетях.</p>
    <img class="leaf03" src="../public/invitations/img/template-1/leaf-02.png" alt="art">
  </section>
  <?php endif; ?>

  <?php if(isset($inv_data['full_name']) || isset($inv_data['attending']) || isset($inv_data['guests_number']) || isset($inv_data['allergy_info']) || isset($inv_data['guest_note']) || isset($inv_data['rsvp_ques'])): ?>
  <section class="form">
    <p>Пожалуйста, ответьте на несколько вопросов, чтобы сделать ваше пребывание на нашем торжестве приятным и запоминающимся</p>
    <form action="send-rsvp" method="post" class="rsvp-form">
      <?php if(array_key_exists('full_name', $inv_data)): ?>
      <label for="full_name">Введите ваше Имя и Фамилию</label>
      <input type="text" id="full_name" name="full_name">
      <?php endif; ?>

      <?php if(array_key_exists('attending', $inv_data)): ?>
      <label for="attending">Сможете ли вы быть с нами в этот день?</label>
      <input type="text" id="attending" name="attending">
      <?php endif; ?>

      <?php if(array_key_exists('guests_number', $inv_data)): ?>
      <label for="guests_number">Планируете ли вы прийти один/одна или в сопровождении пары?</label>
      <input type="text" id="guests_number" name="guests_number">
      <?php endif; ?>

      <?php if(array_key_exists('allergy_info', $inv_data)): ?>
      <label for="allergy_info">Есть ли у вас есть аллергия на какие-либо продукты?</label>
      <input type="text" id="allergy_info" name="allergy_info">
      <?php endif; ?>

      <?php if(array_key_exists('guest_note', $inv_data)): ?>
      <label for="guest_note">Примечание</label>
      <input type="text" id="guest_note" name="guest_note">
      <?php endif; ?>

      <?php if(array_key_exists('rsvp_ques', $inv_data)): ?>
      <?php foreach($inv_data['rsvp_ques'] as $k => $v): ?>
        <label for="<?= $k ?>"><?= $v ?></label>
        <input type="text" id="<?= $k ?>" name="<?= htmlspecialchars(str_replace(" ", "", $v)) ?>">
      <?php endforeach; ?>
      <?php endif; ?>

      <input type="hidden" name="slug" value="<?= $slug ?>">
      <button type="submit">Отправить</button>
    </form>
    <img class="leaf07" src="../public/invitations/img/template-1/leaf-01.png" alt="art">
  </section>
  <?php endif; ?>

  <?php require_once 'rsvp.tpl.php' ?>

  <?php if(array_key_exists('date_timer', $inv_data)): ?>
  <section class="section timer">
    <div class="timer-container container">
      <h2 class="timer-title">Будем рады видеть Вас через</h2>
      <span class="date-timer" style="display: none;"><?= $inv_data['date_timer'] ?></span>
      <div class="count-container">
        <div class="days-c count-el">
          <p class="big-text" id="days">0</p>
          <span>дней</span>
        </div>
    
        <div class="hours-c count-el">
          <p class="big-text" id="hours">0</p>
          <span>часов</span>
        </div>
    
        <div class="minutes-c count-el">
          <p class="big-text" id="minutes">0</p>
          <span>минут</span>
        </div>
    
        <div class="sec-c count-el">
          <p class="big-text" id="seconds">0</p>
          <span>секунд</span>
        </div>
      </div>
    </div>
    <img class="leaf04" src="../public/invitations/img/template-1/leaf-03.png" alt="art">
  </section>
  <?php endif; ?>

  <div class="line"></div>

  <?php if(array_key_exists('note', $inv_data)): ?>
  <section class="note">
    <p><?= $inv_data['note'] ?></p>
  </section>
  <?php endif; ?>

  <?php if(array_key_exists('contacts', $inv_data)): ?>
  <section class="contacts">
    <h2>если возникнут вопросы:</h2>
    <a href="<?= $inv_data['contacts_url'] ?>" target="_blank"><?= $inv_data['contacts'] ?></a>
  </section>
  <?php endif; ?>

  <section class="ps">
    <h2>С уважением, <?= $inv_data['groom_name'] ?> и <?= $inv_data['bride_name'] ?></h2>
    <img class="leaf05" src="../public/invitations/img/template-1/leaf-01.png" alt="art">
    <img class="leaf06" src="../public/invitations/img/template-1/leaf-02.png" alt="art">
  </section>

  </div>
 </main>
</div>

<?php require_once VIEWS . '/incs/invitations/footer_inv.tpl.php' ?>