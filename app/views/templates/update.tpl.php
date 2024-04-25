<?php require_once VIEWS . "/incs/header.php" 

/**
 * @var \myfrm\classes\Validator
 */

?>

<main class="main">
  <div class="create">
    <h1 class="create-title">Обновить данные</h1>

    <form class="form" action="/templates/update/confirm" method="post" enctype="multipart/form-data">
      <p class="necessary-title">Обязательные пункты отмечены <span>*</span></p>
      <div class="q-group">
        <label for="groom_name">Имя жениха<span>*</span></label>
        <input type="text" id="groom_name" placeholder="Дмитрий" name="groom_name" value="<?= $up_data['groom_name'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('groom_name') : '' ?>
      </div>

      <div class="q-group">
        <label for="bride_name">Имя невесты<span>*</span></label>
        <input type="text" id="bride_name" placeholder="Кристина" name="bride_name" value="<?= $up_data['bride_name'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('bride_name') : '' ?>
      </div>

      <div class="q-group">
        <label for="couple_img">Загрузите фотографию на превью <br> не больше 2 мегабайт, разрешенные форматы: jpg|png|jpeg</label>
        <input name="couple_img" type="file" id="avatar">
        <?= isset($validation) ? $validation->listErrors('couple_img') : '' ?>
      </div>

      <div class="q-group">
        <label for="to_whom">Обращение в приглашении<span>*</span></label>
        <input id="to_whom" name="to_whom" placeholder="Дорогие близкие и друзья!" value="<?= $up_data['to_whom'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('to_whom') : '' ?>
      </div>

      <div class="q-group">
        <label for="party_date">Дата мероприятия<span>*</span></label>
        <input id="party_date" name="party_date" placeholder="31 Июля 2024" value="<?= $up_data['party_date'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('party_date') : '' ?>
      </div>

      <div class="q-group">
        <label for="place">Место проведения<span>*</span></label>
        <input id="place" name="place" placeholder="ул. Светлая, 17, ресторан 'Аврора'" value="<?= $up_data['place'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('place') : '' ?>
      </div>

      <p class="programm-title">Программа</p>
      <div class="add-to-div">
        <div class="programm-inputs">
          <div>
            <label for="programm_name1" class="form-label" data-number="1">naming</label>
            <input type="text" class="form-control" id="programm_name1" placeholder="церемония бракосочетания" name="programm_name[1]" value="<?= old('programm_name[1]') ?>">
          </div>

          <div>
            <label for="programm_time1" class="form-label">time</label>
            <input type="text" class="form-control" id="programm_time1" placeholder="14:00" name="programm_time[1]" value="<?= old('programm_time[1]') ?>">
          </div>

          <div>
            <label for="programm_place1" class="form-label">place</label>
            <input type="text" class="form-control" id="programm_place1" placeholder="Дворец бракосочетания №4, ул. Покровская, 15" name="programm_place[1]" value="<?= old('programm_place[1]') ?>">
          </div>
        </div>

        <p>выберите иконку</p>
        <div>
          <div class="programm">
            <button class="tab-btn active" data-id="set1">1</button>
            <button class="tab-btn" data-id="set2">2</button>
            <button class="tab-btn" data-id="set3">3</button>
          </div>
          <div class="tab-contents">
            <div class="icons show" id="set1">
              <?php foreach($iconsSet1 as $key => $icon): ?>
                <label for="<?= $icon ?>" class="form-label check-label">
                <input class="checkbox" type="radio" name="programm_icon[1]" id="<?= $icon ?>" value="<?= $icon ?>">
                <img class="programm-icon" src="<?= './public/invitations/icons_set1/' . $icon ?>" alt="<?= $icon ?>">
                </label>
              <?php endforeach; ?>
            </div>
            <div class="icons" id="set2">2</div>
            <div class="icons" id="set3">3</div>
          </div>
        </div>
      </div>
      <button id="add-btn">добавить пункт</button>

      <p class="dop-title">Дополнительно</p>
      <div class="add-to-color">
        <div class="q-group">
          <label for="hex_color1" class="form-label">Введите желаемый цвет для дресс-кода в формате "hex"</label>
          <input type="text" id="hex_color1" placeholder="#e3eeff" name="hex_color[1]" value="<?= old('hex_color1') ?>">
        </div>
        <?= isset($validation) ? $validation->listErrors('hex_color') : '' ?>
      </div>
      <button id="add-btn-color">добавить цвет</button>

      <div class="q-group">
        <label for="hashtag" data-color="1">Хэштэг</label>
        <input type="text" id="hashtag" placeholder="#dobrovywedding" name="hashtag" value="<?= $up_data['hashtag'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('hashtag') : '' ?>
      </div>

      <div class="q-group">
        <label for="date_timer">Дата для таймера в формате: гггг-мм-дд</label>
        <input type="text" id="date_timer" placeholder="2024-06-12" name="date_timer" value="<?= $up_data['date_timer'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('date_timer') : '' ?>
      </div>

      <div class="q-group">
        <label for="note">Примечание</label>
        <input type="text" id="note" placeholder="пожалуйста, приносите вместо цветов - воздушные шары" name="note" value="<?= $up_data['note'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('note') : '' ?>
      </div>

      <div class="q-group">
        <label for="contacts">Контакт для гостей - ссылка для связи</label>
        <input type="text" id="contacts" placeholder="свадебный организатор Юлия" name="contacts" value="<?= $up_data['contacts'] ?? '' ?>">
        <input type="url" id="contacts_url" placeholder="https://t.me/yuliyawedding" name="contacts_url" value="<?= $up_data['contacts_url'] ?? '' ?>" style="margin-top: 8px">
        <?= isset($validation) ? $validation->listErrors('contacts_url') : '' ?>
      </div>

      <p class="rsvp-title">Форма обратной связи</p>
      <div class="ques rsvp-group">
        <div class="c-group">
          <label for="full_name" class="form-label">Введите ваше Имя и Фамилию</label>
          <input type="checkbox" id="full_name" name="full_name" value="full_name">
        </div>

        <div class="c-group">
          <label for="attending">Сможете ли вы быть с нами в этот день?</label>
          <input type="checkbox" id="attending" name="attending" value="attending">
        </div>

        <div class="c-group">
          <label for="guests_number">Планируете ли вы прийти один/одна или в сопровождении пары?</label>
          <input type="checkbox" id="guests_number" name="guests_number" value="guests_number">
        </div>

        <div class="c-group">
          <label for="allergy_info">Есть ли у вас есть аллергия на какие-либо продукты?</label>
          <input type="checkbox" id="allergy_info" name="allergy_info" value="allergy_info">
        </div>

        <div class="c-group">
          <label for="guest_note">Примечание/заметка</label>
          <input type="checkbox" id="guest_note" name="guest_note" value="guest_note">
        </div>

        <div class="q-group" data-ques="1">
          <label for="ques">Введите свой вопрос</label>
          <input type="text" id="ques" name="rsvp_ques[1]" value="<?= old('rsvp_ques[1]') ?>">
        </div>
      </div>
      <button id="ques-btn">добавить вопрос</button>

      <p class="op-title">Ссылка приглашения в социальных сетях</p>
      <div class="q-group">
        <label for="og_title">Введите название вашего приглашения</label>
        <input type="text" id="og_title" name="og_title" value="<?= $up_data['og_title'] ?? '' ?>" placeholder="Кирилл и Ульяна">
        <?= isset($validation) ? $validation->listErrors('og_title') : '' ?>
      </div>

      <div class="q-group">
        <label for="og_desc">Введите описание вашего приглашения</label>
        <input type="text" id="og_desc" name="og_desc" value="<?= $up_data['og_desc'] ?? '' ?>" placeholder="Приглашаем Вас на нашу свадьбу!">
        <?= isset($validation) ? $validation->listErrors('og_desc') : '' ?>
      </div>

      <div class="q-group">
        <label for="og_image">Загрузите фото для ссылки в соцсетях. <br> Чтобы картинка отображалась в большом формате используйте фотографию: 1200х630 пикселей</label>
        <input type="file" id="og_image" name="og_image" value="<?= old('og_image') ?>">
        <?= isset($validation) ? $validation->listErrors('og_image') : '' ?>
      </div>

      <div class="q-group">
        <label for="slug" class="form-label">Введите желаемый текст для ссылки* <br> разрешено использовать только латиницу и знак дефиса (-)</label>
        <input id="slug" name="slug" placeholder="alexey-elena-dobrovy" value="<?= $oldData['slug'] ?? '' ?>">
        <?= isset($validation) ? $validation->listErrors('oldValue') : '' ?>
        <?= isset($validation) ? $validation->listErrors('slug') : '' ?>
      </div>

      <input type="hidden" value="<?= $data['template_id'] ?? $_POST['template_id'] ?>" name="template_id">
      <input type="hidden" value="<?= $oldData['slug'] ?? $_POST['old_slug'] ?>" name="old_slug">

      <div class="q-group">
        <button type="submit" class="btn btn-primary">Обновить приглашение</button>
      </div>
    </form>
  </div>
</main>
<script type="text/javascript">
  Array.prototype.max = function() {
    return Math.max.apply(null, this);
  };
  
  const addBtn = document.getElementById("add-btn");
  const addToDiv = document.querySelector(".add-to-div");
  let attrNumbersArr = [];
  addBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const programmInputs = document.querySelectorAll('[data-number]');
    programmInputs.forEach((e) => {
      attrNumbersArr.push(e.getAttribute('data-number'));
    });
    maxAttrNumber = attrNumbersArr.max();

    addToDiv.insertAdjacentHTML('beforeend', `<div class="programm-inputs">
            <div>
            <label for="programm_name${maxAttrNumber + 1}" data-number="${maxAttrNumber + 1}">название</label>
            <input type="text" id="programm_name${maxAttrNumber + 1}" placeholder="название пункта" name="programm_name[${maxAttrNumber + 1}]" value="">
            </div>

            <div>
            <label for="programm_time${maxAttrNumber + 1}">время</label>
            <input type="text" id="programm_time${maxAttrNumber + 1}" placeholder="время" name="programm_time[${maxAttrNumber + 1}]" value="">
          </div>

          <div>
            <label for="programm_place${maxAttrNumber + 1}">место</label>
            <input type="text" id="programm_place${maxAttrNumber + 1}" placeholder="место проведения" name="programm_place[${maxAttrNumber + 1}]" value="">
          </div>
            </div>
            <p>выберите иконку</p>
            <div>
              <div>
                <button class="tab-btn active" data-id="set1">1</button>
                <button class="tab-btn" data-id="set2">2</button>
                <button class="tab-btn" data-id="set3">3</button>
              </div>
              <div class="tab-contents">
                <div class="icons show" id="set1">
                  <?php foreach($iconsSet1 as $key => $icon): ?>
                    <label for="<?= $icon ?>${maxAttrNumber + 1}" class="form-label check-label">
                    <input class="checkbox" type="radio" name="programm_icon[${maxAttrNumber + 1}]" id="<?= $icon ?>${maxAttrNumber + 1}" value="<?= $icon ?>">
                    <img class="programm-icon" src="<?= './public/invitations/icons_set1/' . $icon ?>" alt="<?= $icon ?>">
                    </label>
                  <?php endforeach; ?>
                </div>
                </div>
                <div class="icons" id="set2">2</div>
                <div class="icons" id="set3">3</div>
              </div>
            </div>
          </div>`);
});

  const addToDivColor = document.querySelector(".add-to-color");
  const addToColorBtn = document.getElementById("add-btn-color");
  let colorNumbersArr = [];
  addToColorBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const colorInputs = document.querySelectorAll("[data-color]");
    colorInputs.forEach((e) => {
      colorNumbersArr.push(e.getAttribute('data-color'));
    })
    maxColorNumber = colorNumbersArr.max();
    addToDivColor.insertAdjacentHTML('beforeend', `<div class="add-group">
              <label for="hex_color${maxColorNumber + 1}" data-color="${maxColorNumber + 1}">+ цвет</label>
              <input type="text" id="hex_color${maxColorNumber + 1}" placeholder="#84b5ff" name="hex_color[${maxColorNumber + 1}]" value="">
              </div>`);
  })

  const addToDivQues = document.querySelector(".ques");
  const addToQuesBtn = document.getElementById("ques-btn");
  let quesNumbersArr = [];
  addToQuesBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const quesInputs = document.querySelectorAll('[data-ques]');
    quesInputs.forEach((e) => {
      quesNumbersArr.push(e.getAttribute('data-ques'));
    })
    maxQuesNumber = quesNumbersArr.max();
    addToDivQues.insertAdjacentHTML('beforeend', `<div class="add-group">
        <label for="ques${maxQuesNumber + 1}" data-ques="${maxQuesNumber + 1}">+ вопрос</label>
        <input type="text" id="ques${maxQuesNumber + 1}" name="rsvp_ques[${maxQuesNumber + 1}]" value="" placeholder="Какой вы дадите совет молодоженам?">
</div>`)
  })

  const tabButtons = document.querySelectorAll('.tab-btn')
  tabButtons.forEach((tab) => {
    tab.addEventListener('click', (e) => {
      e.preventDefault();
    
      tabButtons.forEach(tab => {
        tab.classList.remove('active')
      })
      tab.classList.add('active')
      const contents = document.querySelectorAll('.icons')
      contents.forEach((content) => {
        content.classList.remove('show')
      })
      const contentId = tab.getAttribute('data-id')
      const contentSelected = document.getElementById(contentId)
      contentSelected.classList.add('show')
    })
  })
  </script>
<?php require_once VIEWS . "/incs/footer.php" ?>