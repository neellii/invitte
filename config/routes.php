<?php

/**
 * @var $router
 */

 const MIDDLEWARE = [
  'auth' => \myfrm\middleware\Auth::class,
  'guest' => \myfrm\middleware\Guest::class,
 ];

  $router->get('', 'index.php');
  $router->get('templates/try/(?P<slug>[a-zA-Z0-9-]+)', 'templates/try.php');
  $router->get('demo/(?P<slug>[a-zA-Z0-9-]+)', 'templates/demo.php');
  $router->post('templates/create', 'templates/create.php')->only('auth');
  $router->post('templates', 'templates/store.php');
  $router->post('templates/trial', 'templates/trial.php');
  $router->post('templates/update', 'templates/update.php')->only('auth');
  $router->post('templates/update/confirm', 'templates/update_confirm.php')->only('auth');
  $router->post('liked', 'templates/liked.php')->only('auth');
  $router->post('loadTemplates', 'templates/loadTemplates.php');
  $router->get('delete', 'templates/delete.php');
  $router->post('delete', 'templates/delete-data.php');

  $router->get('generate-img/(?P<slug>[a-zA-Z0-9-]+)', 'captures/generateImage.php')->only('auth');
  $router->get('i/(?P<slug>[a-zA-Z0-9-]+)', 'templates/showInvitation.php');
  $router->post('generate-img/save-capture1', 'captures/save-capture1.php');
  $router->post('i/send-rsvp', 'templates/send_rsvp.php');
  
  $router->get('likes', 'profile/likes.php')->only('auth');
  $router->get('orders', 'profile/myorders.php')->only('auth');
  
  $router->post('templates/topayment', 'payments/payment-form.php')->only('auth');
  $router->post('payment-data', 'payments/payment-send.php')->only('auth');
  $router->post('payment-cb', 'payments/payment-cb.php');
  $router->get('success', 'payments/success.php')->only('auth');
    
  $router->get('register', 'users/register.php')->only('guest');
  $router->post('register', 'users/store.php')->only('guest');
  $router->get('login', 'users/login.php')->only('guest');
  $router->post('login', 'users/logged.php')->only('guest');
  $router->get('logout', 'users/logout.php')->only('auth');
  
  $router->get('policy', 'policy.php');
  $router->get('terms', 'terms.php');
  