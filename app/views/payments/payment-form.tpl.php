<?php require_once VIEWS . "/incs/header.php" ?>
<main class="main">
  <div class="row">

    <img class="temp-img" src="../public/assets/img/templateimgs/template-<?= $template_id ?? $_POST['template_id'] ?>.png" alt="template_img">
    <p>Шаблон №<?= $template_id ?? $_POST['template_id'] ?></p>
    
    <div class="price-div">
      <p>Цена:</p>
      <p class="price"><?= $months3 ?>&#8381;</p>
    </div>

    <form action="payment-data" method="post">
      <div>Выберите период</div>
      <div>
        <label for="3">3 месяца</label>
        <input data-price=<?= $months3 ?> class="radio-price" type="radio" name="price" id="3" value="<?= $months3 ?>" checked>
        
        <label for="6">6 месяцев</label>
        <input data-price=<?= $months6 ?> class="radio-price" type="radio" name="price" id="6" value="<?= $months6 ?>">
        <?= isset($validation) ? $validation->listErrors('price') : '' ?>
      </div>
      
      <input type="hidden" name="template_id" value="<?= $template_id ?? $_POST['template_id'] ?>">
      <input type="hidden" name="user_id" value="<?= $user_id ?? $_POST['user_id'] ?>">
      <img class="logo-yoo" src="../public/assets/img/logo_yoo.png" alt="yookassa">
      
      <div>
        <button type="submit">перейти к оплате</button>
      </div>
    </form>

  </div>
</main>
<?php require_once VIEWS . "/incs/footer.php" ?>
