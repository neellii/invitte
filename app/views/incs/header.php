<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "Invitte" ?></title>
  <base href="<?= PATH ?>/">
  <link rel="icon" type="image/x-icon" href="public/assets/favicon1.png">
  <link href="assets/styles/reset.css" rel="stylesheet">
  <link href="assets/styles/main.css" rel="stylesheet">
  <?php if(isset($styleFile)): ?>
    <link href="assets/styles/<?= $styleFile ?>" rel="stylesheet">
  <?php endif; ?>
</head>

<body>
  <div class="wrapper">
    <header class="header">
      <nav class="navbar">
        <div class="navbar-wrapper">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <button class="toggler" style="transform: rotate(0)">
                  <span class="navbar-toggler" style="transform: translateX(0); width: 30px;"></span>
                  <span class="navbar-toggler" style="width: 30px;"></span>
                  <span class="navbar-toggler" style="transform: translateY(0); width: 30px;"></span>
                </button>
              </li>
              <li class="nav-item">
                <a class="nav-main" href="/">invitte</a>
              </li>

              <!-- <li class="nav-item">
                <a class="nav-link" href="about">About</a>
              </li> -->
            </ul>

            <ul class="profile">
              <?php if(check_auth()) : ?>
                <li>
                  <a class="nav-link" href="orders">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8.16298 0.857062C9.03622 0.493562 9.99766 0.397307 10.9256 0.580481C11.8536 0.763655 12.7063 1.21802 13.376 1.88607C14.0456 2.55412 14.5019 3.40581 14.6873 4.33335C14.8726 5.26088 14.7786 6.22255 14.4172 7.09663C14.0557 7.97071 13.4431 8.71791 12.6567 9.24364C12.4587 9.37604 12.2519 9.4929 12.0382 9.59364C12.7702 9.70715 13.4848 9.92298 14.1604 10.2364L14.1629 10.2376C15.2359 10.7426 16.1928 11.4643 16.9732 12.3572C17.789 13.2542 18.4256 14.2992 18.8486 15.4356C19.2746 16.5752 19.4951 17.7814 19.5 18.998L19.5019 19.498L18.5019 19.502L18.5 19.002C18.4956 17.9033 18.2964 16.8142 17.9116 15.7851C17.5327 14.7669 16.9617 13.83 16.2302 13.0266L16.2232 13.0189C15.5334 12.2286 14.6874 11.5898 13.7383 11.143C12.8239 10.719 11.8281 10.4996 10.8202 10.5H9.18221C8.15839 10.5094 7.148 10.7341 6.21667 11.1595C5.28466 11.5852 4.45271 12.2023 3.77493 12.9707L3.77256 12.9734C2.29186 14.6281 1.4815 16.7755 1.49994 18.9958L1.50409 19.4958L0.504129 19.5041L0.499976 19.0041C0.479472 16.5355 1.38023 14.1478 3.02619 12.3079C3.7966 11.4348 4.74208 10.7337 5.8012 10.2499C6.4934 9.93376 7.224 9.7151 7.97217 9.59857C7.47614 9.3662 7.01911 9.04817 6.62393 8.65391C5.72783 7.7599 5.22292 6.54696 5.21996 5.28116C5.21775 4.33529 5.49621 3.41003 6.0201 2.6225C6.54399 1.83496 7.28975 1.22056 8.16298 0.857062ZM10.732 1.56155C9.99814 1.4167 9.23783 1.49282 8.54728 1.78027C7.85674 2.06772 7.26699 2.55359 6.8527 3.17637C6.43842 3.79915 6.21821 4.53084 6.21996 5.27882C6.2223 6.27981 6.62158 7.239 7.33021 7.94598C8.03885 8.65296 8.99897 9.05 9.99996 9.04999C10.7479 9.04999 11.4791 8.82807 12.1009 8.41233C12.7227 7.99659 13.2072 7.40571 13.4931 6.71449C13.7789 6.02327 13.8532 5.26279 13.7067 4.5293C13.5601 3.79581 13.1992 3.12229 12.6697 2.594C12.1402 2.06572 11.4658 1.7064 10.732 1.56155Z" fill="black"></path>
                    </svg>
                  </a>
                </li>
                <li>
                  <a class="nav-link" href="likes">
                  <svg data-template="<?= $post['id'] ?>" class="heart-svg" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill="black" fill-rule="evenodd" clip-rule="evenodd" d="M14.7628 0.609329C15.9142 0.379834 17.1078 0.497857 18.1919 0.948399L18.2025 0.952792C18.9016 1.26231 19.5385 1.69683 20.0818 2.23481L19.73 2.59012L20.086 2.23898C20.6305 2.79102 21.0662 3.44076 21.37 4.15418L21.3726 4.16032C21.9693 5.61468 21.9693 7.24553 21.3726 8.6999L21.3708 8.70432C21.069 9.42027 20.6324 10.0715 20.0846 10.6226L20.0836 10.6237L10.9989 19.7084L3.01646 11.6737L3.01531 11.6725L1.96646 10.6237C0.854258 9.51147 0.229431 8.003 0.229431 6.43012C0.229431 4.85723 0.854259 3.34876 1.96646 2.23656C3.07866 1.12436 4.58712 0.499535 6.16001 0.499535C7.7329 0.499535 9.24137 1.12436 10.3536 2.23656L10.3622 2.24518L11.0137 2.92947L11.7287 2.23434C12.5568 1.40415 13.6128 0.838557 14.7628 0.609329ZM19.3761 2.94334C18.921 2.49319 18.3879 2.1294 17.8029 1.86964C16.9033 1.49701 15.9133 1.39968 14.9583 1.59004C14.0014 1.78077 13.1228 2.2517 12.4343 2.94298L12.4286 2.94866L10.9863 4.35076L9.64225 2.93947C8.71799 2.01743 7.4657 1.49953 6.16001 1.49953C4.85234 1.49953 3.59823 2.01901 2.67356 2.94367C1.7489 3.86833 1.22943 5.12244 1.22943 6.43012C1.22943 7.73779 1.7489 8.9919 2.67356 9.91656L3.72472 10.9677L11.0012 18.2919L19.3754 9.91764C19.3755 9.91749 19.3752 9.9178 19.3754 9.91764C19.8319 9.4582 20.1964 8.91493 20.4483 8.31822C20.9439 7.1086 20.944 5.75261 20.4487 4.54291C20.1945 3.94725 19.8307 3.40465 19.3761 2.94334Z"></path>
                        </svg>
                  </a>
                </li>
                <!-- <li><a class="nav-link" href="logout">выйти</a></li> -->
              <?php else: ?>
                <li><a class="nav-link" href="register">регистрация</a></li>
                <li><a class="nav-link" href="login">войти</a></li>
              <?php endif; ?>
            </ul>
          </div>

          <div class="toggle-div" style="left: -300%;">
            <ul class="menu">
              <?php if(check_auth()): ?>
              <li>
                <a href="orders">мои заказы</a>
              </li>
              <li>
                <a href="/#templates">шаблоны приглашений</a>
              </li>
              <li>
                <a href="/#faq">часто задаваемые вопросы</a>
              </li>
              <li>
                <a href="/#contacts" onclick="event.preventDefault(); lenis.scrollTo('#contacts');">контакты</a>
              </li>
              <li>
                <a href="policy">политика конфиденциальности</a>
              </li>
              <li>
                <a href="terms">условия использования</a>
              </li>
              <li>
                <a href="logout">выйти</a>
              </li>
              <?php else: ?>
              <li>
                <a href="/#templates">шаблоны приглашений</a>
              </li>
              <li>
                <a href="/#faq">часто задаваемые вопросы</a>
              </li>
              <li>
                <a href="/#contacts" onclick="event.preventDefault(); lenis.scrollTo('#contacts');">контакты</a>
              </li>
              <li>
                <a href="login">войти</a>
              </li>
              <li>
                <a href="register">зарегистрироваться</a>
              </li>
              <li>
                <a href="policy">политика конфиденциальности</a>
              </li>
              <li>
                <a href="terms">условия использования</a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

<?php get_alerts(); ?>