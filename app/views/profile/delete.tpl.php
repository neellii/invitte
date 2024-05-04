<?php require_once VIEWS . "/incs/header.php" ?>
<main class="main">
  <div>
    <table class="table">
      <thead>
        <tr>
          <td>id</td>
          <td>user_id</td>
          <td>order_id</td>
          <td>created_at</td>
          <td>delete_on</td>
          <td>user email</td>
          <td>delete</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach($expiredData as $k => $v): ?>
          <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['user_id'] ?></td>
            <td><?= $v['order_id'] ?></td>
            <td><?= $v['created_at'] ?></td>
            <td><?= $v['delete_on'] ?></td>
            <td><?= $v['email'] ?></td>
            <td>
              <form action="delete" method="post">
                <input type="hidden" value="<?= $v['id'] ?>" name="event_id">
                <button type="submit">удалить</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>
<?php require_once VIEWS . "/incs/footer.php" ?>

