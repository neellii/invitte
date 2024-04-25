<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>invitte</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/favicon1.png">
    <link rel="stylesheet" href="../public/invitations/styles/reset.css" />
    <link rel="stylesheet" href="../public/invitations/imageTemplateStyles/over.css">
    <link rel="stylesheet" href=<?= "../public/invitations/imageTemplateStyles/capture-{$data['template_id']}.css" ?> />
    <script>
      HTMLCanvasElement.prototype.getContext = (function (origFn) {
        return function (type, attribs) {
          attribs = attribs || {};
          attribs.preserveDrawingBuffer = true;
          return origFn.call(this, type, attribs);
        };
      })(HTMLCanvasElement.prototype.getContext);
    </script>
  </head>