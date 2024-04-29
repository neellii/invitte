<?php require_once VIEWS .  "/incs/header.php" ?>
<main class="main">
  <section id="landing" class="landing">
    <div>
      <h2 class="landing-h2">Пригласите своих гостей <br>  <span id="change-span">легко</span> </br> создайте свое уникальное приглашение с нашим сервисом</h2>
      <a class="landing-a" href="#templates" onclick="event.preventDefault(); lenis.scrollTo('#templates')">перейти к выбору шаблона</a>
    </div>
  </section>

  <div class="cookie-alert">
    <p>На сайте используются файлы cookies для персонализации сервисов и повышения удобства пользования веб-сайтом. Пользуясь сайтом, вы соглашаетесь на сбор таких данных.</p>
    <button>Хорошо</button>
  </div>

  <section class="intro">
    <div class="imgwr"></div>
    
    <div class="step" style="opacity: 0;">
      <img class="intro-img" src="assets/img/usericon.png" alt="register">

      <h3 class="slide-in">01</h3>
      <div class="content" >
        <h4>зарегистрируйтесь на нашем сайте</h4>
      </div>
    </div>

    <div class="step" style="opacity: 0;">
      <img class="intro-img" src="assets/img/searchicon.png" alt="register">

      <h3 class="slide-in">02</h3>
      <div class="content">
        <h4>выберите подходящий шаблон</h4>
      </div>
    </div>

    <div class="step" style="opacity: 0;">
      <img class="intro-img" src="assets/img/timeicon.png" alt="register">

      <h3 class="slide-in">03</h3>
      <div class="content">
        <h4>оплатите любым подходящим для вас способом</h4>
      </div>    
    </div>

    <div class="step" style="opacity: 0;">
      <img class="intro-img" src="assets/img/fileicon.png" alt="register">

      <h3 class="slide-in">04</h3>
      <div class="content">
        <h4>заполните форму с данными о вашем мероприятии</h4>
      </div>
    </div>

    <div class="step" style="opacity: 0;">
    <img class="intro-img" src="assets/img/hearticon.png" alt="register">

    <h3 class="slide-in">05</h3>
    <div class="content"> 
      <h4>получите ссылку на готовое онлайн-приглашение в вашем профиле + скачайте версию для печати в формате А6/jpeg с qr-кодом на онлайн-версию</h4>
    </div>
    </div>
  </section>

  <section class="showcase">
    <div class="cardwr">
      <div class="card"></div>
      <img class="phonec" src="assets/img/phonecamera.png" alt="art">
      <video class="phonev" src="assets/img/pnoneshow.mp4" muted playsinline></video>
    </div>
  </section>

  <section id="advantages" class="advantages">
    <div class="adv">
      <h3>удобство и доступность</h3>
      <div class="content1">
        <h4>онлайн-версия может содержать всю необходимую информацию о мероприятии, включая: дату и время, <br> место проведения <br> программу <br> форму обратной связи <br> контактные данные и т.д.</h4>
      </div>
    </div>

    <div class="adv">
      <h3>интерактивность</h3>
      <div class="content1">
        <h4>с помощью формы обратной связи гости могут легко подтвердить свое присутствие + задайте свои собственные вопросы гостям</h4>
      </div>
    </div>

    <div class="adv">
      <h3>обновляйте свои данные в любое время</h3>
      <div class="content1">
        <h4>вы сможете изменить, обновить свое приглашение в любое время</h4>
      </div>    
    </div>

    <div class="adv">
      <h3>адаптивность</h3>
      <div class="content1">
        <h4>все приглашения отлично смотрятся на любых устройствах</h4>
      </div>
    </div>

    <div class="adv">
      <h3>возможные разделы</h3>
      <div class="content1"> 
        <h4>вы можете опционально включить в приглашение следующие блоки: программа мероприятия, форма обратной связи, таймер до начала мерприятия, хэштэг, дресс-код, а также любой текст на ваше усмотрение(примечания для гостей, пожелания, цитаты и т.д.)</h4>
      </div>
    </div>

    <div class="adv">
      <h3>онлайн и печатная версии</h3>
      <div class="content1"> 
        <h4>скачайте готовую версию для печати вашего приглашения в формате jpeg/А6 с qr-кодом со ссылкой на онлайн-версию</h4>
      </div>
    </div>

    <div class="adv">
      <h3>ссылка на онлайн-приглашение - на ваш выбор</h3>
      <div class="content1"> 
        <h4>текст ссылки на онлайн приглашение выбираете вы сами в следующем формате: https://invitte.ru/i/[ваш текст]</h4>
      </div>
    </div>

    <div class="adv">
      <h3>кастомизируйте вид ссылки в социальных сетях</h3>
      <div class="content1"> 
        <h4>вы можете кастомизировать вид/отображение вашей ссылки в социальных сетях загрузив свое изображение для превью и текст</h4>
      </div>
    </div>
  </section>

  <section class="templates" id="templates" style="margin-top: 20px">
    <div class="temp-wrapper">
      <?php foreach ($posts2 as $post): ?>
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

            <?php if(check_auth()): ?>
              <?php if(!empty($likedTemplates) && in_array($post['id'], $likedTemplates)): ?>
                <svg data-template="<?= $post['id'] ?>" class="heart-svg" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path class="red-svg" fill-rule="evenodd" clip-rule="evenodd" d="M14.7628 0.609329C15.9142 0.379834 17.1078 0.497857 18.1919 0.948399L18.2025 0.952792C18.9016 1.26231 19.5385 1.69683 20.0818 2.23481L19.73 2.59012L20.086 2.23898C20.6305 2.79102 21.0662 3.44076 21.37 4.15418L21.3726 4.16032C21.9693 5.61468 21.9693 7.24553 21.3726 8.6999L21.3708 8.70432C21.069 9.42027 20.6324 10.0715 20.0846 10.6226L20.0836 10.6237L10.9989 19.7084L3.01646 11.6737L3.01531 11.6725L1.96646 10.6237C0.854258 9.51147 0.229431 8.003 0.229431 6.43012C0.229431 4.85723 0.854259 3.34876 1.96646 2.23656C3.07866 1.12436 4.58712 0.499535 6.16001 0.499535C7.7329 0.499535 9.24137 1.12436 10.3536 2.23656L10.3622 2.24518L11.0137 2.92947L11.7287 2.23434C12.5568 1.40415 13.6128 0.838557 14.7628 0.609329ZM19.3761 2.94334C18.921 2.49319 18.3879 2.1294 17.8029 1.86964C16.9033 1.49701 15.9133 1.39968 14.9583 1.59004C14.0014 1.78077 13.1228 2.2517 12.4343 2.94298L12.4286 2.94866L10.9863 4.35076L9.64225 2.93947C8.71799 2.01743 7.4657 1.49953 6.16001 1.49953C4.85234 1.49953 3.59823 2.01901 2.67356 2.94367C1.7489 3.86833 1.22943 5.12244 1.22943 6.43012C1.22943 7.73779 1.7489 8.9919 2.67356 9.91656L3.72472 10.9677L11.0012 18.2919L19.3754 9.91764C19.3755 9.91749 19.3752 9.9178 19.3754 9.91764C19.8319 9.4582 20.1964 8.91493 20.4483 8.31822C20.9439 7.1086 20.944 5.75261 20.4487 4.54291C20.1945 3.94725 19.8307 3.40465 19.3761 2.94334Z"></path>
                </svg>
              <?php else: ?>
                <svg data-template="<?= $post['id'] ?>" class="heart-svg" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7628 0.609329C15.9142 0.379834 17.1078 0.497857 18.1919 0.948399L18.2025 0.952792C18.9016 1.26231 19.5385 1.69683 20.0818 2.23481L19.73 2.59012L20.086 2.23898C20.6305 2.79102 21.0662 3.44076 21.37 4.15418L21.3726 4.16032C21.9693 5.61468 21.9693 7.24553 21.3726 8.6999L21.3708 8.70432C21.069 9.42027 20.6324 10.0715 20.0846 10.6226L20.0836 10.6237L10.9989 19.7084L3.01646 11.6737L3.01531 11.6725L1.96646 10.6237C0.854258 9.51147 0.229431 8.003 0.229431 6.43012C0.229431 4.85723 0.854259 3.34876 1.96646 2.23656C3.07866 1.12436 4.58712 0.499535 6.16001 0.499535C7.7329 0.499535 9.24137 1.12436 10.3536 2.23656L10.3622 2.24518L11.0137 2.92947L11.7287 2.23434C12.5568 1.40415 13.6128 0.838557 14.7628 0.609329ZM19.3761 2.94334C18.921 2.49319 18.3879 2.1294 17.8029 1.86964C16.9033 1.49701 15.9133 1.39968 14.9583 1.59004C14.0014 1.78077 13.1228 2.2517 12.4343 2.94298L12.4286 2.94866L10.9863 4.35076L9.64225 2.93947C8.71799 2.01743 7.4657 1.49953 6.16001 1.49953C4.85234 1.49953 3.59823 2.01901 2.67356 2.94367C1.7489 3.86833 1.22943 5.12244 1.22943 6.43012C1.22943 7.73779 1.7489 8.9919 2.67356 9.91656L3.72472 10.9677L11.0012 18.2919L19.3754 9.91764C19.3755 9.91749 19.3752 9.9178 19.3754 9.91764C19.8319 9.4582 20.1964 8.91493 20.4483 8.31822C20.9439 7.1086 20.944 5.75261 20.4487 4.54291C20.1945 3.94725 19.8307 3.40465 19.3761 2.94334Z"></path>
                </svg>
              <?php endif; ?>
            <?php else: ?>
              <svg class="like-notice" width="22" height="20" viewBox="0 0 22 20" fill="#000" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7628 0.609329C15.9142 0.379834 17.1078 0.497857 18.1919 0.948399L18.2025 0.952792C18.9016 1.26231 19.5385 1.69683 20.0818 2.23481L19.73 2.59012L20.086 2.23898C20.6305 2.79102 21.0662 3.44076 21.37 4.15418L21.3726 4.16032C21.9693 5.61468 21.9693 7.24553 21.3726 8.6999L21.3708 8.70432C21.069 9.42027 20.6324 10.0715 20.0846 10.6226L20.0836 10.6237L10.9989 19.7084L3.01646 11.6737L3.01531 11.6725L1.96646 10.6237C0.854258 9.51147 0.229431 8.003 0.229431 6.43012C0.229431 4.85723 0.854259 3.34876 1.96646 2.23656C3.07866 1.12436 4.58712 0.499535 6.16001 0.499535C7.7329 0.499535 9.24137 1.12436 10.3536 2.23656L10.3622 2.24518L11.0137 2.92947L11.7287 2.23434C12.5568 1.40415 13.6128 0.838557 14.7628 0.609329ZM19.3761 2.94334C18.921 2.49319 18.3879 2.1294 17.8029 1.86964C16.9033 1.49701 15.9133 1.39968 14.9583 1.59004C14.0014 1.78077 13.1228 2.2517 12.4343 2.94298L12.4286 2.94866L10.9863 4.35076L9.64225 2.93947C8.71799 2.01743 7.4657 1.49953 6.16001 1.49953C4.85234 1.49953 3.59823 2.01901 2.67356 2.94367C1.7489 3.86833 1.22943 5.12244 1.22943 6.43012C1.22943 7.73779 1.7489 8.9919 2.67356 9.91656L3.72472 10.9677L11.0012 18.2919L19.3754 9.91764C19.3755 9.91749 19.3752 9.9178 19.3754 9.91764C19.8319 9.4582 20.1964 8.91493 20.4483 8.31822C20.9439 7.1086 20.944 5.75261 20.4487 4.54291C20.1945 3.94725 19.8307 3.40465 19.3761 2.94334Z"></path>
              </svg>
              <div class="register-notice">
                зарегистрируйтесь, чтобы добавить в избранное
              </div>
            <?php endif; ?>
          </div>
          <div class="card-buy">
            <p>1600₽/3000₽</p>

            <form action="templates/topayment" method="post">
              <input type="hidden" name="id" value="<?= $post['id'] ?>">
              <button class="buy-btn" type="submit">приобрести</button>
            </form>
            <!-- <a href="templates/create/">приобрести</a> -->
          </div>
        </div>
      <?php endforeach; ?>

      <button data-number='6' data-load=<?= $loadTemplates ?> class="load-more">загрузить еще</button>
    </div>
  </section>

  <section class="faq" id="faq">
    <div class="container">
    <h2>Часто задаваемые вопросы</h2>
    <div class="accordion">
      <div class="accordion-item">
        <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">Сколько по времени будет доступно приглашение?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Доступные периоды: на 3 и 6 месяцев. Хранение приглашения более чем на доступные периоды обсуждается отдельно: обращаться с письмом на почту pochta@mail.com</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Какие блоки доступны в приглашении?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Доступными дополнительными блоками кроме обязательных даты, времени, места проведения мероприятия являются: <br> - программа мероприятия, где вы сможете описать подробно детали вашего мероприятия; <br> - дресс-код в виде желаемых цветовых решений; <br> - хэштэг вашего мероприятия; <br> - таймер до дня мероприятия; <br> - примечание/заметка на ваше усмотрение; <br> - контактную ссылку; <br> - форма обратной связи, в которую вы можете включить свои вопросы, ответы на которую будут приходить вам на указанную почту. <br> А также заполните блок, который позволит вам самостоятельно редактировать текст ссылки вашего приглашения в социальных сетях</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Как я смогу получить ссылку на свое приглашение?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Ссылка будет доступна в течении приобретенного вами периода после заполнения формы о мероприятии в вашем профиле - по иконке в шапке сайта или же в меню сайта по ссылке "Заказы". Там же будет доступна ссылка на скачивание печатной версии.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">Если я неправильно заполнил(а) данные?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Вы всегда сможете изменить/обновить ваши данные в вашем профиле - по иконке в шапке сайта или же в меню сайта по ссылке "Заказы".</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Хочу изменить шаблонный текст</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Если Вы хотите изменить текст, определенный в шаблоне Вам нужно обратиться на нашу почту: pochta@mail.com В зависимости от объема изменений может потребоваться дополнительная плата.</p>
        </div>
      </div>

      <div class="accordion-item">
        <button id="accordion-button-6" aria-expanded="false"><span class="accordion-title">Могу ли я заказать разработку приглашения?</span><span class="icon" aria-hidden="true"></span></button>
        <div class="accordion-content">
          <p>Вы можете перейти по данной ссылке в telegram, чтобы заказать разработку индивидуального приглашения. Стоимость будет зависеть от желаемого результата, количества блоков, страниц: от 2500 до 6000 руб. за приглашение. Все детали сможете узнать отправив сообщение в telegram.</p>
        </div>
      </div>
    </div>
  </div>
  </section>
</main>

<?php require_once VIEWS .  "/incs/footer.php" ?>