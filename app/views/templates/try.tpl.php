<?php require_once VIEWS . "/incs/header.php" 

/**
 * @var \myfrm\classes\Validator
 */

?>

<main class="main" style="padding-top: 60px;">
  <div class="create">
    <form class="form" action="templates/trial" method="post" enctype="multipart/form-data">
      <div class="q-group">
        <label for="groom_name">Имя жениха</label>
        <input type="text" id="groom_name" placeholder="Дмитрий" name="groom_name" value="<?= old('groom_name') ?>">
        <?= isset($validation) ? $validation->listErrors('groom_name') : '' ?>
      </div>

      <div class="q-group">
        <label for="bride_name">Имя невесты</label>
        <input type="text" id="bride_name" placeholder="Кристина" name="bride_name" value="<?= old('bride_name') ?>">
        <?= isset($validation) ? $validation->listErrors('bride_name') : '' ?>
      </div>

      <div class="q-group">
        <label for="couple_img">Загрузите фотографию на превью <br> не больше 2 мегабайт, разрешенные форматы: jpg|png|jpeg</label>
        <input name="couple_img" type="file" id="avatar">
        <?= isset($validation) ? $validation->listErrors('couple_img') : '' ?>
      </div>

      <div class="q-group">
        <label for="to_whom">Обращение в приглашении</label>
        <input id="to_whom" name="to_whom" placeholder="Дорогие близкие и друзья!" value="<?= old('to_whom') ?>">
        <?= isset($validation) ? $validation->listErrors('to_whom') : '' ?>
      </div>

      <div class="q-group">
        <label for="party_date">Дата мероприятия</label>
        <input id="party_date" name="party_date" placeholder="31 июля 2024 г." value="<?= old('party_date') ?>">
        <?= isset($validation) ? $validation->listErrors('party_date') : '' ?>
      </div>

      <div class="q-group">
        <label for="place">Место проведения</label>
        <input id="place" name="place" placeholder="ул. Светлая, 17, ресторан 'Аврора'" value="<?= old('place') ?>">
        <?= isset($validation) ? $validation->listErrors('place') : '' ?>
      </div>

      <input type="hidden" value="<?= $template_id ?? $_POST['template_id'] ?>" name="template_id">

      <div class="q-group">
        <button type="submit" class="btn btn-primary">Попробовать</button>
      </div>
    </form>
  </div>
</main>

<?php require_once VIEWS . "/incs/footer.php" ?>