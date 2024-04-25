<?php require_once VIEWS . "/incs/header.php" ?>
    <main class="main">
      <div class="container">
        <div class="row">
          <form action="" method="post">
            <div>
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Email" name="email">
              <?= isset($validation) ? $validation->listErrors('name') : '' ?>
            </div>

            <div>
              <label for="password">Пароль</label>
              <input type="password" id="password" placeholder="пароль" name="password">
              <?= isset($validation) ? $validation->listErrors('password') : '' ?>
            </div>

            <div>
              <button type="submit" class="btn btn-primary">войти</button>
            </div>
          </form>
          
          <p style="color: #4d5974;">не зарегистрированы?
            <a href="register" style="text-decoration: underline;">регистрация</a> </p>
        </div>
      </div>
    </main>

<?php require_once VIEWS . "/incs/footer.php" ?>