<?php require_once VIEWS . "/incs/header.php" ?>

    <main class="main">
      <div class="container">
        <div class="row">
          <form action="" method="post" enctype="multipart/form-data">
            <div>
              <label for="name">Имя</label>
              <input type="name" class="form-control" id="name" placeholder="Имя" name="name" value="<?= old('name') ?>">
              <?= isset($validation) ? $validation->listErrors('name') : '' ?>
            </div>

            <div>
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Email" name="email" value="<?= old('email') ?>">
              <?= isset($validation) ? $validation->listErrors('email') : '' ?>
            </div>

            <div>
              <label for="password">Пароль</label>
              <input type="password" id="password" placeholder="Придумайте пароль" name="password" value="<?= old('password') ?>">
              <?= isset($validation) ? $validation->listErrors('password') : '' ?>
            </div>

            <div style="display: flex; flex-direction: row; align-items: center; column-gap: 5px;">
              <input type="checkbox" id="policy" name="policy">
              <label for="policy">Я ознакомлен(а) с <a href="/policy">политикой конфиденциальности</a>, <a href="/terms">условиями использования</a> и даю согласие на обработку персональных данных</label>
              <?= isset($validation) ? $validation->listErrors('policy') : '' ?>
            </div>
        
            <div>
              <button type="submit" class="btn btn-primary">зарегистрироваться</button>
            </div>
          </form>
        </div>
      </div>
    </main>

<?php require_once VIEWS . "/incs/footer.php" ?>