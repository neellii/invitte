<?php require_once VIEWS . "/incs/header.php" ?>

<main class="main">
  <div class="container-t">        
    <?php if(!empty($updatedTableData)): ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">ссылка на приглашение</th>
          <th scope="col">доступно до</th>
          <th scope="col">скачать архив с изображениями для печати</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($updatedTableData as $data => $value): ?> 
        <tr>
          <td><?= $value['title']; ?></td>
          <?php if(!empty($value['slug'])): ?>
          <td><a href="<?= 'https://cz82944.tw1.ru/i/' . $value['slug'] ?>" target="_blank">https://cz82944.tw1.ru/i/<?= $value['slug']; ?></a></td>
          <?php else: ?>
          <td>создайте приглашение для формирования ссылки</td>
          <?php endif; ?>
          <td><?= $value['remaining_time'] ?></td>
          <?php if(!empty($value['slug'])): ?>
          <td><a class="generate" href="<?= 'https://cz82944.tw1.ru/generate-img/' . $value['slug'] ?>" target="_blank">https://cz82944.tw1.ru/generate-img/<?= $value['slug'] ?></a></td>
          <?php else: ?>
          <td>создайте приглашение для скачивания</td>
          <?php endif; ?>
          <td>
            <?php if(!empty($value['slug'])): ?>
            <form action="templates/update" method="post">
              <input type="hidden" value="<?= $value['slug'] ?? $_POST['old_slug'] ?>" name="old_slug">
              <input type="hidden" value="<?= $value['template_id'] ?>" name="template_id">
              <button type="submit">обновить</button>
            </form>
            <?php else: ?>
            <form action="templates/create" method="post">
              <input type="hidden" value="<?= $value['id'] ?>" name="event_id">
              <button type="submit">создать</button>
            </form>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
      <p style="text-align: center;">Нет приобретенных шаблонов</p>
    <?php endif; ?>
  </div>
</main>
<?php require_once VIEWS . "/incs/footer.php" ?>
