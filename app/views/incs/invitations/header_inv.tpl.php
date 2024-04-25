<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="<?= $inv_data['og_title'] ?? 'Приглашение' ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo isset($inv_data['og_desc']) ? $inv_data['og_desc'] : $inv_data['groom_name'] . 'и' . $inv_data['bride_name'] ?>" />
    <meta property="og:url" content="http://localhost/test-mvc/invites/<?= $data['slug'] ?>" />
    <meta
      property="og:site_name"
      content="Invitte - онлайн-приглашения"
    />
    <meta
      property="og:image"
      content="https://cz82944.tw1.ru/public<?= $inv_data['og_image'] ?? '' ?>"
    />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $inv_data['og_title'] ?? 'Приглашение' ?>" />
    <meta name="twitter:description" content="<?php echo isset($inv_data['og_desc']) ? $inv_data['og_desc'] : $inv_data['groom_name'] . 'и' . $inv_data['bride_name'] ?>" />
    <meta
      name="twitter:image"
      content="https://cz82944.tw1.ru/public<?= $inv_data['og_image'] ?? '' ?>"
    />
    <title><?= $inv_data['og_title'] ?? 'Приглашение' ?></title>

    <link rel="icon" type="image/x-icon" href="../public/assets/favicon1.png">
    <link rel="stylesheet" href="../public/invitations/styles/reset.css"/>
    <?php if(isset($demo)): ?>
    <link rel="stylesheet" href="<?= "../public/invitations/styles/template-{$template_id}.css" ?>"/>
    <?php else:  ?>
    <link rel="stylesheet" href="<?= "../public/invitations/styles/template-{$data['template_id']}.css" ?>"/>
    <?php endif; ?>
  </head>
<body>
